<?php declare(strict_types=1);
namespace AoC\Y2025;

use AoC\Solver;

use function AoC\stringToStrings;

class Dec07 implements Solver
{
    private function traverse(string $input): array
    {
        $grid = array_map('str_split', stringToStrings($input));
        $beams = array_fill(0, count($grid[0]), 0);
        $beams[array_search('S', $grid[0])] = 1;
        $splitters = 0;

        foreach ($grid as $line) {
            foreach ($line as $x => $char) {
                if ($char === '^' && $beams[$x] > 0) {
                    $splitters++;
                    $beams[$x - 1] += $beams[$x];
                    $beams[$x + 1] += $beams[$x];
                    $beams[$x] = 0;
                }
            }
        }

        return [$splitters, array_sum($beams)];
    }

    public function solvePart1(string $input)
    {
        return $this->traverse($input)[0];
    }

    public function solvePart2(string $input)
    {
        return $this->traverse($input)[1];
    }
}
