<?php declare(strict_types=1);
namespace AoC;

use InvalidArgumentException;
use RuntimeException;

class Dec05 implements Solver
{
    private array $input;

    public function __construct(string $input)
    {
        $this->input = array_map(function (string $line): array {
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

    public function solvePart1(): int
    {
        // Only keep horizontal and vertical lines for part 1
        $lines = array_values(
            array_filter(
                $this->input,
                fn (array $l): bool => ($l['x1'] === $l['x2']) || ($l['y1'] === $l['y2']),
            ),
        );

        $map = $this->getMap($lines);
        $dangerous = [];

        foreach ($lines as $line) {
            if ($this->isVertical($line)) {
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

        return count($dangerous);
    }

    public function solvePart2(): int
    {
        throw new RuntimeException('Not implemented');
    }
}
