<?php declare(strict_types=1);
namespace AoC\Y2015;

use AoC\Solver;

class Dec03 implements Solver
{
    private function deliverPresents(string $instructions, int $numSantas = 1): array
    {
        $houses['0,0'] = $numSantas;
        $santas = array_fill(0, $numSantas, ['x' => 0, 'y' => 0]);

        for ($i = 0; $i < strlen($instructions); $i++) {
            $santa = &$santas[$i % $numSantas];

            switch ($instructions[$i]) {
                case '^':
                    $santa['y'] -= 1;
                    break;
                case '>':
                    $santa['x'] += 1;
                    break;
                case '<':
                    $santa['x'] -= 1;
                    break;
                case 'v':
                    $santa['y'] += 1;
                    break;
            }

            $pos = $santa['x'] . ',' . $santa['y'];

            if (!isset($houses[$pos])) {
                $houses[$pos] = 1;
            } else {
                $houses[$pos] += 1;
            }
        }

        return $houses;
    }

    public function solvePart1(string $input)
    {
        return count($this->deliverPresents($input));
    }

    public function solvePart2(string $input)
    {
        return count($this->deliverPresents($input, 2));
    }
}
