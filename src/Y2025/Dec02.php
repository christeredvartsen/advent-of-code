<?php declare(strict_types=1);
namespace AoC\Y2025;

use AoC\Solver;

class Dec02 implements Solver
{
    /**
     * @return array<array{0:int,1:int}>
     */
    private function getRanges(string $input): array
    {
        return array_map(
            fn (string $range): array => array_map('intval', explode('-', $range)),
            explode(',', $input),
        );
    }

    public function solvePart1(string $input)
    {
        $ranges = $this->getRanges($input);
        $sum = 0;
        foreach ($ranges as $range) {
            for ($id = $range[0]; $id <= $range[1]; $id++) {
                if (preg_match('/^(.+)\1$/', (string) $id)) {
                    $sum += $id;
                }
            }
        }

        return $sum;
    }

    public function solvePart2(string $input)
    {
        $ranges = $this->getRanges($input);
        $sum = 0;
        foreach ($ranges as $range) {
            for ($id = $range[0]; $id <= $range[1]; $id++) {
                if (preg_match('/^(.+)\1+$/', (string) $id)) {
                    $sum += $id;
                }
            }
        }

        return $sum;
    }
}
