<?php declare(strict_types=1);
namespace AoC\Y2015;

use PHPUnit\Framework\TestCase;
use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2015\Dec07
 */
class Dec07Test extends TestCase
{
    private Dec07 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec07();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            3176,
            $this->solver->solvePart1(getInputFile(7, 2015)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            14710,
            $this->solver->solvePart2(getInputFile(7, 2015)),
        );
    }
}
