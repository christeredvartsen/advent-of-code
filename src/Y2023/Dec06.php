<?php declare(strict_types=1);
namespace AoC\Y2023;

use AoC\Solver;

use function AoC\stringToStrings;

class Dec06 implements Solver
{
    private function getRaces(string $input): array
    {
        $lines = stringToStrings($input);
        return array_map(
            fn (string $time, string $record): array => [(int) $time, (int) $record],
            array_filter(preg_split('/\s+/', $lines[0]), 'is_numeric'),
            array_filter(preg_split('/\s+/', $lines[1]), 'is_numeric'),
        );
    }

    private function wins(array $race): int
    {
        [$time, $record] = $race;
        $wins = 0;
        for ($velocity = 0; $velocity < $time; $velocity++) {
            if (($velocity * ($time - $velocity)) > $record) {
                $wins++;
            }
        }
        return $wins;
    }

    public function solvePart1(string $input)
    {
        return array_reduce(
            $this->getRaces($input),
            fn (int $carry, array $race): int => $carry * $this->wins($race),
            1,
        );
    }

    public function solvePart2(string $input)
    {
        $races  = $this->getRaces($input);
        return $this->wins([
            (int) array_reduce($races, fn (string $carry, array $race): string => $carry . $race[0], ''),
            (int) array_reduce($races, fn (string $carry, array $race): string => $carry . $race[1], ''),
        ]);
    }
}
