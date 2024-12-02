<?php declare(strict_types=1);
namespace AoC\Y2024;

use AoC\Solver;

use function AoC\stringToStrings;

class Dec01 implements Solver
{
    public function solvePart1(string $input)
    {
        $left = $right = [];

        foreach (stringToStrings($input) as $line) {
            [$l, $r] = explode('   ', $line);
            $left[] = (int) $l;
            $right[] = (int) $r;
        }

        sort($left);
        sort($right);

        $diff = 0;

        for ($i = 0; $i < count($left); $i++) {
            $diff += abs($left[$i] - $right[$i]);
        }

        return $diff;
    }

    public function solvePart2(string $input)
    {
        $left = $right = [];

        foreach (stringToStrings($input) as $line) {
            [$l, $r] = explode('   ', $line);
            $left[] = $l;
            $right[$r] = ($right[$r] ?? 0) + 1;
        }

        return array_reduce(
            $left,
            fn (int $carry, string $l): int => $carry + (int) $l * ($right[$l] ?? 0),
            0,
        );
    }
}
