<?php declare(strict_types=1);
namespace AoC\Y2015;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2015\Dec06
 */
class Dec06Test extends TestCase
{
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
            543903,
            $this->solver->solvePart1(getInputFile(6, 2015)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            14687245,
            $this->solver->solvePart2(getInputFile(6, 2015)),
        );
    }
}
