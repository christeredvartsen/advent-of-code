<?php declare(strict_types=1);
namespace AoC;

class Dec01 implements Solver
{
    /**
     * @var array<int>
     */
    private array $data;

    public function __construct(string $input)
    {
        $this->data = stringToInts($input);
    }

    public function solvePart1(): int
    {
        return $this->solve();
    }

    public function solvePart2(): int
    {
        return $this->solve(3);
    }

    public function solve(int $slice = 1): int
    {
        $increased = 0;

        for ($i = 0; $i < count($this->data) - $slice; $i++) {
            if (array_sum(array_slice($this->data, $i, $slice)) < array_sum(array_slice($this->data, $i + 1, $slice))) {
                $increased++;
            }
        }

        return $increased;
    }
}
