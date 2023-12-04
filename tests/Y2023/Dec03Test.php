<?php declare(strict_types=1);
namespace AoC\Y2023;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2023\Dec03
 */
class Dec03Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    467..114..
    ...*......
    ..35..633.
    ......#...
    617*......
    .....+.58.
    ..592.....
    ......755.
    ...$.*....
    .664.598..
    TESTINPUT;

    private Dec03 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec03();
    }

    /**
     * @covers ::solvePart1
     * @covers ::solve
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            4361,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            521601,
            $this->solver->solvePart1(getInputFile(3, 2023)),
        );
    }

    /**
     * @covers ::solvePart2
     * @covers ::solve
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            467835,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            80694070,
            $this->solver->solvePart2(getInputFile(3, 2023)),
        );
    }
}
