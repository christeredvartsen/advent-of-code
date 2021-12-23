<?php declare(strict_types=1);
namespace AoC\Y2016;

use PHPUnit\Framework\TestCase;
use function AoC\getInputFile as getInputFile;

/**
 * @coversDefaultClass AoC\Y2016\Dec07
 */
class Dec07Test extends TestCase
{
    private string $testInputForPart1 = <<<TESTINPUT
    abba[mnop]qrst
    abcd[bddb]xyyx
    aaaa[qwer]tyui
    ioxxoj[asdfgh]zxcvbn
    TESTINPUT;

    private string $testInputForPart2 = <<<TESTINPUT
    aba[bab]xyz
    xyx[xyx]xyx
    aaa[kek]eke
    zazbz[bzb]cdb
    TESTINPUT;

    private Dec07 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec07();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            2,
            $this->solver->solvePart1($this->testInputForPart1),
        );

        $this->assertSame(
            115,
            $this->solver->solvePart1(getInputFile(7, 2016)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            3,
            $this->solver->solvePart2($this->testInputForPart2),
        );

        $this->assertSame(
            231,
            $this->solver->solvePart2(getInputFile(7, 2016)),
        );
    }
}
