<?php declare(strict_types=1);
namespace AoC\Y2021;

use AoC\Solver;
use InvalidArgumentException;

class Dec16 implements Solver
{
    public const MAPPING = [
        '0' => '0000',
        '1' => '0001',
        '2' => '0010',
        '3' => '0011',
        '4' => '0100',
        '5' => '0101',
        '6' => '0110',
        '7' => '0111',
        '8' => '1000',
        '9' => '1001',
        'A' => '1010',
        'B' => '1011',
        'C' => '1100',
        'D' => '1101',
        'E' => '1110',
        'F' => '1111',
    ];

    public const TYPE_SUM = 0;
    public const TYPE_PRODUCT = 1;
    public const TYPE_MIN = 2;
    public const TYPE_LITERAL = 4;
    public const TYPE_MAX = 3;
    public const TYPE_GT = 5;
    public const TYPE_LT = 6;
    public const TYPE_EQ = 7;

    private function parseInput(string $input): array
    {
        return $this->parseBits(
            $this->getBinaryString(trim($input)),
        );
    }

    private function getBinaryString(string $hex): string
    {
        return trim(str_replace(
            array_keys(self::MAPPING),
            array_values(self::MAPPING),
            $hex,
        ));
    }

    private function parseBits(string $bits, int $maxPackets = 0): array
    {
        $numPackets = 0;
        $packets = [];

        while ($bits) {
            $value = null;
            $subPackets = [];
            $version = bindec(substr($bits, 0, 3));
            $id = bindec(substr($bits, 3, 3));
            $bits = substr($bits, 6);

            if (!$bits) {
                break;
            } elseif (self::TYPE_LITERAL === $id) {
                $digit = '';

                do {
                    $prefix = $bits[0];
                    $digit .= substr($bits, 1, 4);
                    $bits = substr($bits, 5);
                } while ('1' === $prefix);

                $value = bindec($digit);
            } elseif ('0' === $bits[0]) {
                $length = bindec(substr($bits, 1, 15));
                $subPacketsAsBits = substr($bits, 16, $length);

                if (!$subPacketsAsBits) {
                    break;
                }

                $bits = substr($bits, 16 + $length);
                [$subPackets,] = $this->parseBits($subPacketsAsBits);
            } else {
                $numSubPackets = bindec(substr($bits, 1, 11));
                [$subPackets, $bits] = $this->parseBits(substr($bits, 12), $numSubPackets);
            }

            $packets[] = [
                'version'    => $version,
                'id'         => $id,
                'value'      => $value,
                'subPackets' => $subPackets,
            ];

            if (++$numPackets === $maxPackets) {
                break;
            }
        }

        return [$packets, $bits];
    }

    private function getVersionSum(array $packet): int
    {
        $sum = $packet['version'];

        foreach ($packet['subPackets'] as $sub) {
            $sum += $this->getVersionSum($sub);
        }

        return $sum;
    }

    private function getPacketValue(array $packet): int
    {
        $id = $packet['id'];

        if (self::TYPE_LITERAL === $id) {
            return $packet['value'];
        }

        $values = array_map(
            fn (array $p): int => $this->getPacketValue($p),
            $packet['subPackets'],
        );

        switch ($id) {
            case self::TYPE_SUM: return array_sum($values);
            case self::TYPE_PRODUCT: return array_product($values);
            case self::TYPE_MIN: return min($values);
            case self::TYPE_MAX: return max($values);
            case self::TYPE_GT: return (int) ($values[0] > $values[1]);
            case self::TYPE_LT: return (int) ($values[0] < $values[1]);
            case self::TYPE_EQ: return (int) ($values[0] === $values[1]);
            default: throw new InvalidArgumentException('Invalid type ID');
        }
    }

    public function solvePart1(string $input)
    {
        [$packets,] = $this->parseInput($input);
        return $this->getVersionSum($packets[0]);
    }

    public function solvePart2(string $input)
    {
        [$packets,] = $this->parseInput($input);
        return $this->getPacketValue($packets[0]);
    }
}
