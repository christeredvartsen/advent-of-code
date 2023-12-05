<?php declare(strict_types=1);
namespace AoC\Y2023;

use AoC\Solver;

use function AoC\stringToStrings;

class Dec04 implements Solver
{
    private function getCardPoints(string $card): int
    {
        [$cardNumbers, $myNumbers] = explode('|', explode(':', $card)[1]);
        return count(array_intersect(
            preg_split('/\s+/', trim($cardNumbers)),
            preg_split('/\s+/', trim($myNumbers)),
        ));
    }

    public function solvePart1(string $input)
    {
        return array_reduce(
            stringToStrings($input),
            fn (int $carry, string $card): int => $carry + (int) 2 ** ($this->getCardPoints($card) - 1),
            0,
        );
    }

    public function solvePart2(string $input)
    {
        $points = array_map(
            fn (string $card): int => $this->getCardPoints($card),
            stringToStrings($input),
        );
        $numCards = count($points);
        $cards = array_fill(0, $numCards, 1);

        for ($i = 0; $i < $numCards; $i++) {
            for ($o = 1; $o <= $points[$i]; $o++) {
                $cards[$i + $o] += $cards[$i];
            }
        }

        return array_sum($cards);
    }
}
