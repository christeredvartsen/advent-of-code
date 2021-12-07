<?php declare(strict_types=1);
namespace AoC\Y2015;

use AoC\Solver;

class Dec01 implements Solver
{
    public function solvePart1(string $input): int
    {
        $input = trim($input);
        return substr_count($input, '(') - substr_count($input, ')');
    }

    public function solvePart2(string $input): int
    {
        $chars = str_split(trim($input));
        $num = count($chars);
        $floor = 0;

        for ($i = 0; $i < $num; $i++) {
            if (-1 === $floor += '(' === $chars[$i] ? 1 : -1) {
                break;
            }
        }

        return ++$i;
    }
}
