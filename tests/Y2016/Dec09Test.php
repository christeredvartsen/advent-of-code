<?php declare(strict_types=1);
namespace AoC\Y2016;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile;

/**
 * @coversDefaultClass AoC\Y2016\Dec09
 */
class Dec09Test extends TestCase
{
    private Dec09 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec09();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(6, $this->solver->solvePart1('ADVENT'));
        $this->assertSame(7, $this->solver->solvePart1('A(1x5)BC'));
        $this->assertSame(9, $this->solver->solvePart1('(3x3)XYZ'));
        $this->assertSame(11, $this->solver->solvePart1('A(2x2)BCD(2x2)EFG'));
        $this->assertSame(6, $this->solver->solvePart1('(6x1)(1x3)A'));
        $this->assertSame(18, $this->solver->solvePart1('X(8x2)(3x3)ABCY'));

        $this->assertSame(
            112830,
            $this->solver->solvePart1(getInputFile(9, 2016)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(6, $this->solver->solvePart2('ADVENT'));
        $this->assertSame(9, $this->solver->solvePart2('(3x3)XYZ'));
        $this->assertSame(20, $this->solver->solvePart2('X(8x2)(3x3)ABCY'));
        $this->assertSame(241920, $this->solver->solvePart2('(27x12)(20x12)(13x14)(7x10)(1x12)A'));
        $this->assertSame(445, $this->solver->solvePart2('(25x3)(3x3)ABC(2x3)XY(5x2)PQRSTX(18x9)(3x2)TWO(5x7)SEVEN'));

        $this->assertSame(
            10931789799,
            $this->solver->solvePart2(getInputFile(9, 2016)),
        );
    }
}
