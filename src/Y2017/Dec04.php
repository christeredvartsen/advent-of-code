<?php declare(strict_types=1);
namespace AoC\Y2017;

use AoC\Solver;

use function AoC\sortString;

class Dec04 implements Solver
{
    private function parseInput(string $input): array
    {
        return array_map(
            fn (string $line): array => explode(' ', $line),
            explode(PHP_EOL, $input),
        );
    }

    public function solvePart1(string $input)
    {
        return count(array_filter(
            $this->parseInput($input),
            fn (array $words): bool => count($words) === count(array_unique($words)),
        ));
    }

    public function solvePart2(string $input)
    {
        return count(array_filter(
            array_map(
                fn (array $words): array => array_map(
                    fn (string $word): string => sortString($word),
                    $words,
                ),
                $this->parseInput($input),
            ),
            fn (array $words): bool => count($words) === count(array_unique($words)),
        ));
    }
}
