<?php declare(strict_types=1);
namespace AoC\Y2017;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec04::class)]
class Dec04Test extends TestCase
{
    private Dec04 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec04();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(386, $this->solver->solvePart1(getInputFile(4, 2017)));
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(208, $this->solver->solvePart2(getInputFile(4, 2017)));
    }
}
