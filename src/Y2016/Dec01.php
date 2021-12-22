<?php declare(strict_types=1);
namespace AoC\Y2016;

use AoC\Solver;

class Dec01 implements Solver
{
    private function parseInput(string $input)
    {
        $turn = ['R' => 90, 'L' => -90];
        return array_map(
            fn (string $instruction): array => [$turn[$instruction[0]], (int) substr($instruction, 1)],
            explode(', ', $input),
        );
    }

    private function travel(array $instructions): array
    {
        $facing = 0;
        $pos = ['y' => 0, 'x' => 0];
        $visited = ['0,0' => 1];

        foreach ($instructions as [$turn, $distance]) {
            $facing += $turn;

            if (360 === $facing) {
                $facing = 0;
            }

            if (-90 === $facing) {
                $facing = 270;
            }

            switch ($facing) {
                case 0: $adjust = ['y', 1]; break;
                case 90: $adjust = ['x', 1]; break;
                case 180: $adjust = ['y', -1]; break;
                case 270: $adjust = ['x', -1]; break;
            }

            for ($i = 0; $i < $distance; $i++) {
                $pos[$adjust[0]] += $adjust[1];
                $current = $pos['y'] . ',' . $pos['x'];
                $visited[$current] = isset($visited[$current]) ? $visited[$current] + 1 : 1;
            }
        }

        return [$pos, $visited];
    }

    public function solvePart1(string $input)
    {
        $instructions = $this->parseInput($input);
        [$pos,] = $this->travel($instructions);
        return abs($pos['y']) + abs($pos['x']);
    }

    public function solvePart2(string $input)
    {
        $instructions = $this->parseInput($input);
        [,$visited] = $this->travel($instructions);
        foreach ($visited as $coords => $num) {
            if (2 === $num) {
                [$y, $x] = explode(',', $coords);
                return abs((int) $y) + abs((int) $x);
            }
        }
    }
}
