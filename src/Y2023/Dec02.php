<?php declare(strict_types=1);
namespace AoC\Y2023;

use AoC\Solver;

use function AoC\stringToStrings;

class Dec02 implements Solver
{
    private function parseInput(string $input): array
    {
        $games = [];

        foreach (stringToStrings($input) as $i => $sets) {
            $colors = [
                'red'   => 0,
                'green' => 0,
                'blue'  => 0,
            ];

            foreach (explode(';', $sets) as $set) {
                foreach (array_keys($colors) as $color) {
                    if (preg_match(sprintf('/\d+ %s/', $color), $set, $match)) {
                        $num = (int) $match[0];
                        if ($num > $colors[$color]) {
                            $colors[$color] = $num;
                        }
                    }
                }
            }

            $games[] = array_merge(['id' => $i + 1], $colors);
        }

        return $games;
    }

    public function solvePart1(string $input)
    {
        return array_reduce(
            $this->parseInput($input),
            fn (int $carry, array $game): int =>
                $game['red'] > 12 || $game['green'] > 13 || $game['blue'] > 14
                ? $carry
                : $carry + $game['id'],
            0,
        );
    }

    public function solvePart2(string $input)
    {
        return array_reduce(
            $this->parseInput($input),
            fn (int $carry, array $game): int => $game['red'] * $game['green'] * $game['blue'] + $carry,
            0,
        );
    }
}
