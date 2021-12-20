<?php declare(strict_types=1);
namespace AoC\Y2015;

use AoC\Solver;

class Dec06 implements Solver
{
    public const TOGGLE = 'toggle';
    public const ON = 'turn on';
    public const OFF = 'turn off';

    private function parseInput(string $instructions): array
    {
        return array_map(function (string $instruction): array {
            preg_match('/(turn on|turn off|toggle) (?:(\d+),(\d+)) through (?:(\d+),(\d+))/', $instruction, $matches);
            return [$matches[1], ...array_map('intval', array_slice($matches, 2))];
        }, explode(PHP_EOL, $instructions));
    }

    private function applyInstructionsToGrid(array $instructions, callable $knob): array
    {
        $grid = [];

        foreach ($instructions as [$instruction, $y1, $x1, $y2, $x2]) {
            for ($y = $y1; $y <= $y2; $y++) {
                for ($x = $x1; $x <= $x2; $x++) {
                    $pos = $y . ',' . $x;
                    $existing = isset($grid[$pos]) ? $grid[$pos] : 0;
                    $grid[$pos] = $knob($instruction, $existing);
                }
            }
        }

        return $grid;
    }

    public function solvePart1(string $input)
    {
        return array_sum($this->applyInstructionsToGrid(
            $this->parseInput($input),
            fn (string $i, int $v): int => self::TOGGLE === $i ? $v^1 : (self::ON === $i ? 1 : 0),
        ));
    }

    public function solvePart2(string $input)
    {
        return array_sum($this->applyInstructionsToGrid(
            $this->parseInput($input),
            fn (string $i, int $v): int => self::TOGGLE === $i ? $v + 2 : (self::ON === $i ? $v + 1 : max(0, $v - 1)),
        ));
    }
}
