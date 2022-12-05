<?php declare(strict_types=1);
namespace AoC\Y2015;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2015\Dec01
 */
class Dec01Test extends TestCase
{
    private Dec01 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec01();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            3,
            $this->solver->solvePart1('(()(()('),
        );

        $this->assertSame(
            232,
            $this->solver->solvePart1(getInputFile(1, 2015)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            1,
            $this->solver->solvePart2(')'),
        );

        $this->assertSame(
            5,
            $this->solver->solvePart2('()())'),
        );

        $this->assertSame(
            1783,
            $this->solver->solvePart2(getInputFile(1, 2015)),
        );
    }
}
