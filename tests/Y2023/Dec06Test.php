<?php declare(strict_types=1);
namespace AoC\Y2023;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec06::class)]
class Dec06Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    Time:      7  15   30
    Distance:  9  40  200
    TESTINPUT;

    private Dec06 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec06();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            288,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            303600,
            $this->solver->solvePart1(getInputFile(6, 2023)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            71503,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            23654842,
            $this->solver->solvePart2(getInputFile(6, 2023)),
        );
    }
}
