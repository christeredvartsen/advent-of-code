<?php declare(strict_types=1);
namespace AoC\Y2021;

use PHPUnit\Framework\TestCase;
use function AoC\getInputFile;

/**
 * @coversDefaultClass AoC\Dec05
 */
class Dec05Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        0,9 -> 5,9
        8,0 -> 0,8
        9,4 -> 3,4
        2,2 -> 2,1
        7,0 -> 7,4
        6,4 -> 2,0
        0,9 -> 2,9
        3,4 -> 1,4
        0,0 -> 8,8
        5,5 -> 8,2
    TESTINPUT;

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
            5,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            7473,
            $this->solver->solvePart1(getInputFile(5)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            12,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            24164,
            $this->solver->solvePart2(getInputFile(5)),
        );
    }
}
