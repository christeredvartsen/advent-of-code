<?php declare(strict_types=1);
namespace AoC\Y2021;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile;

/**
 * @coversDefaultClass AoC\Y2021\Dec11
 */
class Dec11Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        5483143223
        2745854711
        5264556173
        6141336146
        6357385478
        4167524645
        2176841721
        6882881134
        4846848554
        5283751526
    TESTINPUT;

    private Dec11 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec11();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            1656,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            1665,
            $this->solver->solvePart1(getInputFile(11, 2021)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            195,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            235,
            $this->solver->solvePart2(getInputFile(11, 2021)),
        );
    }
}
