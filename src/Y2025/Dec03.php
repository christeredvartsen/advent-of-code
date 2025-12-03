<?php declare(strict_types=1);
namespace AoC\Y2025;

use AoC\Solver;

use function AoC\stringToStrings;

class Dec03 implements Solver
{
    private function bestBatteries(string $bank, int $num): int
    {
        $len = strlen($bank);
        $batteries = [];

        for ($i = 0; $i < $len; $i++) {
            $battery = $bank[$i];

            while ($batteries && end($batteries) < $battery && (count($batteries) - 1 + ($len - $i)) >= $num) {
                array_pop($batteries);
            }

            if (count($batteries) < $num) {
                $batteries[] = $battery;
            }
        }

        return (int) implode('', $batteries);
    }

    public function solvePart1(string $input)
    {
        $sum = 0;
        foreach (stringToStrings($input) as $bank) {
            $sum += $this->bestBatteries($bank, 2);
        }
        return $sum;
    }

    public function solvePart2(string $input)
    {
        $sum = 0;
        foreach (stringToStrings($input) as $bank) {
            $sum += $this->bestBatteries($bank, 12);
        }

        return $sum;
    }
}
