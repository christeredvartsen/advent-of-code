<?php declare(strict_types=1);
namespace AoC\Y2016;

use PHPUnit\Framework\TestCase;
use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2016\Dec04
 */
class Dec04Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    aaaaa-bbb-z-y-x-123[abxyz]
    a-b-c-d-e-f-g-h-987[abcde]
    not-a-real-room-404[oarel]
    totally-real-room-200[decoy]
    TESTINPUT;

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
            1514,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            137896,
            $this->solver->solvePart1(getInputFile(4, 2016)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            501,
            $this->solver->solvePart2(getInputFile(4, 2016)),
        );
    }
}
