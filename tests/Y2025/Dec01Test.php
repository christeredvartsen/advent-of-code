<?php declare(strict_types=1);
namespace AoC\Y2025;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec01::class)]
class Dec01Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        L68
        L30
        R48
        L5
        R60
        L55
        L1
        L99
        R14
        L82
    TESTINPUT;

    private Dec01 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec01();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            3,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            1177,
            $this->solver->solvePart1(getInputFile(1, 2025)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            6,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            6768,
            $this->solver->solvePart2(getInputFile(1, 2025)),
        );
    }
}
