<?php declare(strict_types=1);
namespace AoC\Y2015;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec05::class)]
class Dec05Test extends TestCase
{
    private Dec05 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec05();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            236,
            $this->solver->solvePart1(getInputFile(5, 2015)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            51,
            $this->solver->solvePart2(getInputFile(5, 2015)),
        );
    }
}
