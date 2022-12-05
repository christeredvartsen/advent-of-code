<?php declare(strict_types=1);
namespace AoC\Y2017;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2017\Dec01
 */
class Dec01Test extends TestCase
{
    private Dec01 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec01();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(3, $this->solver->solvePart1('1122'));
        $this->assertSame(4, $this->solver->solvePart1('1111'));
        $this->assertSame(0, $this->solver->solvePart1('1234'));
        $this->assertSame(9, $this->solver->solvePart1('91212129'));

        $this->assertSame(1034, $this->solver->solvePart1(getInputFile(1, 2017)));
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(6, $this->solver->solvePart2('1212'));
        $this->assertSame(0, $this->solver->solvePart2('1221'));
        $this->assertSame(4, $this->solver->solvePart2('123425'));
        $this->assertSame(12, $this->solver->solvePart2('123123'));
        $this->assertSame(4, $this->solver->solvePart2('12131415'));

        $this->assertSame(1356, $this->solver->solvePart2(getInputFile(1, 2017)));
    }
}
