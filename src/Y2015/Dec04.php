<?php declare(strict_types=1);
namespace AoC\Y2015;

use AoC\Solver;

class Dec04 implements Solver
{
    private function findIndex(string $key, int $numZeroes)
    {
        $zeroes = str_repeat('0', $numZeroes);

        for ($i = 1; $i < PHP_INT_MAX; $i++) {
            if ($zeroes === substr(md5($key . $i), 0, $numZeroes)) {
                return $i;
            }
        }
    }

    public function solvePart1(string $input)
    {
        return $this->findIndex($input, 5);
    }

    public function solvePart2(string $input)
    {
        return $this->findIndex($input, 6);
    }
}
