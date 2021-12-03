<?php declare(strict_types=1);
namespace AoC;

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
