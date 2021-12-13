<?php declare(strict_types=1);
namespace AoC\Y2021;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile;

/**
 * @coversDefaultClass AoC\Y2021\Dec13
 */
class Dec13Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        6,10
        0,14
        9,10
        0,3
        10,4
        4,11
        6,0
        6,12
        4,1
        0,13
        10,12
        3,4
        3,0
        8,4
        1,10
        2,14
        8,10
        9,0

        fold along y=7
        fold along x=5
    TESTINPUT;

    private Dec13 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec13();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            17,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            678,
            $this->solver->solvePart1(getInputFile(13, 2021)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            <<<OUTPUT
            #####
            #...#
            #...#
            #...#
            #####
            OUTPUT,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            <<<OUTPUT
            ####..##..####.#..#.#....#..#.####.####
            #....#..#.#....#..#.#....#..#....#.#...
            ###..#....###..####.#....####...#..###.
            #....#....#....#..#.#....#..#..#...#...
            #....#..#.#....#..#.#....#..#.#....#...
            ####..##..#....#..#.####.#..#.####.#...
            OUTPUT,
            $this->solver->solvePart2(getInputFile(13, 2021)),
        );
    }
}
