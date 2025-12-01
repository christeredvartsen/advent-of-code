<?php declare(strict_types=1);
namespace AoC\Y2017;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec06::class)]
class Dec06Test extends TestCase
{
    private string $testInput = '0 2 7 0';

    private Dec06 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec06();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(5, $this->solver->solvePart1($this->testInput));
        $this->assertSame(7864, $this->solver->solvePart1(getInputFile(6, 2017)));
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(4, $this->solver->solvePart2($this->testInput));
        $this->assertSame(1695, $this->solver->solvePart2(getInputFile(6, 2017)));
    }
}
