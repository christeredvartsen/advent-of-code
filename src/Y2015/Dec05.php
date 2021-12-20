<?php declare(strict_types=1);
namespace AoC\Y2015;

use AoC\Solver;

class Dec05 implements Solver
{
    public function solvePart1(string $input)
    {
        return count(array_filter(explode(PHP_EOL, $input), function (string $string): bool {
            $numVowels = preg_match_all('/(a|e|i|o|u)/', $string);
            $doubleLetter = preg_match_all('/(.)\1/', $string);
            $badPairs = preg_match_all('/(ab|cd|pq|xy)/', $string);

            return 2 < $numVowels && 0 < $doubleLetter && 0 === $badPairs;
        }));
    }

    public function solvePart2(string $input)
    {
        return count(array_filter(explode(PHP_EOL, $input), function (string $string): bool {
            $pairs = preg_match_all('/(..).*\1/', $string);
            $repeat = preg_match_all('/(.).\1/', $string);

            return 0 !== $pairs && 0 !== $repeat;
        }));
    }
}
