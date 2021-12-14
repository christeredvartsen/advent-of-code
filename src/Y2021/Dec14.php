<?php declare(strict_types=1);
namespace AoC\Y2021;

use AoC\Solver;

class Dec14 implements Solver
{
    private function parseInput(string $input): array
    {
        $lines = explode(PHP_EOL, trim($input));
        $numLines = count($lines);

        for ($i = 2; $i < $numLines; $i++) {
            [$from, $_, $to] = explode(' ', trim($lines[$i]));
            $mapping[$from] = $to;
        }

        return [$lines[0], $mapping];
    }

    private function getDiff(int $steps, string $template, array $mapping): int
    {
        $len = strlen($template) - 1;
        $stats = [];

        for ($i = 0; $i < $len; $i++) {
            $pair = $template[$i] . $template[$i + 1];
            $stats[$pair] = isset($stats[$pair]) ? $stats[$pair] + 1 : 1;
        }

        for ($step = 0; $step < $steps; $step++) {
            $updatedStats = [];

            foreach ($stats as $pair => $count) {
                $left = $pair[0] . $mapping[$pair];
                $right = $mapping[$pair] . $pair[1];
                $updatedStats[$left]  = isset($updatedStats[$left]) ? $updatedStats[$left] + $count : $count;
                $updatedStats[$right] = isset($updatedStats[$right]) ? $updatedStats[$right] + $count : $count;
            }

            $stats = $updatedStats;
        }

        foreach ($stats as $pair => $count) {
            $letters[$pair[0]] = isset($letters[$pair[0]]) ? $letters[$pair[0]] + $count : $count;
        }

        $letters[$template[-1]] += 1;
        sort($letters);

        return array_pop($letters) - $letters[0];
    }

    public function solvePart1(string $input)
    {
        return $this->getDiff(10, ...$this->parseInput($input));
    }

    public function solvePart2(string $input)
    {
        return $this->getDiff(40, ...$this->parseInput($input));
    }
}
