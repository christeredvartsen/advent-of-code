<?php declare(strict_types=1);
namespace AoC\Y2025;

use AoC\Solver;

use function AoC\stringToStrings;

class Dec04 implements Solver
{
    public function grid(string $input): array
    {
        $grid = array_map(
            fn (string $line): array => str_split($line),
            stringToStrings($input),
        );
        return [$grid, count($grid), count($grid[0])];
    }

    public function solvePart1(string $input)
    {
        [$grid, $height, $len] = $this->grid($input);
        $accessible = 0;

        for ($y = 0; $y < $height; $y++) {
            for ($x = 0; $x < $len; $x++) {
                if ($grid[$y][$x] !== '@') {
                    continue;
                }

                $surrounding = 0;

                for ($yy = -1; $yy <= 1; $yy++) {
                    for ($xx = -1; $xx <= 1; $xx++) {
                        if ($yy === 0 && $xx === 0) {
                            continue;
                        }

                        if (($grid[$y + $yy][$x + $xx] ?? null) === '@') {
                            $surrounding++;
                        }

                        if ($surrounding === 4) {
                            continue 3;
                        }
                    }
                }

                $accessible++;
            }
        }

        return $accessible;
    }

    public function solvePart2(string $input)
    {
        [$grid, $height, $len] = $this->grid($input);
        $totalCleared = 0;

        while (true) {
            $cleared = 0;

            for ($y = 0; $y < $height; $y++) {
                for ($x = 0; $x < $len; $x++) {
                    if ($grid[$y][$x] !== '@') {
                        continue;
                    }

                    $surrounding = 0;

                    for ($yy = -1; $yy <= 1; $yy++) {
                        for ($xx = -1; $xx <= 1; $xx++) {
                            if ($yy === 0 && $xx === 0) {
                                continue;
                            }

                            if (($grid[$y + $yy][$x + $xx] ?? null) === '@') {
                                $surrounding++;
                            }

                            if ($surrounding === 4) {
                                continue 3;
                            }
                        }
                    }

                    $grid[$y][$x] = '.';
                    $cleared++;
                }
            }

            if ($cleared === 0) {
                break;
            }

            $totalCleared += $cleared;
        }

        return $totalCleared;
    }
}
