<?php declare(strict_types=1);
namespace AoC\Y2015;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2015\Dec10
 */
class Dec10Test extends TestCase
{
    private Dec10 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec10();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            360154,
            $this->solver->solvePart1(getInputFile(10, 2015)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            5103798,
            $this->solver->solvePart2(getInputFile(10, 2015)),
        );
    }
}
