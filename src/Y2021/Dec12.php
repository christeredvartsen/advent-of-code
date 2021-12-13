<?php declare(strict_types=1);
namespace AoC\Y2021;

use AoC\Solver;
use AoC\Y2021\Dec12\Cave;

class Dec12 implements Solver
{
    private function parseInput(string $input): array
    {
        $connections = array_map('trim', explode(PHP_EOL, trim($input)));
        $caves = [];

        foreach ($connections as $connection) {
            [$from, $to] = explode('-', $connection);

            if (!isset($caves[$from])) {
                $caves[$from] = new Cave($from);
            }

            if (!isset($caves[$to])) {
                $caves[$to] = new Cave($to);
            }

            if ('end' !== $from && 'start' !== $to) {
                $caves[$from]->connections[] = $caves[$to];
            }

            if ('start' !== $from && 'end' !== $to) {
                $caves[$to]->connections[] = $caves[$from];
            }
        }

        return $caves;
    }

    private function travelFrom(Cave $current, int &$numPaths, bool $twoVisitsAllowed = false, bool &$currentlyInCaveForTheSecondTime = false): void
    {
        if ($current->small) {
            $current->visited += 1;
        }

        $twiceInCave = false;

        foreach ($current->connections as $to) {
            if ($to->isEnd) {
                $numPaths += 1;
                continue;
            }

            if ($to->visited) {
                if ($twoVisitsAllowed && false === $currentlyInCaveForTheSecondTime) {
                    $currentlyInCaveForTheSecondTime = true;
                    $twiceInCave = true;
                } else {
                    continue;
                }
            }

            $this->travelFrom($to, $numPaths, $twoVisitsAllowed, $currentlyInCaveForTheSecondTime);

            if ($twiceInCave) {
                $currentlyInCaveForTheSecondTime = false;
            }
        }

        if ($current->small) {
            $current->visited -= 1;
        }
    }

    public function solvePart1(string $input)
    {
        $caves = $this->parseInput($input);
        $numPaths = 0;
        $this->travelFrom($caves['start'], $numPaths);
        return $numPaths;
    }

    public function solvePart2(string $input)
    {
        $caves = $this->parseInput($input);
        $numPaths = 0;
        $this->travelFrom($caves['start'], $numPaths, true);
        return $numPaths;
    }
}
