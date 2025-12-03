<?php declare(strict_types=1);
namespace AoC\Y2025;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec03::class)]
class Dec03Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    987654321111111
    811111111111119
    234234234234278
    818181911112111
    TESTINPUT;

    private Dec03 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec03();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            357,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            17766,
            $this->solver->solvePart1(getInputFile(3, 2025)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            3121910778619,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            176582889354075,
            $this->solver->solvePart2(getInputFile(3, 2025)),
        );
    }
}
