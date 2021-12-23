<?php declare(strict_types=1);
namespace AoC\Y2016;

use AoC\Solver;

class Dec06 implements Solver
{
    private function getMessage(string $input, string $sort): string
    {
        $lines = array_map('str_split', explode(PHP_EOL, $input));
        $message = '';

        for ($i = 0; $i < count($lines[0]); $i++) {
            $count = count_chars(implode('', array_column($lines, $i)), 1);
            $sort($count);
            $message .= chr(key($count));
        }

        return $message;
    }

    public function solvePart1(string $input)
    {
        return $this->getMessage($input, 'arsort');
    }

    public function solvePart2(string $input)
    {
        return $this->getMessage($input, 'asort');
    }
}
