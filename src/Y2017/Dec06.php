<?php declare(strict_types=1);
namespace AoC\Y2017;

use AoC\Solver;

class Dec06 implements Solver
{
    private function parseInput(string $input): array
    {
        return array_map('intval', preg_split('/\s+/', $input));
    }

    private function loop(array $banks): array
    {
        $len = count($banks);
        $state = implode('', $banks);
        $states = [];
        $cycle = 0;

        do {
            $states[$state] = ++$cycle;

            $maxIndex = array_keys($banks, max($banks))[0];
            $max = $banks[$maxIndex];
            $banks[$maxIndex] = 0;

            for ($i = 1; $i <= $max; $i++) {
                $banks[($maxIndex + $i) % $len] += 1;
            }

            $state = implode('', $banks);
        } while (!isset($states[$state]));

        return [$cycle, 1 + $cycle - $states[$state]];
    }

    public function solvePart1(string $input)
    {
        return $this->loop($this->parseInput($input))[0];
    }

    public function solvePart2(string $input)
    {
        return $this->loop($this->parseInput($input))[1];
    }
}
