<?php declare(strict_types=1);
namespace AoC\Y2021;

use PHPUnit\Framework\TestCase;
use function AoC\getInputFile;

/**
 * @coversDefaultClass AoC\Dec03
 */
class Dec03Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        00100
        11110
        10110
        10111
        10101
        01111
        00111
        11100
        10000
        11001
        00010
        01010
    TESTINPUT;

    private Dec03 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec03();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            198,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            4147524,
            $this->solver->solvePart1(getInputFile(3)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            230,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            3570354,
            $this->solver->solvePart2(getInputFile(3)),
        );
    }
}
