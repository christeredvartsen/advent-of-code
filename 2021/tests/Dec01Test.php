<?php declare(strict_types=1);
namespace AoC;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass AoC\Dec01
 */
class Dec01Test extends TestCase
{
    private Dec01 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec01(
            <<<INPUT
                199
                200
                208
                210
                200
                207
                240
                269
                260
                263
            INPUT
        );
    }

    /**
     * @covers ::solvePart1
     * @covers ::solve
     */
    public function testSolveWithoutSlicing(): void
    {
        $this->assertSame(
            7,
            $this->solver->solvePart1(),
        );
    }

    /**
     * @covers ::solvePart2
     * @covers ::solve
     */
    public function testSolveWithSlicing(): void
    {
        $this->assertSame(
            5,
            $this->solver->solvePart2(),
        );
    }
}
