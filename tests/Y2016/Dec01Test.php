<?php declare(strict_types=1);
namespace AoC\Y2016;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2016\Dec01
 */
class Dec01Test extends TestCase
{
    private Dec01 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec01();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            234,
            $this->solver->solvePart1(getInputFile(1, 2016)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            113,
            $this->solver->solvePart2(getInputFile(1, 2016)),
        );
    }
}
