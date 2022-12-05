<?php declare(strict_types=1);
namespace AoC\Y2015;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2015\Dec09
 */
class Dec09Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    London to Dublin = 464
    London to Belfast = 518
    Dublin to Belfast = 141
    TESTINPUT;

    private Dec09 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec09();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            605,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            251,
            $this->solver->solvePart1(getInputFile(9, 2015)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            982,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            898,
            $this->solver->solvePart2(getInputFile(9, 2015)),
        );
    }
}
