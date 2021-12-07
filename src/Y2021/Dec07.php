<?php declare(strict_types=1);
namespace AoC\Y2021;

use AoC\Solver;
use function AoC\avg;
use function AoC\median;
use function AoC\triangular;

class Dec07 implements Solver
{
    private function parseInput(string $input): array
    {
        $values = array_map('intval', explode(',', $input));
        sort($values);
        return $values;
    }

    public function solvePart1(string $input): int
    {
        $positions = $this->parseInput($input);
        $median = (int) median($positions);
        return array_sum(array_map(fn (int $p): int => abs($p - $median), $positions));
    }

    public function solvePart2(string $input): int
    {
        $positions = $this->parseInput($input);
        $avg = avg($positions);
        return min(
            array_sum(array_map(fn (int $p): int => triangular(abs($p - (int) ceil($avg))), $positions)),
            array_sum(array_map(fn (int $p): int => triangular(abs($p - (int) floor($avg))), $positions)),
        );
    }
}
