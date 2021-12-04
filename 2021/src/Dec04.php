<?php declare(strict_types=1);
namespace AoC;

use RuntimeException;

class Dec04 implements Solver
{
    private array $nums;
    private array $boards;
    private int $numBoards;

    public function __construct(string $input)
    {
        $input = trim(str_replace(
            ['  ', PHP_EOL . PHP_EOL],
            [' ', PHP_EOL],
            $input,
        ));
        [$nums, $boards] = explode(PHP_EOL, $input, 2);

        $this->nums = array_map('intval', explode(',', $nums));

        $boardRows = array_map(
            fn (string $nums): array => array_map('intval', explode(' ', trim($nums))),
            explode(PHP_EOL, $boards),
        );

        $this->boards = array_chunk(
            $boardRows,
            5,
        );

        $this->numBoards = count($this->boards);
    }

    private function shoutNumber(int $number, bool $returnFirstWinningBoard = true): array
    {
        $winningBoards = [];

        for ($board = 0; $board < $this->numBoards; $board++) {
            for ($row = 0; $row < 5; $row++) {
                for ($col = 0; $col < 5; $col++) {
                    if ($number === $this->boards[$board][$row][$col]) {
                        $this->boards[$board][$row][$col] = true;
                    }
                }
            }

            if ($unmarkedSum = $this->bingo($this->boards[$board])) {
                $winningBoard = [
                    'score' => $number * $unmarkedSum,
                    'index' => $board,
                ];

                if ($returnFirstWinningBoard) {
                    return [$winningBoard];
                }

                $winningBoards[] = $winningBoard;
            }
        }

        return $winningBoards;
    }

    private function bingo(array $board): int
    {
        $bingo = false;
        $boardScore = 0;

        for ($row = 0; $row < 5; $row++) {
            $unmarked = 0;

            for ($col = 0; $col < 5; $col++) {
                if (true !== $board[$row][$col]) {
                    $boardScore += $board[$row][$col];
                    $unmarked++;
                }
            }

            if (0 === $unmarked) {
                $bingo = true;
            }
        }

        if ($bingo) {
            return $boardScore;
        }

        for ($col = 0; $col < 5; $col++) {
            $unmarked = 0;

            for ($row = 0; $row < 5; $row++) {
                if (true !== $board[$row][$col]) {
                    $unmarked++;
                }
            }

            if (0 === $unmarked) {
                return $boardScore;
            }
        }

        return 0;
    }

    public function solvePart1(): int
    {
        $len = count($this->nums);

        for ($i = 0; $i < $len; $i++) {
            $winningBoards = $this->shoutNumber($this->nums[$i]);

            if ([] !== $winningBoards) {
                return $winningBoards[0]['score'];
            }
        }

        throw new RuntimeException('No winner :(');
    }

    public function solvePart2(): int
    {
        $len = count($this->nums);

        for ($i = 0; $i < $len; $i++) {
            $winningBoards = $this->shoutNumber($this->nums[$i], false);

            if ([] !== $winningBoards) {
                foreach ($winningBoards as $winner) {
                    unset($this->boards[$winner['index']]);
                    $this->numBoards--;
                }

                $this->boards = array_values($this->boards);

                if (0 === $this->numBoards) {
                    return $winner['score'];
                }
            }
        }

        throw new RuntimeException('No winner :(');
    }
}
