<?php declare(strict_types=1);
namespace AoC\Y2021;

use PHPUnit\Framework\TestCase;
use function AoC\getInputFile;

/**
 * @coversDefaultClass AoC\Dec04
 */
class Dec04Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        7,4,9,5,11,17,23,2,0,14,21,24,10,16,13,6,15,25,12,22,18,20,8,19,3,26,1

        22 13 17 11  0
         8  2 23  4 24
        21  9 14 16  7
         6 10  3 18  5
         1 12 20 15 19

         3 15  0  2 22
         9 18 13 17  5
        19  8  7 25 23
        20 11 10 24  4
        14 21 16 12  6

        14 21 17 24  4
        10 16 15  9 19
        18  8 23 26 20
        22 11 13  6  5
         2  0 12  3  7
    TESTINPUT;

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
        $this->assertSame(
            4512,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            58838,
            $this->solver->solvePart1(getInputFile(4, 2021)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            1924,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            6256,
            $this->solver->solvePart2(getInputFile(4, 2021)),
        );
    }
}
