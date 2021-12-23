<?php declare(strict_types=1);
namespace AoC\Y2016;

use AoC\Solver;

class Dec05 implements Solver
{
    public function solvePart1(string $input)
    {
        $password = '';

        for ($i = 0; $i < PHP_INT_MAX; $i++) {
            $hash = md5($input . $i);

            if ('00000' === substr($hash, 0, 5)) {
                $password .= $hash[5];

                if (8 === strlen($password)) {
                    return $password;
                }
            }
        }
    }

    public function solvePart2(string $input)
    {
        $password = [];

        for ($i = 0; $i < PHP_INT_MAX; $i++) {
            $hash = md5($input . $i);
            $index = (int) $hash[5];

            if (
                ('00000' !== substr($hash, 0, 5)) ||
                !is_numeric($hash[5]) ||
                (0 > $index || 7 < $index) ||
                isset($password[$index])
            ) {
                continue;
            }

            $password[$index] = $hash[6];

            if (8 === count($password)) {
                ksort($password);
                return implode('', $password);
            }
        }
    }
}
