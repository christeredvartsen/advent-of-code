<?php declare(strict_types=1);
namespace AoC\Y2021;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile;

#[CoversClass(Dec07::class)]
class Dec07Test extends TestCase
{
    private string $testInput = '16,1,2,0,4,2,7,1,2,14';

    private Dec07 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec07();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            37,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            336131,
            $this->solver->solvePart1(getInputFile(7, 2021)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            168,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            92676646,
            $this->solver->solvePart2(getInputFile(7, 2021)),
        );
    }
}
