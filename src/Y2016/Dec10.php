<?php declare(strict_types=1);
namespace AoC\Y2016;

use AoC\Solver;

class Dec10 implements Solver
{
    private function botWithValue(array $bot, int $value): array
    {
        if ([] === $bot) {
            return ['min' => $value, 'max' => null, 'instruction' => null];
        }

        if (null !== $bot['min'] && $value > $bot['min']) {
            return ['min' => $bot['min'], 'max' => $value, 'instruction' => $bot['instruction']];
        }

        return ['min' => $value, 'max' => $bot['min'], 'instruction' => $bot['instruction']];
    }

    private function botWithInstruction(array $bot, array $instruction): array
    {
        if ([] === $bot) {
            return ['min' => null, 'max' => null, 'instruction' => $instruction];
        }

        $bot['instruction'] = $instruction;
        return $bot;
    }

    private function parseInput(string $input): array
    {
        $bots = [];

        foreach (explode(PHP_EOL, $input) as $line) {
            if ('v' === $line[0]) {
                [,$value,,,,$id] = explode(' ', $line);
                $id = (int) $id;
                $bots[$id] = $this->botWithValue($bots[$id] ?? [], (int) $value);
            } else {
                [,$id,,,,$minTarget,$minId,,,,$maxTarget,$maxId] = explode(' ', $line);
                $id = (int) $id;
                $bots[$id] = $this->botWithInstruction($bots[$id] ?? [], [
                    'min' => [
                        'target' => $minTarget,
                        'id' => (int) $minId,
                    ],
                    'max' => [
                        'target' => $maxTarget,
                        'id' => (int) $maxId,
                    ],
                ]);
            }
        }

        return $bots;
    }

    private function runInstructions(array $bots, callable $halt = null): int
    {
        $outputs = [];

        while (true) {
            $done = true;

            foreach ($bots as $id => $bot) {
                if (null !== $bot['min'] && null !== $bot['max']) {
                    $done = false;
                    break;
                }
            }

            if ($done) {
                break;
            }

            if (null !== $halt && $halt($bot)) {
                return $id;
            }

            $instruction = $bot['instruction'];

            foreach (['min', 'max'] as $v) {
                if ('bot' === $instruction[$v]['target']) {
                    $bots[$instruction[$v]['id']] = $this->botWithValue($bots[$instruction[$v]['id']] ?? [], $bot[$v]);
                } else {
                    $outputs[$instruction[$v]['id']] = $bot[$v];
                }
            }

            $bots[$id] = ['min' => null, 'max' => null, 'instruction' => null];
        }

        return $outputs[0] * $outputs[1] * $outputs[2];
    }

    public function solvePart1(string $input)
    {
        $bots = $this->parseInput($input);
        return $this->runInstructions($bots, fn (array $bot): bool => 17 === $bot['min'] && 61 === $bot['max']);
    }

    public function solvePart2(string $input)
    {
        $bots = $this->parseInput($input);
        return $this->runInstructions($bots);
    }
}
