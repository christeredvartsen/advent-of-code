<?php declare(strict_types=1);
namespace AoC\Y2017;

use AoC\Solver;

use function AoC\stringToStrings;

class Dec07 implements Solver
{
    private function getPrograms(string $input): array
    {
        $programs = [];
        foreach (stringToStrings($input) as $line) {
            preg_match('/(?<name>[a-z]+) \((?<weight>\d+)\)(?<rest>.*)?/', $line, $matches);

            $isHolding = '' !== $matches['rest']
            ? explode(', ', substr($matches['rest'], 4))
            : [];

            $programs[$matches['name']] = [
                'weight' => (int) $matches['weight'],
                'isHolding' => $isHolding,
                'heldBy' => [],
            ];
        }

        foreach ($programs as $name => $program) {
            foreach ($program['isHolding'] as $above) {
                $programs[$above]['heldBy'][] = $name;
            }
        }

        return [
            'programs' => $programs,
            'base' => key(array_filter(
                $programs,
                fn (array $program): bool => 0 === count($program['heldBy']),
            )),
        ];
    }

    private function findInbalance($programs, $currentLevel)
    {
        $levelWeights = [];
        foreach ($currentLevel as $program) {
            if (0 === count($programs[$program]['isHolding'])) {
                $levelWeights[$program] = $programs[$program]['weight'];
            } else {
                [$holdingWeight, $correctedWeight] = $this->findInbalance($programs, $programs[$program]['isHolding']);
                if (null !== $correctedWeight) {
                    return [null, $correctedWeight];
                }
                $levelWeights[$program] = $holdingWeight + $programs[$program]['weight'];
            }
        }

        $min = min($levelWeights);
        if ($min !== max($levelWeights)) {
            foreach ($levelWeights as $program => $weight) {
                if ($weight > $min) {
                    return [null, $programs[$program]['weight'] - ($weight - $min)];
                }
            }
        }

        return [array_sum($levelWeights), null];
    }

    public function solvePart1(string $input)
    {
        return $this->getPrograms($input)['base'];
    }

    public function solvePart2(string $input)
    {
        ['programs' => $programs, 'base' => $base] = $this->getPrograms($input);
        return $this->findInbalance($programs, $programs[$base]['isHolding'])[1];
    }
}
