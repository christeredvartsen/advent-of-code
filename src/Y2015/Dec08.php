<?php declare(strict_types=1);
namespace AoC\Y2015;

use AoC\Solver;

class Dec08 implements Solver
{
    public function solvePart1(string $input)
    {
        return array_reduce(
            explode(PHP_EOL, $input),
            fn (int $c, string $l): int => $c + strlen($l) - strlen(stripcslashes(trim($l, '"'))),
            0,
        );
    }

    public function solvePart2(string $input)
    {
        return array_reduce(
            explode(PHP_EOL, $input),
            fn (int $c, string $l): int => $c + strlen('"' . addslashes($l) . '"') - strlen($l),
            0,
        );
    }
}
