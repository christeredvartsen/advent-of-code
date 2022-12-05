<?php declare(strict_types=1);
namespace AoC\Y2022;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2022\Dec01
 */
class Dec01Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        1000
        2000
        3000

        4000

        5000
        6000

        7000
        8000
        9000

        10000
    TESTINPUT;

    private Dec01 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec01();
    }

    /**
     * @covers ::solvePart1
     * @covers ::solve
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            24000,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            70369,
            $this->solver->solvePart1(getInputFile(1, 2022)),
        );
    }

    /**
     * @covers ::solvePart2
     * @covers ::solve
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            45000,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            203002,
            $this->solver->solvePart2(getInputFile(1, 2022)),
        );
    }
}
