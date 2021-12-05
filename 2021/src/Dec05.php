<?php declare(strict_types=1);
namespace AoC;

use InvalidArgumentException;

class Dec05 implements Solver
{
    private array $lines;

    public function __construct(string $input)
    {
        $this->lines = array_map(function (string $line): array {
            $line = trim($line);
            if (!preg_match('/^(?P<x1>\d+),(?P<y1>\d+) -> (?P<x2>\d+),(?P<y2>\d+)$/', $line, $match)) {
                throw new InvalidArgumentException('Unknown line format: ' . $line);
            }
            unset($match[0], $match[1], $match[2], $match[3], $match[4]);
            return array_map('intval', $match);
        }, explode(PHP_EOL, trim($input)));
    }

    private function isVertical(array $line): bool
    {
        return $line['x1'] === $line['x2'];
    }

    private function isDiagonal(array $line): bool
    {
        return $line['x1'] !== $line['x2'] && $line['y1'] !== $line['y2'];
    }

    private function getMap(array $lines): array
    {
        $boundary = [
            'minX' => array_reduce($lines, fn (int $min, array $line): int => min($min, $line['x1'], $line['x2']), PHP_INT_MAX),
            'maxX' => array_reduce($lines, fn (int $max, array $line): int => max($max, $line['x1'], $line['x2']), 0),
            'minY' => array_reduce($lines, fn (int $min, array $line): int => min($min, $line['y1'], $line['y2']), PHP_INT_MAX),
            'maxY' => array_reduce($lines, fn (int $max, array $line): int => max($max, $line['y1'], $line['y2']), 0),
        ];

        return array_fill(
            $boundary['minY'],
            $boundary['maxY'] - $boundary['minY'] + 1,
            array_fill(
                $boundary['minX'],
                $boundary['maxX'] - $boundary['minX'] + 1,
                0,
            ),
        );
    }

    public function getDangerousCoords($lines): array
    {
        $map = $this->getMap($lines);
        $dangerous = [];

        foreach ($lines as $line) {
            if ($this->isDiagonal($line)) {
                $xf = $yf = 1;
                $len = $line['x2'] - $line['x1'];

                if ($line['x1'] > $line['x2']) {
                    $xf = -1;
                    $len = $line['x1'] - $line['x2'];
                }

                if ($line['y1'] > $line['y2']) {
                    $yf = -1;
                }

                for ($i = 0; $i <= $len; $i++) {
                    $y = $line['y1'] + $i * $yf;
                    $x = $line['x1'] + $i * $xf;

                    if (++$map[$y][$x] > 1) {
                        $dangerous[$y.'->'.$x] = true;
                    }
                }
            } elseif ($this->isVertical($line)) {
                $x = $line['x1'];
                foreach (range($line['y1'], $line['y2']) as $y) {
                    if (++$map[$y][$x] > 1) {
                        $dangerous[$y.'->'.$x] = true;
                    }
                }
            } else {
                $y = $line['y1'];
                foreach (range($line['x1'], $line['x2']) as $x) {
                    if (++$map[$y][$x] > 1) {
                        $dangerous[$y.'->'.$x] = true;
                    }
                }
            }
        }

        return $dangerous;
    }

    public function solvePart1(): int
    {
        // Only keep horizontal and vertical lines for part 1
        $lines = array_values(
            array_filter(
                $this->lines,
                fn (array $l): bool => !$this->isDiagonal($l),
            ),
        );

        return count($this->getDangerousCoords($lines));
    }

    public function solvePart2(): int
    {
        return count($this->getDangerousCoords($this->lines));
    }
}
