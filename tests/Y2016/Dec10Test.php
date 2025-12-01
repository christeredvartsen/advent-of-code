<?php declare(strict_types=1);
namespace AoC\Y2016;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile;

#[CoversClass(Dec10::class)]
class Dec10Test extends TestCase
{
    private Dec10 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec10();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            27,
            $this->solver->solvePart1(getInputFile(10, 2016)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            13727,
            $this->solver->solvePart2(getInputFile(10, 2016)),
        );
    }
}
