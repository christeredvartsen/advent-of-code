<?php declare(strict_types=1);
namespace AoC;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass AoC\Dec02
 */
class Dec02Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        forward 5
        down 5
        forward 8
        up 3
        down 8
        forward 2
    TESTINPUT;

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            150,
            (new Dec02($this->testInput))->solvePart1(),
        );

        $this->assertSame(
            1947824,
            (new Dec02(getInputFile(2)))->solvePart1(),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            900,
            (new Dec02($this->testInput))->solvePart2(),
        );

        $this->assertSame(
            1813062561,
            (new Dec02(getInputFile(2)))->solvePart2(),
        );
    }
}
