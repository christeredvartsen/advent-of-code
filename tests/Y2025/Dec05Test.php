<?php declare(strict_types=1);
namespace AoC\Y2025;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec05::class)]
class Dec05Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    3-5
    10-14
    16-20
    12-18

    1
    5
    8
    11
    17
    32
    TESTINPUT;

    private Dec05 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec05();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            3,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            661,
            $this->solver->solvePart1(getInputFile(5, 2025)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            14,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            359526404143208,
            $this->solver->solvePart2(getInputFile(5, 2025)),
        );
    }
}
