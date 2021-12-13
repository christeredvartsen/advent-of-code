<?php declare(strict_types=1);
namespace AoC\Y2021;

use AoC\Solver;

class Dec13 implements Solver
{
    private function parseInput(string $input): array
    {
        [$dots, $folds] = explode(PHP_EOL . PHP_EOL, trim($input));
        $dots = explode(PHP_EOL, $dots);
        $folds = explode(PHP_EOL, $folds);

        $dots = array_combine(
            $dots,
            array_map(
                fn (string $dot): array => array_map('intval', explode(',', $dot)),
                $dots,
            ),
        );

        $folds = array_map(function (string $fold): array {
            $parts = explode('=', $fold);
            return [trim($parts[0]), (int) $parts[1]];
        }, $folds);

        return [$dots, $folds];
    }

    private function fold(array $dots, array $folds): array
    {
        foreach ($folds as [$direction, $fold]) {
            $adjuster = fn (int $coord): int => $coord - (($coord - $fold) * 2);
            $coordToAdjust = 'fold along y' === $direction ? 'y' : 'x';

            foreach ($dots as $key => [$x, $y]) {
                if (${$coordToAdjust} >= $fold) {
                    ${$coordToAdjust} = $adjuster(${$coordToAdjust});
                    $dots[$x . ',' . $y] = [$x, $y];
                    unset($dots[$key]);
                }
            }
        }

        return $dots;
    }

    public function solvePart1(string $input): int
    {
        [$dots, $folds] = $this->parseInput($input);
        return count($this->fold($dots, [$folds[0]]));
    }

    public function solvePart2(string $input): int
    {
        [$dots, $folds] = $this->parseInput($input);
        $dots = $this->fold($dots, $folds);
        $rows = max(array_column($dots, 1)) + 1;
        $cols = max(array_column($dots, 0)) + 1;

        $output = '';

        for ($y = 0; $y < $rows; $y++) {
            for ($x = 0; $x < $cols; $x++) {
                $output .= (isset($dots[$x . ',' . $y]) ? '#' : '.');
            }
            $output .= PHP_EOL;
        }

        echo trim($output);

        return 0;
    }
}
