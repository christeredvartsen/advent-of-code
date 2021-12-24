<?php declare(strict_types=1);
namespace AoC\Y2016;

use AoC\Solver;

class Dec08 implements Solver
{
    private int $screenWidth = 50;
    private int $screenHeight = 6;

    private function applyInstructionsToScreen(array $instructions): array
    {
        $screen = array_fill(0, $this->screenHeight, array_fill(0, $this->screenWidth, '.'));

        foreach ($instructions as $instruction) {
            preg_match('/^(?:rect (\d+)x(\d+)|rotate (?:row (y)|column (x))=(\d+) by (\d+))$/', $instruction, $match);

            if (3 === count($match)) {
                $width = (int) $match[1];
                $height = (int) $match[2];

                for ($y = 0; $y < $height; $y++) {
                    for ($x = 0; $x < $width; $x++) {
                        $screen[$y][$x] = '#';
                    }
                }
            } else {
                $rotate = $match[4];
                $pos = (int) $match[5];
                $amount = (int) $match[6];

                if ('x' === $rotate) {
                    foreach (array_column($screen, $pos) as $y => $v) {
                        $screen[($y + $amount) % $this->screenHeight][$pos] = $v;
                    }
                } else {
                    foreach ($screen[$pos] as $x => $v) {
                        $screen[$pos][($x + $amount) % $this->screenWidth] = $v;
                    }
                }
            }
        }

        $output = '';
        $numPixelsLit = 0;

        for ($y = 0; $y < $this->screenHeight; $y++) {
            for ($x = 0; $x < $this->screenWidth; $x++) {
                if ('#' === $screen[$y][$x]) {
                    ++$numPixelsLit;
                }

                $output .= $screen[$y][$x];
            }

            $output .= PHP_EOL;
        }

        return [trim($output), $numPixelsLit];
    }

    public function solvePart1(string $input)
    {
        [,$numPixelsLit] = $this->applyInstructionsToScreen(explode(PHP_EOL, $input));
        return $numPixelsLit;
    }

    public function solvePart2(string $input)
    {
        [$output,] = $this->applyInstructionsToScreen(explode(PHP_EOL, $input));
        return $output;
    }
}
