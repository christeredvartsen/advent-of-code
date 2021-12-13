<?php declare(strict_types=1);
namespace AoC\Y2021;

use AoC\Solver;

class Dec09 implements Solver
{
    private function parseInput(string $input): array
    {
        return array_map(
            fn (string $line): array => array_map('intval', str_split(trim($line))),
            explode(PHP_EOL, trim($input)),
        );
    }

    public function solvePart1(string $input)
    {
        $map = $this->parseInput($input);
        $sum = 0;

        foreach ($map as $y => $line) {
            foreach ($line as $x => $depth) {
                if (
                    $depth < ($map[$y][$x - 1] ?? 9) &&
                    $depth < ($map[$y][$x + 1] ?? 9) &&
                    $depth < ($map[$y - 1][$x] ?? 9) &&
                    $depth < ($map[$y + 1][$x] ?? 9)
                ) {
                    $sum += 1 + $depth;
                }
            }
        }

        return $sum;
    }

    public function solvePart2(string $input)
    {
        $map = $this->parseInput($input);
        $rows = count($map);
        $cols = count($map[0]);
        $basins = [];

        for ($y = 0; $y < $rows; $y++) {
            for ($x = 0; $x < $cols; $x++) {
                if ($map[$y][$x] === 9) {
                    continue;
                }

                $basins[] = $this->bfs($map, $rows, $cols, $y, $x);
            }
        }
        rsort($basins);
        return $basins[0] * $basins[1] * $basins[2];
    }

    private function bfs(array &$map, int $rows, int $cols, int $y, int $x): int
    {
        $size = 0;
        $queue = [[$y, $x]];
        --$rows;
        --$cols;

        while ([$y, $x] = array_shift($queue)) {
            if ($map[$y][$x] === 9) {
                continue;
            }

            $map[$y][$x] = 9;
            $size += 1;

            if ($y > 0 && ($map[$y - 1][$x] !== 9)) {
                $queue[] = [$y - 1, $x];
            }

            if ($y < $rows && ($map[$y + 1][$x] !== 9)) {
                $queue[] = [$y + 1, $x];
            }

            if ($x > 0 && ($map[$y][$x - 1] !== 9)) {
                $queue[] = [$y, $x - 1];
            }

            if ($x < $cols && ($map[$y][$x + 1] !== 9)) {
                $queue[] = [$y, $x + 1];
            }
        }

        return $size;
    }
}
