<?php declare(strict_types=1);
namespace AoC;

use AoC\Dec04\Input;
use RuntimeException;

class Dec04 implements Solver
{
    private function shoutNumber(int $number, Input $input, bool $returnFirstWinningBoard = true): array
    {
        $winningBoards = [];

        for ($board = 0; $board < $input->numBoards; $board++) {
            for ($row = 0; $row < 5; $row++) {
                for ($col = 0; $col < 5; $col++) {
                    if ($number === $input->boards[$board][$row][$col]) {
                        $input->boards[$board][$row][$col] = true;
                    }
                }
            }

            if ($unmarkedSum = $this->bingo($input->boards[$board])) {
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

    public function solvePart1(string $input): int
    {
        $input = new Input($input);

        for ($i = 0; $i < $input->numNums; $i++) {
            $winningBoards = $this->shoutNumber($input->nums[$i], $input);

            if ([] !== $winningBoards) {
                return $winningBoards[0]['score'];
            }
        }

        throw new RuntimeException('No winner :(');
    }

    public function solvePart2(string $input): int
    {
        $input = new Input($input);

        for ($i = 0; $i < $input->numNums; $i++) {
            $winningBoards = $this->shoutNumber($input->nums[$i], $input, false);

            if ([] !== $winningBoards) {
                foreach ($winningBoards as $winner) {
                    unset($input->boards[$winner['index']]);
                    $input->numBoards--;
                }

                $input->boards = array_values($input->boards);

                if (0 === $input->numBoards) {
                    return $winner['score'];
                }
            }
        }

        throw new RuntimeException('No winner :(');
    }
}
