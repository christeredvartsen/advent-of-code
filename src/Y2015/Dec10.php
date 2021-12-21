<?php declare(strict_types=1);
namespace AoC\Y2015;

use AoC\Solver;

class Dec10 implements Solver
{
    private function lookAndSay(string $number, int $steps): string
    {
        for ($i = 0; $i < $steps; $i++) {
            $number = preg_replace_callback(
                '/(\d)\\1*/',
                fn (array $m): string => strlen($m[0]) . $m[1],
                $number,
            );
        }

        return $number;
    }

    public function solvePart1(string $input)
    {
        return strlen($this->lookAndSay($input, 40));
    }

    public function solvePart2(string $input)
    {
        return strlen($this->lookAndSay($input, 50));
    }
}
