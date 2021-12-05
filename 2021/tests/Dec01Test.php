<?php declare(strict_types=1);
namespace AoC;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass AoC\Dec01
 */
class Dec01Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        199
        200
        208
        210
        200
        207
        240
        269
        260
        263
    TESTINPUT;

    /**
     * @covers ::solvePart1
     * @covers ::solve
     */
    public function testSolveWithoutSlicing(): void
    {
        $this->assertSame(
            7,
            (new Dec01($this->testInput))->solvePart1(),
        );

        $this->assertSame(
            1692,
            (new Dec01(getInputFile(1)))->solvePart1(),
        );
    }

    /**
     * @covers ::solvePart2
     * @covers ::solve
     */
    public function testSolveWithSlicing(): void
    {
        $this->assertSame(
            5,
            (new Dec01($this->testInput))->solvePart2(),
        );

        $this->assertSame(
            1724,
            (new Dec01(getInputFile(1)))->solvePart2(),
        );
    }
}
