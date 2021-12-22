<?php declare(strict_types=1);
namespace AoC\Y2016;

use AoC\Solver;

class Dec02 implements Solver
{
    private function getCode(array $panel, array $pos, array $instructions): string
    {
        $movements = [
            'U' => [-1, 0],
            'R' => [0, 1],
            'D' => [1, 0],
            'L' => [0, -1],
        ];

        $code = '';

        foreach ($instructions as $instruction) {
            for ($i = 0; $i < strlen($instruction); $i++) {
                [$y, $x] = $movements[$instruction[$i]];
                $newPos = [$pos[0] + $y, $pos[1] + $x];

                if (' ' === $panel[$newPos[0]][$newPos[1]]) {
                    continue;
                }

                $pos = $newPos;
            }

            $code .= $panel[$pos[0]][$pos[1]];
        }

        return $code;
    }

    public function solvePart1(string $input)
    {
        $panel = [
            '     ',
            ' 123 ',
            ' 456 ',
            ' 789 ',
            '     ',
        ];

        return $this->getCode($panel, [2, 2], explode(PHP_EOL, $input));
    }

    public function solvePart2(string $input)
    {
        $panel = [
            '       ',
            '   1   ',
            '  234  ',
            ' 56789 ',
            '  ABC  ',
            '   D   ',
            '       ',
        ];

        return $this->getCode($panel, [3, 1], explode(PHP_EOL, $input));
    }
}
