<?php declare(strict_types=1);
namespace AoC\Y2025;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec08::class)]
class Dec08Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    162,817,812
    57,618,57
    906,360,560
    592,479,940
    352,342,300
    466,668,158
    542,29,236
    431,825,988
    739,650,466
    52,470,668
    216,146,977
    819,987,18
    117,168,530
    805,96,715
    346,949,466
    970,615,88
    941,993,340
    862,61,35
    984,92,344
    425,690,689
    TESTINPUT;

    private Dec08 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec08();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            40,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            105952,
            $this->solver->solvePart1(getInputFile(8, 2025)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            25272,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            975931446,
            $this->solver->solvePart2(getInputFile(8, 2025)),
        );
    }
}
