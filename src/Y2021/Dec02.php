<?php declare(strict_types=1);
namespace AoC\Y2021;

use AoC\Solver;

use function AoC\stringToStrings;

class Dec02 implements Solver
{
    private const FORWARD = 'forward';
    private const UP      = 'up';
    private const DOWN    = 'down';

    private function parseInstruction(string $instruction): array
    {
        $parts = explode(' ', $instruction);
        return [$parts[0], (int) $parts[1]];
    }

    public function solvePart1(string $input)
    {
        $input = stringToStrings($input);
        $position = $depth = 0;

        foreach ($input as $instruction) {
            [$command, $amount] = $this->parseInstruction($instruction);

            if (self::FORWARD === $command) {
                $position += $amount;
            } elseif (self::UP === $command) {
                $depth -= $amount;
            } elseif (self::DOWN === $command) {
                $depth += $amount;
            }
        }

        return $position * $depth;
    }

    public function solvePart2(string $input)
    {
        $input = stringToStrings($input);
        $aim = $position = $depth = 0;

        foreach ($input as $instruction) {
            [$command, $amount] = $this->parseInstruction($instruction);

            if (self::FORWARD === $command) {
                $position += $amount;
                $depth += ($aim * $amount);
            } elseif (self::UP === $command) {
                $aim -= $amount;
            } elseif (self::DOWN === $command) {
                $aim += $amount;
            }
        }

        return $position * $depth;
    }
}
