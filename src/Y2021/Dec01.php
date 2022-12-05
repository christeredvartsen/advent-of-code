<?php declare(strict_types=1);
namespace AoC\Y2021;

use AoC\Solver;

use function AoC\stringToInts;

class Dec01 implements Solver
{
    public function solvePart1(string $input)
    {
        return $this->solve(stringToInts($input));
    }

    public function solvePart2(string $input)
    {
        return $this->solve(stringToInts($input), 3);
    }

    private function solve(array $input, int $slice = 1): int
    {
        $increased = 0;

        for ($i = 0; $i < count($input) - $slice; $i++) {
            if (array_sum(array_slice($input, $i, $slice)) < array_sum(array_slice($input, $i + 1, $slice))) {
                $increased++;
            }
        }

        return $increased;
    }
}
