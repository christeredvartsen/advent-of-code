<?php declare(strict_types=1);
namespace AoC;

class Dec06 implements Solver
{
    private function numFishAfterDays(array $fish, int $days): int
    {
        while ($days--) {
            $yesterday = $fish;

            $fish[8] = $fish[0];
            $fish[7] = $yesterday[8];
            $fish[6] = $yesterday[7] + $fish[0];
            $fish[5] = $yesterday[6];
            $fish[4] = $yesterday[5];
            $fish[3] = $yesterday[4];
            $fish[2] = $yesterday[3];
            $fish[1] = $yesterday[2];
            $fish[0] = $yesterday[1];
        }

        return array_sum($fish);
    }

    private function parseInput(string $input): array
    {
        $fish = [0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach (array_map('intval', explode(',', trim($input))) as $age) {
            $fish[$age]++;
        }

        return $fish;
    }

    public function solvePart1(string $input): int
    {
        return $this->numFishAfterDays($this->parseInput($input), 80);
    }

    public function solvePart2(string $input): int
    {
        return $this->numFishAfterDays($this->parseInput($input), 256);
    }
}
