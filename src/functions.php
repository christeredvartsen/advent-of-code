<?php declare(strict_types=1);
namespace AoC;

use InvalidArgumentException;

/**
 * Convert a multiline string to an array of ints
 *
 * @param string $input
 * @return array<int>
 */
function stringToInts(string $input): array
{
    return array_map('intval', stringToStrings($input));
}

/**
 * Convert a multiline string to an array of strings
 *
 * @param string $input
 * @return array<string>
 */
function stringToStrings(string $input): array
{
    return array_map('trim', array_filter(explode(PHP_EOL, $input)));
}

/**
 * Get the trimmed input for a specific day
 *
 * @param int $day
 * @param int $year
 * @throws InvalidArgumentException
 * @return string
 */
function getInputFile(int $day, int $year): string
{
    $input = dirname(__DIR__) . '/input/' . $year . '/' . sprintf('%02d.txt', $day);

    if (!file_exists($input)) {
        throw new InvalidArgumentException(sprintf('Input %s does not exist', $input));
    }

    return trim(file_get_contents($input));
}

/**
 * Check if a number is even
 *
 * @param int $int
 * @return bool
 */
function isEven(int $int): bool
{
    return 0 === ($int % 2);
}

/**
 * Get the median from a list of numbers
 *
 * @param array<float> $values
 * @return int
 */
function median(array $values, bool $isSorted = true): float
{
    if (!$isSorted) {
        sort($values);
    }

    $num = count($values);
    $center = $num / 2;

    if (isEven($num)) {
        return ($values[$center - 1] + $values[$center]) / 2;
    }

    return $values[floor($center)];
}

/**
 * Calculate the nth triangular number
 *
 * @param int $n
 * @return int
 */
function triangular(int $n): int
{
    return ($n * ($n + 1)) / 2;
}

/**
 * Get the last number in the series adding up to the triangular number
 *
 * @param int $triangular
 * @return int
 */
function reverseTriangular(int $triangular): int
{
    return (int) floor(sqrt($triangular * 2));
}

/**
 * Calculate the diff between two numbers
 *
 * @param int $a
 * @param int $b
 * @return int
 */
function diff(int $a, int $b): int
{
    return (int) abs($a - $b);
}

/**
 * Get the average of a list of numbers
 *
 * @param array<float> $values
 * @return float
 */
function avg(array $values): float
{
    return array_sum($values) / count($values);
}

/**
 * Sort letters in a string
 *
 * @param string $string
 * @param bool $reverse
 * @return string
 */
function sortString(string $string, bool $reverse = false): string
{
    $letters = str_split($string);

    if ($reverse) {
        rsort($letters);
    } else {
        sort($letters);
    }

    return implode($letters);
}

/**
 * Check if value $x is between $min and $max
 *
 *
 */
function isBetween(int $x, int $min, int $max, bool $inclusive = true): bool
{
    return $inclusive
    ? $x >= $min && $x <= $max
    : $x > $min && $x < $max;
}
