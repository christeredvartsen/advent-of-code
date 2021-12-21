<?php declare(strict_types=1);
namespace AoC\Y2015;

use PHPUnit\Framework\TestCase;
use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2015\Dec08
 */
class Dec08Test extends TestCase
{
    private Dec08 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec08();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            1350,
            $this->solver->solvePart1(getInputFile(8, 2015)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            2085,
            $this->solver->solvePart2(getInputFile(8, 2015)),
        );
    }
}
