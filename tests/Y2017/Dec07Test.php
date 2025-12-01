<?php declare(strict_types=1);
namespace AoC\Y2017;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec07::class)]
class Dec07Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    pbga (66)
    xhth (57)
    ebii (61)
    havc (66)
    ktlj (57)
    fwft (72) -> ktlj, cntj, xhth
    qoyq (66)
    padx (45) -> pbga, havc, qoyq
    tknk (41) -> ugml, padx, fwft
    jptl (61)
    ugml (68) -> gyxo, ebii, jptl
    gyxo (61)
    cntj (57)
    TESTINPUT;

    private Dec07 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec07();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame('tknk', $this->solver->solvePart1($this->testInput));
        $this->assertSame('mwzaxaj', $this->solver->solvePart1(getInputFile(7, 2017)));
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(60, $this->solver->solvePart2($this->testInput));
        $this->assertSame(1219, $this->solver->solvePart2(getInputFile(7, 2017)));
    }
}
