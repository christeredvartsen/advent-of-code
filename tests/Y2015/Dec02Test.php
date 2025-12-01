<?php declare(strict_types=1);
namespace AoC\Y2015;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec02::class)]
class Dec02Test extends TestCase
{
    private Dec02 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec02();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            58,
            $this->solver->solvePart1('2x3x4'),
        );

        $this->assertSame(
            43,
            $this->solver->solvePart1('1x1x10'),
        );

        $this->assertSame(
            1588178,
            $this->solver->solvePart1(getInputFile(2, 2015)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            34,
            $this->solver->solvePart2('2x3x4'),
        );

        $this->assertSame(
            14,
            $this->solver->solvePart2('1x1x10'),
        );

        $this->assertSame(
            3783758,
            $this->solver->solvePart2(getInputFile(2, 2015)),
        );
    }
}
