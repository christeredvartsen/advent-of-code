<?php declare(strict_types=1);
namespace AoC\Y2023;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec02::class)]
class Dec02Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
    Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue
    Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red
    Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red
    Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green
    TESTINPUT;

    private Dec02 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec02();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            8,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            1931,
            $this->solver->solvePart1(getInputFile(2, 2023)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            2286,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            83105,
            $this->solver->solvePart2(getInputFile(2, 2023)),
        );
    }
}
