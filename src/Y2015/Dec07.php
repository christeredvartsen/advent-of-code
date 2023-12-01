<?php declare(strict_types=1);
namespace AoC\Y2015;

use AoC\Solver;

class Dec07 implements Solver
{
    private function order(string $wire, array $wires, &$visited, &$orderedWires)
    {
        if (isset($visited[$wire])) {
            return;
        }

        $visited[$wire] = true;

        foreach ($wires[$wire] as $dep) {
            $this->order($dep, $wires, $visited, $orderedWires);
        }

        $orderedWires[] = $wire;
    }

    private function parseInput(string $input): array
    {
        $wires = [];
        $instructions = [];

        foreach (explode(PHP_EOL, $input) as $line) {
            [$instruction, $wire] = explode(' -> ', $line);
            preg_match_all('/([a-z]+)/', $instruction, $matches);
            $wires[$wire] = $matches[0];
            $instructions[$wire] = explode(' ', $instruction);
        }

        $visited = [];
        $orderedWires = [];

        foreach (array_keys($wires) as $wire) {
            $this->order($wire, $wires, $visited, $orderedWires);
        }

        foreach ($orderedWires as $wire) {
            $orderedInstructions[$wire] = $instructions[$wire];
        }

        return $orderedInstructions;
    }

    public function solvePart1(string $input)
    {
        return $this->executeInstructions($this->parseInput($input))['a'];
    }

    private function executeInstructions(array $instructions): array
    {
        $wires = [];
        $get = fn ($v, array $wires): int => is_numeric($v) ? (int) $v : $wires[$v];

        foreach ($instructions as $wire => $instruction) {
            $elements = count($instruction);

            if (1 === $elements) {
                $wires[$wire] = $get($instruction[0], $wires);
            } elseif (3 === $elements) {
                $a = $get($instruction[0], $wires);
                $b = $get($instruction[2], $wires);

                switch ($instruction[1]) {
                    case 'LSHIFT':
                        $wires[$wire] = ($a << $b);
                        break;
                    case 'RSHIFT':
                        $wires[$wire] = ($a >> $b);
                        break;
                    case 'AND':
                        $wires[$wire] = ($a & $b);
                        break;
                    case 'OR':
                        $wires[$wire] = ($a | $b);
                        break;
                }
            } else {
                $wires[$wire] = ~$get($instruction[1], $wires);
            }
        }

        return $wires;
    }

    public function solvePart2(string $input)
    {
        $instructions = $this->parseInput($input);
        $instructions['b'] = [$this->solvePart1($input)];
        return $this->executeInstructions($instructions)['a'];
    }
}
