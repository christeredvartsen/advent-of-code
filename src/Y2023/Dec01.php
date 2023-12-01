<?php declare(strict_types=1);
namespace AoC\Y2023;

use AoC\Solver;

class Dec01 implements Solver
{
    public function solvePart1(string $input)
    {
        $sum = 0;

        foreach (explode(PHP_EOL, $input) as $line) {
            preg_match_all('/\d/', $line, $matches);
            $sum += (int) ($matches[0][0] . end($matches[0]));
        }

        return $sum;
    }

    public function solvePart2(string $input)
    {
        $digit = fn (string $digit): string => match ($digit) {
            'one',   '1' => '1',
            'two',   '2' => '2',
            'three', '3' => '3',
            'four',  '4' => '4',
            'five',  '5' => '5',
            'six',   '6' => '6',
            'seven', '7' => '7',
            'eight', '8' => '8',
            'nine',  '9' => '9',
        };
        $digits = 'one|two|three|four|five|six|seven|eight|nine|[0-9]';
        $sum = 0;

        foreach (explode(PHP_EOL, $input) as $line) {
            preg_match(sprintf('/^.*?(?<digit>%s)/', $digits), $line, $first);
            preg_match(sprintf('/^.*(?<digit>%s)/', $digits), $line, $last);
            $sum += (int) ($digit($first['digit']) . $digit($last['digit']));
        }

        return $sum;
    }
}
