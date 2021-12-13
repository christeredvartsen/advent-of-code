<?php declare(strict_types=1);
namespace AoC\Y2021;

use AoC\Solver;
use RuntimeException;

class Dec11 implements Solver
{
    private const NEIGHBOURS = [
        [-1, -1], // above left
        [-1, 0],  // above
        [-1, 1],  // above right
        [0, -1],  // left
        [0, 1],   // right
        [1, -1],  // below left
        [1, 0],   // below
        [1, 1],   // below right
    ];

    private function parseInput(string $input): array
    {
        return array_map(
            fn (string $line): array => array_map('intval', str_split(trim($line))),
            explode(PHP_EOL, trim($input)),
        );
    }

    private function flash(array &$map, array $willFlash): int
    {
        $hasFlashed = [];

        while ([$y, $x] = array_shift($willFlash)) {
            if (isset($hasFlashed[$y . '.' . $x])) {
                continue;
            }

            $hasFlashed[$y . '.' . $x] = [$y, $x];

            foreach (self::NEIGHBOURS as [$adjustY, $adjustX]) {
                $nY = $y + $adjustY;
                $nX = $x + $adjustX;

                if (isset($map[$nY][$nX])) {
                    $map[$nY][$nX] += 1;

                    if ($map[$nY][$nX] > 9 && !isset($hasFlashed[$nY . '.' . $nX])) {
                        $willFlash[] = [$nY, $nX];
                    }
                }
            }
        }

        foreach ($hasFlashed as [$y, $x]) {
            $map[$y][$x] = 0;
        }

        return count($hasFlashed);
    }

    public function solvePart1(string $input)
    {
        $map = $this->parseInput($input);
        $sum = 0;

        for ($step = 0; $step < 100; $step++) {
            $willFlash = [];

            for ($y = 0; $y < 10; $y++) {
                for ($x = 0; $x < 10; $x++) {
                    $map[$y][$x] += 1;

                    if ($map[$y][$x] > 9) {
                        $willFlash[] = [$y, $x];
                    }
                }
            }

            $sum += $this->flash($map, $willFlash);
        }

        return $sum;
    }

    public function solvePart2(string $input)
    {
        $map = $this->parseInput($input);
        $step = 0;

        while (++$step) {
            $willFlash = [];

            for ($y = 0; $y < 10; $y++) {
                for ($x = 0; $x < 10; $x++) {
                    $map[$y][$x] += 1;

                    if ($map[$y][$x] > 9) {
                        $willFlash[] = [$y, $x];
                    }
                }
            }

            if (100 === $this->flash($map, $willFlash)) {
                return $step;
            }
        }

        throw new RuntimeException('No solution :(');
    }
}
