<?php declare(strict_types=1);
namespace AoC\Y2015;

use AoC\Solver;

class Dec02 implements Solver
{
    private function parseInput(string $input): array
    {
        return array_map(
            function (string $packet): array {
                $dimensions = array_map('intval', explode('x', trim($packet)));
                sort($dimensions);
                return $dimensions;
            },
            explode(PHP_EOL, $input),
        );
    }

    public function solvePart1(string $input)
    {
        return array_reduce($this->parseInput($input), function (int $sum, array $packet): int {
            [$l, $w, $h] = $packet;
            return $sum + (2 * $l * $w) + (2 * $w * $h) + (2 * $h * $l) + ($l * $w);
        }, 0);
    }

    public function solvePart2(string $input)
    {
        return array_reduce($this->parseInput($input), function (int $sum, array $packet): int {
            [$l, $w, $h] = $packet;
            return $sum + (2 * $l) + (2 * $w) + ($l * $w * $h);
        }, 0);
    }
}
