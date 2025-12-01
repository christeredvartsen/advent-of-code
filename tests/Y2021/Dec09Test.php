<?php declare(strict_types=1);
namespace AoC\Y2021;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile;

#[CoversClass(Dec09::class)]
class Dec09Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        2199943210
        3987894921
        9856789892
        8767896789
        9899965678
    TESTINPUT;

    private Dec09 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec09();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            15,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            489,
            $this->solver->solvePart1(getInputFile(9, 2021)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            1134,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            1056330,
            $this->solver->solvePart2(getInputFile(9, 2021)),
        );
    }
}
