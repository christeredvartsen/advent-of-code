<?php declare(strict_types=1);
namespace AoC;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass AoC\Dec05
 */
class Dec05Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        0,9 -> 5,9
        8,0 -> 0,8
        9,4 -> 3,4
        2,2 -> 2,1
        7,0 -> 7,4
        6,4 -> 2,0
        0,9 -> 2,9
        3,4 -> 1,4
        0,0 -> 8,8
        5,5 -> 8,2
    TESTINPUT;

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            5,
            (new Dec05($this->testInput))->solvePart1(),
        );

        $this->assertSame(
            7473,
            (new Dec05(getInputFile(5)))->solvePart1(),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            12,
            (new Dec05($this->testInput))->solvePart2(),
        );

        $this->assertSame(
            24164,
            (new Dec05(getInputFile(5)))->solvePart2(),
        );
    }
}
