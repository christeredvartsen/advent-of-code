<?php declare(strict_types=1);
namespace AoC\Y2021;

use AoC\Solver;

use function AoC\reverseTriangular;

class Dec17 implements Solver
{
    private function parseInput(string $input): array
    {
        preg_match('/x=(-?\d+)..(-?\d+), y=(-?\d+)..(-?\d+)/', $input, $match);
        return array_slice(array_map('intval', $match), 1);
    }

    private function getTargetHits(int $x1, int $x2, int $y1, int $y2): array
    {
        $hits = [];

        for ($vX = reverseTriangular($x1); $vX <= $x2; $vX++) {
            for ($vY = $y1; $vY < -$y1; $vY++) {
                $velocity = [
                    'x' => $vX,
                    'y' => $vY,
                ];

                $x = 0;
                $y = 0;
                $maxY = 0;

                do {
                    $x += $velocity['x'];
                    $y += $velocity['y'];

                    if ($velocity['x'] !== 0) {
                        $velocity['x'] -= 1;
                    }

                    $velocity['y'] -= 1;

                    if ($y > $maxY) {
                        $maxY = $y;
                    }

                    if ($x >= $x1 && $x <= $x2 && $y >= $y1 && $y <= $y2) {
                        $hits[] = $maxY;
                        break;
                    }
                } while ($x <= $x2 && $y >= $y1);
            }
        }

        return $hits;
    }

    public function solvePart1(string $input)
    {
        return max($this->getTargetHits(...$this->parseInput($input)));
    }

    public function solvePart2(string $input)
    {
        return count($this->getTargetHits(...$this->parseInput($input)));
    }
}
