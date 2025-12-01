<?php declare(strict_types=1);
namespace AoC\Y2023;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec01::class)]
class Dec01Test extends TestCase
{
    private string $testInput1 = <<<TESTINPUT1
        1abc2
        pqr3stu8vwx
        a1b2c3d4e5f
        treb7uchet
    TESTINPUT1;

    private string $testInput2 = <<<TESTINPUT2
        two1nine
        eightwothree
        abcone2threexyz
        xtwone3four
        4nineeightseven2
        zoneight234
        7pqrstsixteen
    TESTINPUT2;

    private Dec01 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec01();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            142,
            $this->solver->solvePart1($this->testInput1),
        );

        $this->assertSame(
            54338,
            $this->solver->solvePart1(getInputFile(1, 2023)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            281,
            $this->solver->solvePart2($this->testInput2),
        );

        $this->assertSame(
            53389,
            $this->solver->solvePart2(getInputFile(1, 2023)),
        );
    }
}
