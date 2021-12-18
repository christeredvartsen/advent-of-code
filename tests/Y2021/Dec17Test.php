<?php declare(strict_types=1);
namespace AoC\Y2021;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile;

/**
 * @coversDefaultClass AoC\Y2021\Dec17
 */
class Dec17Test extends TestCase
{
    private string $testInput = 'target area: x=20..30, y=-10..-5';

    private Dec17 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec17();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            45,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            5253,
            $this->solver->solvePart1(getInputFile(17, 2021)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            112,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            1770,
            $this->solver->solvePart2(getInputFile(17, 2021)),
        );
    }
}
