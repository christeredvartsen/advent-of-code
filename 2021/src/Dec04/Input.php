<?php declare(strict_types=1);
namespace AoC\Dec04;

class Input
{
    public array $nums;
    public int $numNums;
    public array $boards;
    public int $numBoards;

    public function __construct(string $input)
    {
        $input = trim(str_replace(
            ['  ', PHP_EOL . PHP_EOL],
            [' ', PHP_EOL],
            $input,
        ));
        [$nums, $boards] = explode(PHP_EOL, $input, 2);

        $this->nums = array_map('intval', explode(',', $nums));
        $this->numNums = count($this->nums);

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
}
