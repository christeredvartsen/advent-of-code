<?php declare(strict_types=1);
namespace AoC\Y2016;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2016\Dec05
 */
class Dec05Test extends TestCase
{
    private string $testInput = 'abc';

    private Dec05 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec05();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            '18f47a30',
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            'f77a0e6e',
            $this->solver->solvePart1(getInputFile(5, 2016)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            '05ace8e3',
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            '999828ec',
            $this->solver->solvePart2(getInputFile(5, 2016)),
        );
    }
}
