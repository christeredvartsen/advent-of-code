<?php declare(strict_types=1);
namespace AoC\Y2024;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec01::class)]
class Dec01Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        3   4
        4   3
        2   5
        1   3
        3   9
        3   3
    TESTINPUT;

    private Dec01 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec01();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            11,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            1151792,
            $this->solver->solvePart1(getInputFile(1, 2024)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            31,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            21790168,
            $this->solver->solvePart2(getInputFile(1, 2024)),
        );
    }
}
