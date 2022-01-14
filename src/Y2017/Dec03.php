<?php declare(strict_types=1);
namespace AoC\Y2017;

use AoC\Solver;

class Dec03 implements Solver
{
    private array $turn = [
        'U' => 'L',
        'D' => 'R',
        'L' => 'D',
        'R' => 'U',
    ];

    private function shouldTurn(int $v, int $h): bool
    {
        if (
            (abs($v) === abs($h) && (-$v !== $h || $v > 0)) ||
            ($h - 1 === -$v && $v <= 0)
        ) {
            return true;
        }

        return false;
    }

    private function move(array $data): array
    {
        switch ($data['facing']) {
            case 'U': $data['v'] += 1; break;
            case 'D': $data['v'] -= 1; break;
            case 'L': $data['h'] -= 1; break;
            case 'R': $data['h'] += 1; break;
        }

        if ($this->shouldTurn($data['v'], $data['h'])) {
            $data['facing'] = $this->turn[$data['facing']];
        }

        return $data;
    }

    public function solvePart1(string $input)
    {
        $input = (int) $input;

        if (1 === $input) {
            return 0;
        }

        $data = [
            'facing' => 'R',
            'v' => 0,
            'h' => 0,
        ];

        for ($i = 0; $i < $input - 1; $i++) {
            $data = $this->move($data);
        }

        return abs($data['v']) + abs($data['h']);
    }

    public function solvePart2(string $input)
    {
        $input = (int) $input;
        $grid = [[1]];

        $data = [
            'facing' => 'R',
            'v' => 0,
            'h' => 0,
        ];

        while (true) {
            $data = $this->move($data);
            ['facing' => $facing, 'v' => $v, 'h' => $h] = $data;

            if ('U' === $facing) {
                $grid[$v][$h] =
                    ($grid[$v - 1][$h] ?? 0) +
                    ($grid[$v - 1][$h - 1] ?? 0) +
                    ($grid[$v][$h - 1] ?? 0) +
                    ($grid[$v + 1][$h - 1] ?? 0) +
                    ($grid[$v + 1][$h] ?? 0);
            } elseif ('L' === $facing) {
                $grid[$v][$h] =
                    ($grid[$v][$h + 1] ?? 0) +
                    ($grid[$v - 1][$h + 1] ?? 0) +
                    ($grid[$v - 1][$h] ?? 0) +
                    ($grid[$v - 1][$h - 1] ?? 0) +
                    ($grid[$v][$h - 1] ?? 0);
            } elseif ('D' === $facing) {
                $grid[$v][$h] =
                    ($grid[$v + 1][$h] ?? 0) +
                    ($grid[$v + 1][$h + 1] ?? 0) +
                    ($grid[$v][$h + 1] ?? 0) +
                    ($grid[$v - 1][$h + 1] ?? 0) +
                    ($grid[$v - 1][$h] ?? 0);
            } elseif ('R' === $facing) {
                $grid[$v][$h] =
                    ($grid[$v][$h - 1] ?? 0) +
                    ($grid[$v + 1][$h - 1] ?? 0) +
                    ($grid[$v + 1][$h] ?? 0) +
                    ($grid[$v + 1][$h + 1] ?? 0) +
                    ($grid[$v][$h + 1] ?? 0);
            }

            if ($grid[$v][$h] > $input) {
                return $grid[$v][$h];
            }
        }
    }
}
