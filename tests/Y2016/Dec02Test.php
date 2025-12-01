<?php declare(strict_types=1);
namespace AoC\Y2016;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec02::class)]
class Dec02Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    ULL
    RRDDD
    LURDL
    UUUUD
    TESTINPUT;

    private Dec02 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec02();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            '1985',
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            '56983',
            $this->solver->solvePart1(getInputFile(2, 2016)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            '5DB3',
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            '8B8B1',
            $this->solver->solvePart2(getInputFile(2, 2016)),
        );
    }
}
