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

    public function getDepths(array $map): array
    {
        $depths = [];

        foreach ($map as $y => $line) {
            foreach ($line as $x => $depth) {
                if (
                    $depth < ($map[$y][$x - 1] ?? 9) && // left
                    $depth < ($map[$y][$x + 1] ?? 9) && // right
                    $depth < ($map[$y - 1][$x] ?? 9) && // above
                    $depth < ($map[$y + 1][$x] ?? 9)    // below
                ) {
                    $depths[] = [
                        'y' => $y,
                        'x' => $x,
                        'depth' => $depth,
                    ];
                }
            }
        }

        return $depths;
    }

    private function getBasinSize(array $map, int $y, int $x): int
    {
        $size = 0;
        $depthsToCheck = [[$y, $x]];

        while ([$y, $x] = array_pop($depthsToCheck)) {
            $left  = [$y, $x - 1];
            $right = [$y, $x + 1];
            $above = [$y - 1, $x];
            $below = [$y + 1, $x];

            foreach ([$above, $right, $below, $left] as [$dirY, $dirX]) {
                if (($map[$dirY][$dirX] ?? 9) !== 9) {
                    $map[$dirY][$dirX] = 9;
                    $depthsToCheck[] = [$dirY, $dirX];
                    $size++;
                }
            }
        }

        return $size;
    }

    public function solvePart1(string $input): int
    {
        $depths = $this->getDepths($this->parseInput($input));
        return array_sum(array_column($depths, 'depth')) + count($depths);
    }

    public function solvePart2(string $input): int
    {
        $map = $this->parseInput($input);
        $basinSizes = array_map(
            fn (array $depth): int => $this->getBasinSize($map, $depth['y'], $depth['x']),
            $this->getDepths($this->parseInput($input)),
        );
        sort($basinSizes);
        return array_product(array_slice($basinSizes, -3));
    }
}
