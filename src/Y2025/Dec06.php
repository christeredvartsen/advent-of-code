<?php declare(strict_types=1);
namespace AoC\Y2025;

use AoC\Solver;

use function AoC\stringToStrings;

class Dec06 implements Solver
{
    public function solvePart1(string $input)
    {
        $rows = stringToStrings($input);
        $numRows = count($rows);
        $ops = array_map(
            fn (string $o): callable => $o === '+' ? 'array_sum' : 'array_product',
            preg_split('/\s+/', $rows[$numRows - 1]),
        );
        $cols = [];

        for ($i = 0; $i < $numRows - 1; $i++) {
            foreach (preg_split('/\s+/', $rows[$i]) as $j => $num) {
                $cols[$j][] = (int) $num;
            }
        }

        $sum = 0;

        foreach ($cols as $i => $col) {
            $sum += $ops[$i]($col);
        }

        return $sum;
    }

    public function solvePart2(string $input)
    {
        $rows = explode(PHP_EOL, $input);
        $numRows = count($rows);
        $lineLength = strlen($rows[0]);

        $col = [];
        $op = '';
        $sum = 0;
        for ($c = $lineLength - 1; $c >= 0; $c--) {
            $num = '';
            for ($r = 0; $r < $numRows - 1; $r++) {
                $num .= $rows[$r][$c];

                if ($rows[$r + 1][$c] === '+' || $rows[$r + 1][$c] === '*') {
                    $op = $rows[$r + 1][$c] === '+' ? 'array_sum' : 'array_product';
                    break;
                }
            }

            $col[] = (int) $num;

            if ($op !== '') {
                $sum += $op($col);
                $col = [];
                $op = '';
                $c--;
            }
        }

        return $sum;
    }
}
