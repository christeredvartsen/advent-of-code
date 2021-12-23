<?php declare(strict_types=1);
namespace AoC\Y2016;

use AoC\Solver;
use RuntimeException;

class Dec04 implements Solver
{
    private function getRealRooms(array $rooms): array
    {
        $realRooms = [];

        foreach ($rooms as $room) {
            preg_match('/([a-z-]+?)-(\d+)\[([a-z]+)\]/', $room, $matches);
            [$encryptedName, $id, $checksum] = array_slice($matches, 1);
            $chars = [];

            foreach (str_split($encryptedName) as $char) {
                $chars[$char] = isset($chars[$char]) ? $chars[$char] + 1 : 1;
            }

            unset($chars['-']);
            uksort($chars, fn (string $a, string $b): int => (($chars[$a] <=> $chars[$b]) * -1) ?: strcmp($a, $b));

            if (substr(implode('', array_keys($chars)), 0, 5) === $checksum) {
                $realRooms[] = [$encryptedName, (int) $id];
            }
        }

        return $realRooms;
    }

    public function solvePart1(string $input)
    {
        return array_sum(array_column($this->getRealRooms(explode(PHP_EOL, $input)), 1));
    }

    public function solvePart2(string $input)
    {
        $letters = 'abcdefghijklmnopqrstuvwxyz';

        foreach ($this->getRealRooms(explode(PHP_EOL, $input)) as [$room, $id]) {
            $room = preg_replace_callback(
                '/./',
                fn (array $m): string => '-' === $m[0] ? ' ' : $letters[((ord($m[0]) - 71 + $id % 26) % 26)],
                $room,
            );

            if ('northpole object storage' === $room) {
                return $id;
            }
        }

        throw new RuntimeException('No solution :(');
    }
}
