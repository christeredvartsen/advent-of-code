<?php declare(strict_types=1);
namespace AoC\Y2025;

use AoC\Solver;

use function AoC\stringToInts;
use function AoC\stringToStrings;

const START = 0;
const END   = 1;

class Dec05 implements Solver
{
    private function parseInput(string $input): array
    {
        [$rangesPart, $idsPart] = explode("\n\n", $input);
        $ranges = [];

        foreach (stringToStrings($rangesPart) as $line) {
            [$start, $end] = explode('-', $line);
            $ranges[] = [(int) $start, (int) $end];
        }

        usort($ranges, fn (array $a, array $b): int => $a[0] <=> $b[0]);

        $merged = [];
        $numRanges = count($ranges);
        $current = $ranges[0];

        for ($i = 1; $i < $numRanges; $i++) {
            $range = $ranges[$i];

            if ($range[START] <= $current[END] || $range[START] === $current[END] + 1) {
                $current[END] = max($current[END], $range[END]);
                continue;
            }

            $merged[] = $current;
            $current = $range;
        }

        $merged[] = $current;

        return [$merged, stringToInts($idsPart)];
    }

    private function inRanges(int $id, array $ranges): int
    {
        $i = 0;
        $j = count($ranges) - 1;

        while ($i <= $j) {
            $mid = ($i + $j) >> 1;
            [$start, $end] = $ranges[$mid];

            if ($id < $start) {
                $j = $mid - 1;
            } elseif ($id > $end) {
                $i = $mid + 1;
            } else {
                return 1;
            }
        }

        return 0;
    }

    public function solvePart1(string $input)
    {
        [$ranges, $ids] = $this->parseInput($input);

        return array_reduce(
            $ids,
            fn (int $carry, int $id): int => $carry + $this->inRanges($id, $ranges),
            0,
        );
    }

    public function solvePart2(string $input)
    {
        [$ranges,] = $this->parseInput($input);

        return array_reduce(
            $ranges,
            fn (int $carry, array $r): int => $carry + ($r[END] - $r[START] + 1),
            0,
        );
    }
}
