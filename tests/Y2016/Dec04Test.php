<?php declare(strict_types=1);
namespace AoC\Y2016;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec04::class)]
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

    public function testSolvePart2(): void
    {
        $this->assertSame(
            501,
            $this->solver->solvePart2(getInputFile(4, 2016)),
        );
    }
}
