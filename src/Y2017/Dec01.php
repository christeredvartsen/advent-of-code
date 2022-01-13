<?php declare(strict_types=1);
namespace AoC\Y2017;

use AoC\Solver;

class Dec01 implements Solver
{
    public function solvePart1(string $input)
    {
        $len = strlen($input);
        $sum = 0;
        $input .= $input[0];

        for ($i = 0; $i < $len; $i++) {
            if ($input[$i] === $input[$i + 1]) {
                $sum += (int) $input[$i];
            }
        }

        return $sum;
    }

    public function solvePart2(string $input)
    {
        $len = strlen($input);
        $sum = 0;

        for ($i = 0; $i < $len; $i++) {
            if ($input[$i] === $input[($i + $len / 2) % $len]) {
                $sum += (int) $input[$i];
            }
        }

        return $sum;
    }
}
