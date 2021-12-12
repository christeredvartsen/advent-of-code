<?php declare(strict_types=1);
namespace AoC\Y2021;

use PHPUnit\Framework\TestCase;
use function AoC\getInputFile;

/**
 * @coversDefaultClass AoC\Y2021\Dec12
 */
class Dec12Test extends TestCase
{
    private string $testInput1 = <<<TESTINPUT
        start-A
        start-b
        A-c
        A-b
        b-d
        A-end
        b-end
    TESTINPUT;

    private string $testInput2 = <<<TESTINPUT
        dc-end
        HN-start
        start-kj
        dc-start
        dc-HN
        LN-dc
        HN-end
        kj-sa
        kj-HN
        kj-dc
    TESTINPUT;

    private string $testInput3 = <<<TESTINPUT
        fs-end
        he-DX
        fs-he
        start-DX
        pj-DX
        end-zg
        zg-sl
        zg-pj
        pj-he
        RW-he
        fs-DX
        pj-RW
        zg-RW
        start-pj
        he-WI
        zg-he
        pj-fs
        start-RW
    TESTINPUT;

    private Dec12 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec12();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            10,
            $this->solver->solvePart1($this->testInput1),
        );

        $this->assertSame(
            19,
            $this->solver->solvePart1($this->testInput2),
        );

        $this->assertSame(
            226,
            $this->solver->solvePart1($this->testInput3),
        );

        $this->assertSame(
            4411,
            $this->solver->solvePart1(getInputFile(12, 2021)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            36,
            $this->solver->solvePart2($this->testInput1),
        );

        $this->assertSame(
            103,
            $this->solver->solvePart2($this->testInput2),
        );

        $this->assertSame(
            3509,
            $this->solver->solvePart2($this->testInput3),
        );

        $this->assertSame(
            136767,
            $this->solver->solvePart2(getInputFile(12, 2021)),
        );
    }
}
