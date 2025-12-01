<?php declare(strict_types=1);
namespace AoC\Y2017;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec05::class)]
class Dec05Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    0
    3
    0
    1
    -3
    TESTINPUT;

    private Dec05 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec05();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(5, $this->solver->solvePart1($this->testInput));
        $this->assertSame(356945, $this->solver->solvePart1(getInputFile(5, 2017)));
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(10, $this->solver->solvePart2($this->testInput));
        $this->assertSame(28372145, $this->solver->solvePart2(getInputFile(5, 2017)));
    }
}
