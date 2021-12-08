<?php declare(strict_types=1);
namespace AoC\Y2021;

use AoC\Solver;
use InvalidArgumentException;

class Dec08 implements Solver
{
    private function parseInput(string $input): array
    {
        $lines = explode(PHP_EOL, trim($input));
        $patterns = [];
        $outputs = [];

        foreach ($lines as $line) {
            $parts = explode('|', $line);
            $patterns[] = explode(' ', trim($parts[0]));
            $outputs[] = explode(' ', trim($parts[1]));
        }

        return [$patterns, $outputs];
    }

    private function getSnookerMaximum(array $patterns): array
    {
        $result = [];

        foreach ($patterns as $pattern) {
            $len = strlen($pattern);

            if (2 === $len) {
                $result[0] = $pattern;
            } elseif (3 === $len) {
                $result[2] = $pattern;
            } elseif (4 === $len) {
                $result[1] = $pattern;
            }
        }

        return $result;
    }

    private function getUniqueLetter(string ...$letters): string
    {
        $chars = count_chars(implode('', $letters), 1);
        return chr(array_flip($chars)[1]);
    }

    private function getA(string $one, string $seven): string
    {
        return $this->getUniqueLetter($one, $seven);
    }

    private function getB(array $charCount): string
    {
        return chr($charCount[6]);
    }

    private function getC(string $one, array $signalMapping): string
    {
        return str_replace($signalMapping['f'], '', $one);
    }

    private function getD(string $one, string $four, array $signalMapping): string
    {
        return $this->getUniqueLetter(str_replace($signalMapping['b'], '', $four), $one);
    }

    private function getE($charCount): string
    {
        return chr($charCount[4]);
    }

    private function getF($charCount): string
    {
        return chr($charCount[9]);
    }

    private function getG($signalMapping): string
    {
        return $this->getUniqueLetter('abcdefg', implode('', array_values(array_filter($signalMapping))));
    }

    private function getOutputDigit(array $output, array $mapping): int
    {
        $digit = '';

        foreach ($output as $scrambledSignal) {
            $len = strlen($scrambledSignal);
            $correctSignal = [];

            for ($i = 0; $i < $len; $i++) {
                $correctSignal[] = $mapping[$scrambledSignal[$i]];
            }

            sort($correctSignal);
            $digit .= $this->getDigit(implode('', $correctSignal));
        }

        return (int) $digit;
    }

    private function getDigit(string $signal): int
    {
        switch ($signal) {
            case 'abcefg': return 0;
            case 'cf': return 1;
            case 'acdeg': return 2;
            case 'acdfg': return 3;
            case 'bcdf': return 4;
            case 'abdfg': return 5;
            case 'abdefg': return 6;
            case 'acf': return 7;
            case 'abcdefg': return 8;
            case 'abcdfg': return 9;
        }

        throw new InvalidArgumentException('Invalid signal: ' . $signal);
    }

    public function solvePart1(string $input): int
    {
        return array_sum(
            array_map(
                fn (array $outputs): int => count(array_filter(
                    $outputs,
                    fn (string $o): bool => 2 === ($l = strlen($o)) || 3 === $l || 4 === $l || 7 === $l,
                )),
                $this->parseInput($input)[1],
            ),
        );
    }

    public function solvePart2(string $input): int
    {
        [$allPatterns, $allOutputs] = $this->parseInput($input);
        $emptyMapping = array_fill_keys(range('a', 'g'), null);
        $sum = 0;

        foreach ($allPatterns as $i => $patterns) {
            $signalMapping = $emptyMapping;
            $charCount = array_flip(count_chars(implode('', $patterns), 1));

            [$one, $four, $seven] = $this->getSnookerMaximum($patterns);

            $signalMapping['a'] = $this->getA($one, $seven);
            $signalMapping['b'] = $this->getB($charCount);
            $signalMapping['e'] = $this->getE($charCount);
            $signalMapping['f'] = $this->getF($charCount);
            $signalMapping['d'] = $this->getD($one, $four, $signalMapping);
            $signalMapping['c'] = $this->getC($one, $signalMapping);
            $signalMapping['g'] = $this->getG($signalMapping);

            $sum += $this->getOutputDigit($allOutputs[$i], array_flip($signalMapping));
        }

        return $sum;
    }
}
