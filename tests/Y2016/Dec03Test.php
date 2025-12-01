<?php declare(strict_types=1);
namespace AoC\Y2016;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec03::class)]
class Dec03Test extends TestCase
{
    private Dec03 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec03();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            869,
            $this->solver->solvePart1(getInputFile(3, 2016)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            1544,
            $this->solver->solvePart2(getInputFile(3, 2016)),
        );
    }
}
