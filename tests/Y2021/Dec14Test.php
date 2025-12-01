<?php declare(strict_types=1);
namespace AoC\Y2021;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile;

#[CoversClass(Dec14::class)]
class Dec14Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        NNCB

        CH -> B
        HH -> N
        CB -> H
        NH -> C
        HB -> C
        HC -> B
        HN -> C
        NN -> C
        BH -> H
        NC -> B
        NB -> B
        BN -> B
        BB -> N
        BC -> B
        CC -> N
        CN -> C
    TESTINPUT;

    private Dec14 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec14();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            1588,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            2988,
            $this->solver->solvePart1(getInputFile(14, 2021)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            2188189693529,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            3572761917024,
            $this->solver->solvePart2(getInputFile(14, 2021)),
        );
    }
}
