<?php declare(strict_types=1);
namespace AoC\Y2016;

use AoC\Solver;

class Dec09 implements Solver
{
    private function getMarker(string $content): array
    {
        $marker = substr($content, 0, strpos($content, ')') + 1);
        [$chars, $repeat] = explode('x', trim($marker, '()'));
        return [(int) $chars, (int) $repeat, strlen($marker)];
    }

    private function getDecompressedLength(string $compressed, bool $nested = false): int
    {
        $decompressedLength = 0;
        $len = strlen($compressed);
        $i = 0;

        while ($i < $len) {
            if ($compressed[$i] === '(') {
                [$numChars, $repeat, $markerLength] = $this->getMarker(substr($compressed, $i));
                $chunk = substr($compressed, $i + $markerLength, $numChars);
                $decompressedLength += $repeat * ($nested ? $this->getDecompressedLength($chunk, true) : $numChars);
                $i += $markerLength + $numChars;
            } else {
                $decompressedLength += 1;
                $i += 1;
            }
        }

        return $decompressedLength;
    }

    public function solvePart1(string $input)
    {
        return $this->getDecompressedLength($input);
    }

    public function solvePart2(string $input)
    {
        return $this->getDecompressedLength($input, true);
    }
}
