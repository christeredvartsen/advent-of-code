<?php declare(strict_types=1);
namespace AoC\Y2016;

use AoC\Solver;

class Dec07 implements Solver
{
    public function solvePart1(string $input)
    {
        $tls = 0;

        foreach (explode(PHP_EOL, $input) as $line) {
            if (preg_match('/\[[a-z]*?([a-z])(?!\\1)([a-z])\\2\\1[a-z]*?\]/', $line)) {
                continue;
            }

            $tls += preg_match('/([a-z])(?!\\1)([a-z])\\2\\1/', $line);
        }

        return $tls;
    }

    public function solvePart2(string $input)
    {
        $ssl = 0;

        foreach (explode(PHP_EOL, $input) as $line) {
            if (!preg_match_all('/\[[a-z]*?([a-z])(?!\\1)([a-z])\\1[a-z]*?\]/', $line, $matches)) {
                continue;
            }

            $hypernets = $matches[0];
            $abas = [];

            foreach ($hypernets as $hypernet) {
                for ($i = 1; $i < strlen($hypernet) - 3; $i++) {
                    if ($hypernet[$i] === $hypernet[$i + 2]) {
                        $abas[] = $hypernet[$i + 1] . $hypernet[$i] . $hypernet[$i + 1];
                    }
                }
            }

            $supernets = implode(',', array_values(array_filter(preg_split('/\[[a-z]+\]/', $line))));

            foreach ($abas as $aba) {
                if (false !== strpos($supernets, $aba)) {
                    ++$ssl;
                    continue 2;
                }
            }
        }

        return $ssl;
    }
}
