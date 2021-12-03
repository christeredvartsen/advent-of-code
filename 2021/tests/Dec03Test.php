<?php declare(strict_types=1);
namespace AoC;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass AoC\Dec03
 */
class Dec03Test extends TestCase
{
    private Dec03 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec03(
            <<<INPUT
                00100
                11110
                10110
                10111
                10101
                01111
                00111
                11100
                10000
                11001
                00010
                01010
            INPUT
        );
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            198,
            $this->solver->solvePart1(),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            230,
            $this->solver->solvePart2(),
        );
    }
}
