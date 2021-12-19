<?php declare(strict_types=1);
namespace AoC\Y2015;

use PHPUnit\Framework\TestCase;
use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2015\Dec04
 */
class Dec04Test extends TestCase
{
    private Dec04 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec04();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            282749,
            $this->solver->solvePart1(getInputFile(4, 2015)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            9962624,
            $this->solver->solvePart2(getInputFile(4, 2015)),
        );
    }
}
