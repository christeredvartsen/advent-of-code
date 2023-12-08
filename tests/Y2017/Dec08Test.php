<?php declare(strict_types=1);
namespace AoC\Y2017;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2017\Dec08
 */
class Dec08Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    b inc 5 if a > 1
    a inc 1 if b < 5
    c dec -10 if a >= 1
    c inc -20 if c == 10
    TESTINPUT;

    private Dec08 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec08();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(1, $this->solver->solvePart1($this->testInput));
        $this->assertSame(5966, $this->solver->solvePart1(getInputFile(8, 2017)));
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(10, $this->solver->solvePart2($this->testInput));
        $this->assertSame(6347, $this->solver->solvePart2(getInputFile(8, 2017)));
    }
}
