<?php declare(strict_types=1);
namespace AoC;

interface Solver
{
    public function solvePart1(string $input): int;
    public function solvePart2(string $input): int;
}
