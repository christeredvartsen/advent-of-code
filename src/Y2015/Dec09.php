<?php declare(strict_types=1);
namespace AoC\Y2015;

use AoC\Solver;

class Dec09 implements Solver
{
    private function parseInput(string $input): array
    {
        $connections = [];

        foreach (explode(PHP_EOL, $input) as $travel) {
            [$from,,$to,,$distance] = explode(' ', $travel);

            if (!isset($connections[$from])) {
                $connections[$from] = [];
            }

            if (!isset($connections[$to])) {
                $connections[$to] = [];
            }

            $connections[$from][$to] = (int) $distance;
            $connections[$to][$from] = (int) $distance;
        }

        return $connections;
    }

    private function getCompleteRoutes(array $connections): array
    {
        $starts = array_keys($connections);
        $numLocations = count($starts);
        $incompleteRoutes = $completeRoutes = [];

        foreach ($starts as $start) {
            $incompleteRoutes[] = [
                'route' => [$start],
                'current' => $start,
                'distance' => 0,
            ];
        }

        while ($route = array_pop($incompleteRoutes)) {
            foreach ($connections[$route['current']] as $to => $distance) {
                if (in_array($to, $route['route'])) {
                    continue;
                }

                $newRoute = [
                    'route' => [...$route['route'], $to],
                    'current' => $to,
                    'distance' => $route['distance'] + $distance,
                ];

                if ($numLocations === count($newRoute['route'])) {
                    $completeRoutes[] = $newRoute['distance'];
                } else {
                    $incompleteRoutes[] = $newRoute;
                }
            }
        }

        return $completeRoutes;
    }

    public function solvePart1(string $input)
    {
        return min($this->getCompleteRoutes($this->parseInput($input)));
    }

    public function solvePart2(string $input)
    {
        return max($this->getCompleteRoutes($this->parseInput($input)));
    }
}
