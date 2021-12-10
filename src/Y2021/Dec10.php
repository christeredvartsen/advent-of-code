<?php declare(strict_types=1);
namespace AoC\Y2021;

use AoC\Solver;

class Dec10 implements Solver
{
    public const CLOSERS = [
        '<' => '>',
        '[' => ']',
        '(' => ')',
        '{' => '}',
    ];

    public const OPENERS = [
        '>' => '<',
        ']' => '[',
        ')' => '(',
        '}' => '{',
    ];

    public const SYNTAX_ERROR_SCORE = [
        ')' => 3,
        ']' => 57,
        '}' => 1197,
        '>' => 25137,
    ];

    public const AUTOCOMPLETE_SCORE = [
        ')' => 1,
        ']' => 2,
        '}' => 3,
        '>' => 4,
    ];

    private function parseInput(string $input): array
    {
        return array_map(
            fn (string $line): array => str_split(trim($line)),
            explode(PHP_EOL, trim($input)),
        );
    }

    private function getLineScore(array $line): array
    {
        $len = count($line);
        $score = 0;
        $openers = [];

        for ($i = 0; $i < $len; $i++) {
            $char = $line[$i];

            if (isset(self::CLOSERS[$char])) {
                $openers[] = $char;
            } else {
                $opener = array_pop($openers);

                if (self::OPENERS[$char] !== $opener) {
                    $score += self::SYNTAX_ERROR_SCORE[$char];
                    continue;
                }
            }
        }

        if (0 !== $score) {
            return [$score, true];
        }

        while ($opener = array_pop($openers)) {
            $score = $score * 5 + self::AUTOCOMPLETE_SCORE[self::CLOSERS[$opener]];
        }

        return [$score, false];
    }

    public function solvePart1(string $input): int
    {
        $sum = 0;
        $scores = array_map(
            fn (array $line): array => $this->getLineScore($line),
            $this->parseInput($input),
        );

        foreach ($scores as [$score, $broken]) {
            if ($broken) {
                $sum += $score;
            }
        }

        return $sum;
    }

    public function solvePart2(string $input): int
    {
        $scores = array_map(
            fn (array $score): int => $score[0],
            array_filter(
                array_map(
                    fn (array $line): array => $this->getLineScore($line),
                    $this->parseInput($input),
                ),
                fn (array $line): bool => !$line[1],
            ),
        );
        sort($scores);
        return $scores[floor(count($scores) / 2)];
    }
}
