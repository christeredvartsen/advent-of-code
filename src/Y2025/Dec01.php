<?php declare(strict_types=1);
namespace AoC\Y2025;

use AoC\Solver;

use function AoC\divmod;
use function AoC\mod;
use function AoC\stringToStrings;

class Dec01 implements Solver
{
    private function distances(string $input): array
    {
        return array_map(
            fn (string $line): int => $line[0] === 'L'
            ? -((int) substr($line, 1))
            : (int) substr($line, 1),
            stringToStrings($input),
        );
    }
    public function solvePart1(string $input)
    {
        $password = 0;
        $position = 50;

        foreach ($this->distances($input) as $distance) {
            $position = mod($position + $distance, 100);
            if ($position === 0) {
                $password++;
            }
        }

        return $password;
    }

    public function solvePart2(string $input)
    {
        $password = 0;
        $position = 50;

        foreach ($this->distances($input) as $distance) {
            [$turns, $mod] = divmod($distance, $distance < 0 ? -100 : 100);
            $password += $turns;

            if (
                ($distance < 0 && $position !== 0 && $position + $mod <= 0)
                || ($position + $mod >= 100)
            ) {
                $password++;
            }

            $position = mod($position + $distance, 100);
        }

        return $password;
    }
}
