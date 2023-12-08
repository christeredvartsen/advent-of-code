<?php declare(strict_types=1);
namespace AoC\Y2017;

use AoC\Solver;

use function AoC\stringToStrings;

class Dec08 implements Solver
{
    private function parseInstructions(string $input)
    {
        $max = PHP_INT_MIN;
        $registers = [];

        foreach (stringToStrings($input) as $line) {
            [$register, $op, $amount, $_, $check, $cond, $value] = explode(' ', $line);
            $amount = (int) $amount;
            $value = (int) $value;

            if (!isset($registers[$register])) {
                $registers[$register] = 0;
            }

            if (!isset($registers[$check])) {
                $registers[$check] = 0;
            }

            $modify = match ($cond) {
                '>'  => $registers[$check] > $value,
                '>=' => $registers[$check] >= $value,
                '<'  => $registers[$check] < $value,
                '<=' => $registers[$check] <= $value,
                '==' => $registers[$check] === $value,
                '!=' => $registers[$check] !== $value,
            };

            if ($modify) {
                if ('inc' === $op) {
                    $registers[$register] += $amount;
                } else {
                    $registers[$register] -= $amount;
                }

                if ($max < $registers[$register]) {
                    $max = $registers[$register];
                }
            }
        }

        return [$registers, $max];
    }

    public function solvePart1(string $input)
    {
        return max($this->parseInstructions($input)[0]);
    }

    public function solvePart2(string $input)
    {
        return $this->parseInstructions($input)[1];
    }
}
