<?php declare(strict_types=1);
namespace AoC\Y2025;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec02::class)]
class Dec02Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    11-22,95-115,998-1012,1188511880-1188511890,222220-222224,1698522-1698528,446443-446449,38593856-38593862,565653-565659,824824821-824824827,2121212118-2121212124
    TESTINPUT;

    private Dec02 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec02();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            1227775554,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            40398804950,
            $this->solver->solvePart1(getInputFile(2, 2025)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            4174379265,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            65794984339,
            $this->solver->solvePart2(getInputFile(2, 2025)),
        );
    }
}
