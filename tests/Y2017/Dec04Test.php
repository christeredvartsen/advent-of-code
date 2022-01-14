<?php declare(strict_types=1);
namespace AoC\Y2017;

use PHPUnit\Framework\TestCase;
use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2017\Dec04
 */
class Dec04Test extends TestCase
{
    private Dec04 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec04();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(386, $this->solver->solvePart1(getInputFile(4, 2017)));
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(208, $this->solver->solvePart2(getInputFile(4, 2017)));
    }
}
