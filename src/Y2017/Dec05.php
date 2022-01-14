<?php declare(strict_types=1);
namespace AoC\Y2017;

use AoC\Solver;

class Dec05 implements Solver
{
    private function parseInput(string $input): array
    {
        return array_map('intval', explode(PHP_EOL, $input));
    }

    private function run(array $jumps, callable $adjust): int
    {
        for ($pos = $steps = 0; isset($jumps[$pos]); $steps++) {
            $oldPos = $pos;
            $pos += $jumps[$pos];
            $jumps[$oldPos] = $adjust($jumps[$oldPos]);
        }

        return $steps;
    }

    public function solvePart1(string $input)
    {
        return $this->run(
            $this->parseInput($input),
            fn (int $jump): int => $jump + 1,
        );
    }

    public function solvePart2(string $input)
    {
        return $this->run(
            $this->parseInput($input),
            fn (int $jump): int => $jump >= 3 ? $jump - 1 : $jump + 1,
        );
    }
}
