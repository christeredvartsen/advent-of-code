<?php declare(strict_types=1);
namespace AoC\Y2017;

use AoC\Solver;

class Dec02 implements Solver
{
    private function parseInput(string $input): array
    {
        return array_map(
            fn (string $line): array => array_map('intval', preg_split('/\s+/', $line)),
            explode(PHP_EOL, $input),
        );
    }

    public function solvePart1(string $input)
    {
        return array_sum(array_map(
            fn (array $row): int => max($row) - min($row),
            $this->parseInput($input),
        ));
    }

    public function solvePart2(string $input)
    {
        $sum = 0;

        foreach ($this->parseInput($input) as $row) {
            rsort($row);
            $len = count($row);

            for ($i = 0; $i < $len - 1; $i++) {
                for ($j = $i + 1; $j < $len; $j++) {
                    if (0 === $row[$i] % $row[$j]) {
                        $sum += $row[$i] / $row[$j];
                        break 2;
                    }
                }
            }
        }

        return $sum;
    }
}
