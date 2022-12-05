<?php declare(strict_types=1);
namespace AoC\Y2022;

use AoC\Solver;

class Dec01 implements Solver
{
    private function splitInput(string $input): array
    {
        return array_map(function (string $elf): int {
            $calories = array_map(
                fn (string $str): int => (int) trim($str),
                explode(PHP_EOL, $elf),
            );
            return array_sum($calories);
        }, explode(PHP_EOL.PHP_EOL, trim($input)));
    }

    public function solvePart1(string $input)
    {
        return max($this->splitInput($input));
    }

    public function solvePart2(string $input)
    {
        $elves = $this->splitInput($input);
        rsort($elves);
        return array_sum(array_slice($elves, 0, 3));
    }
}
