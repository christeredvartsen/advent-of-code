<?php declare(strict_types=1);
namespace AoC\Y2016;

use AoC\Solver;

class Dec03 implements Solver
{
    private function parseInput(string $input): array
    {
        return array_map(
            fn (string $line): array => array_map('intval', preg_split('/ +/', $line, 3, PREG_SPLIT_NO_EMPTY)),
            explode(PHP_EOL, $input),
        );
    }

    private function isValidTriangle(array $triangle): bool
    {
        sort($triangle);
        return $triangle[0] + $triangle[1] > $triangle[2];
    }

    public function solvePart1(string $input)
    {
        return count(array_filter($this->parseInput($input), [$this, 'isValidTriangle']));
    }

    public function solvePart2(string $input)
    {
        $triangles = $this->parseInput($input);
        $valid = 0;

        for ($y = 0; $y < count($triangles); $y += 3) {
            for ($x = 0; $x < 3; $x++) {
                if ($this->isValidTriangle([$triangles[$y][$x], $triangles[$y + 1][$x], $triangles[$y + 2][$x]])) {
                    $valid += 1;
                }
            }
        }

        return $valid;
    }
}
