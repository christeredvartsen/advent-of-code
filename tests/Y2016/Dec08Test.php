<?php declare(strict_types=1);
namespace AoC\Y2016;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile;

/**
 * @coversDefaultClass AoC\Y2016\Dec08
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
            121,
            $this->solver->solvePart1(getInputFile(8, 2016)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            <<<SCREEN
            ###..#..#.###..#..#..##..####..##..####..###.#....
            #..#.#..#.#..#.#..#.#..#.#....#..#.#......#..#....
            #..#.#..#.#..#.#..#.#....###..#..#.###....#..#....
            ###..#..#.###..#..#.#....#....#..#.#......#..#....
            #.#..#..#.#.#..#..#.#..#.#....#..#.#......#..#....
            #..#..##..#..#..##...##..####..##..####..###.####.
            SCREEN,
            $this->solver->solvePart2(getInputFile(8, 2016)),
        );
    }
}
