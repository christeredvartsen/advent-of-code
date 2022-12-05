<?php declare(strict_types=1);
namespace AoC\Y2021;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile;

/**
 * @coversDefaultClass AoC\Y2021\Dec02
 */
class Dec02Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        forward 5
        down 5
        forward 8
        up 3
        down 8
        forward 2
    TESTINPUT;

    private Dec02 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec02();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            150,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            1947824,
            $this->solver->solvePart1(getInputFile(2, 2021)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            900,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            1813062561,
            $this->solver->solvePart2(getInputFile(2, 2021)),
        );
    }
}
