<?php declare(strict_types=1);
namespace AoC\Y2021;

use AoC\Solver;
use function AoC\stringToStrings;

class Dec03 implements Solver
{
    private function split(array $report, int $index): array
    {
        $zeroes = $ones = [];

        foreach ($report as $bin) {
            if ('0' === $bin[$index]) {
                $zeroes[] = $bin;
            } else {
                $ones[] = $bin;
            }
        }

        return [$zeroes, $ones];
    }

    private function getMostCommon(array $data): string
    {
        $len = strlen($data[0]);
        $mostCommon = [];

        for ($i = 0; $i < $len; $i++) {
            [$z, $o] = $this->split($data, $i);
            $mostCommon[] = count($z) > count($o) ? 0 : 1;
        }

        return implode('', $mostCommon);
    }

    private function flip(string $bin): string
    {
        return implode(array_map(
            fn (string $b): int => '0' === $b ? 1 : 0,
            str_split($bin),
        ));
    }

    public function solvePart1(string $input): int
    {
        $gamma = $this->getMostCommon(stringToStrings($input));
        $epsilon = $this->flip($gamma);
        return bindec($gamma) * bindec($epsilon);
    }

    public function solvePart2(string $input): int
    {
        $input = stringToStrings($input);
        $oxygenGeneratorRating = $co2ScrubberRating = '';

        $len = $input[0];
        $rest = $input;

        for ($i = 0; $i < $len; $i++) {
            [$z, $o] = $this->split($rest, $i);
            $rest = count($z) > count($o) ? $z : $o;

            if (1 === count($rest)) {
                $oxygenGeneratorRating = $rest[0];
                break;
            }
        }

        $rest = $input;

        for ($i = 0; $i < $len; $i++) {
            [$z, $o] = $this->split($rest, $i);
            $rest = count($z) <= count($o) ? $z : $o;

            if (1 === count($rest)) {
                $co2ScrubberRating = $rest[0];
                break;
            }
        }

        return bindec($oxygenGeneratorRating) * bindec($co2ScrubberRating);
    }
}
