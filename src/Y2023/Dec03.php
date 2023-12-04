<?php declare(strict_types=1);
namespace AoC\Y2023;

use AoC\Solver;

use function AoC\stringToStrings;

class Dec03 implements Solver
{
    public function solvePart1(string $input)
    {
        $sum = 0;
        $lines = stringToStrings($input);

        foreach ($lines as $i => $line) {
            preg_match_all('/\d+/', $line, $matches, PREG_OFFSET_CAPTURE);

            foreach ($matches[0] as [$number, $offset]) {
                $start = max(0, $offset - 1);
                $length = $offset + strlen($number) - $start + 1;
                $possibleSymbols = [
                    substr($lines[$i - 1] ?? '', $start, $length),
                    substr($lines[$i] ?? '', $start, $length),
                    substr($lines[$i + 1] ?? '', $start, $length),
                ];

                if (0 < (int) preg_match('/[\*\=\+\-\%\@\/\&\#\$]/', implode('', $possibleSymbols))) {
                    $sum += (int) $number;
                }
            }
        }

        return $sum;
    }

    public function solvePart2(string $input)
    {
        $possibleGears = [];
        $lines = stringToStrings($input);
        $gearKey = fn (int $x, int $y): string => sprintf('%s:%s', $x, $y);

        foreach ($lines as $i => $line) {
            preg_match_all('/\d+/', $line, $matches, PREG_OFFSET_CAPTURE);

            foreach ($matches[0] as [$num, $offset]) {
                $start = max(0, $offset - 1);
                $end = $offset + strlen($num);
                $length = $end - $start + 1;

                if ('*' === ($line[$start] ?? '')) {
                    $key = $gearKey($i, $start);
                } elseif ('*' === ($line[$end] ?? '')) {
                    $key = $gearKey($i, $end);
                } elseif (false !== ($pos = strpos(substr($lines[$i - 1] ?? '', $start, $length), '*'))) {
                    $key = $gearKey($i - 1, $start + $pos);
                } elseif (false !== ($pos = strpos(substr($lines[$i + 1] ?? '', $start, $length), '*'))) {
                    $key = $gearKey($i + 1, $start + $pos);
                } else {
                    continue;
                }

                !isset($possibleGears[$key])
                ? $possibleGears[$key] = [$num]
                : $possibleGears[$key][] = $num;
            }
        }

        return array_reduce(
            array_filter(
                $possibleGears,
                fn (array $connectedNumbers): bool => 2 === count($connectedNumbers),
            ),
            fn (int $carry, array $numbers): int => $carry + $numbers[0] * $numbers[1],
            0,
        );
    }
}
