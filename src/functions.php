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
 * Get the input for a specific day
 *
 * @param int $day
 * @param int $year
 */
function getInputFile(int $day, int $year = 2021): string {
    $input = __DIR__ . '/../' . $year . '/input/' . sprintf('%02d.txt', $day);

    if (!file_exists($input)) {
        throw new InvalidArgumentException(sprintf('Input %s does not exist', $input));
    }

    return file_get_contents($input);
}
