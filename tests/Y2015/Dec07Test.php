<?php declare(strict_types=1);
namespace AoC\Y2015;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec07::class)]
class Dec07Test extends TestCase
{
    private Dec07 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec07();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            3176,
            $this->solver->solvePart1(getInputFile(7, 2015)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            14710,
            $this->solver->solvePart2(getInputFile(7, 2015)),
        );
    }
}
