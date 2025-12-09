<?php declare(strict_types=1);
namespace AoC\Y2025;

use AoC\Solver;

use function AoC\distance;
use function AoC\stringToStrings;

class Dec08 implements Solver
{
    private array $circuits;

    private function findSet(int $x): int
    {
        return $this->circuits[$x] === $x ? $x : $this->findSet($this->circuits[$x]);
    }

    public function solve(string $input)
    {
        $boxes = array_map(
            fn (string $line): array => array_map('intval', explode(',', $line)),
            stringToStrings($input),
        );
        $numBoxes = count($boxes);
        $this->circuits = range(0, $numBoxes - 1);
        $distances = [];

        for ($i = 0; $i < $numBoxes; $i++) {
            for ($j = $i + 1; $j < $numBoxes; $j++) {
                $distances[] = [$i, $j, distance($boxes[$i], $boxes[$j])];
            }
        }

        array_multisort(array_column($distances, 2), $distances);

        $numDistances = count($distances);
        $part1 = $connections = 0;
        $limit = $numBoxes === 20 ? 10 : 1000;

        // https://en.wikipedia.org/wiki/Kruskal%27s_algorithm
        for ($i = 0; $i < $numDistances; $i++) {
            if ($i === $limit) {
                $circuit = [];

                for ($x = 0; $x < $numBoxes; $x++) {
                    $root = $this->findSet($x);
                    $circuit[$root] = ($circuit[$root] ?? 0) + 1;
                }

                rsort($circuit);
                $part1 = $circuit[0] * $circuit[1] * $circuit[2];
            }

            [$u, $v] = $distances[$i];
            $ru = $this->findSet($u);
            $rv = $this->findSet($v);

            if ($ru !== $rv) {
                $connections++;

                if ($connections === $numBoxes - 1) {
                    return [$part1, $boxes[$u][0] * $boxes[$v][0]];
                }

                $this->circuits[$ru] = $rv;
            }
        }
    }

    public function solvePart1(string $input)
    {
        return $this->solve($input)[0];
    }

    public function solvePart2(string $input)
    {
        return $this->solve($input)[1];
    }
}
