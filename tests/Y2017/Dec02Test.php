<?php declare(strict_types=1);
namespace AoC\Y2017;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec02::class)]
class Dec02Test extends TestCase
{
    private Dec02 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec02();
    }

    public function testSolvePart1(): void
    {
        $testInput = <<<TESTINPUT
        5 1 9 5
        7 5 3
        2 4 6 8
        TESTINPUT;

        $this->assertSame(18, $this->solver->solvePart1($testInput));
        $this->assertSame(48357, $this->solver->solvePart1(getInputFile(2, 2017)));
    }

    public function testSolvePart2(): void
    {
        $testInput = <<<TESTINPUT
        5 9 2 8
        9 4 7 3
        3 8 6 5
        TESTINPUT;

        $this->assertSame(9, $this->solver->solvePart2($testInput));
        $this->assertSame(351, $this->solver->solvePart2(getInputFile(2, 2017)));
    }
}
