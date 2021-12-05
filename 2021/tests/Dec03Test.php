<?php declare(strict_types=1);
namespace AoC;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass AoC\Dec03
 */
class Dec03Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        00100
        11110
        10110
        10111
        10101
        01111
        00111
        11100
        10000
        11001
        00010
        01010
    TESTINPUT;

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            198,
            (new Dec03($this->testInput))->solvePart1(),
        );

        $this->assertSame(
            4147524,
            (new Dec03(getInputFile(3)))->solvePart1(),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            230,
            (new Dec03($this->testInput))->solvePart2(),
        );

        $this->assertSame(
            3570354,
            (new Dec03(getInputFile(3)))->solvePart2(),
        );
    }
}
