<?php declare(strict_types=1);
namespace AoC;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass AoC\Dec06
 */
class Dec06Test extends TestCase
{
    private string $testInput = '3,4,3,1,2';

    private Dec06 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec06();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            5934,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            371379,
            $this->solver->solvePart1(getInputFile(6)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            26984457539,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            1674303997472,
            $this->solver->solvePart2(getInputFile(6)),
        );
    }
}
