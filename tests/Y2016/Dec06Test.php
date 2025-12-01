<?php declare(strict_types=1);
namespace AoC\Y2016;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec06::class)]
class Dec06Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
    eedadn
    drvtee
    eandsr
    raavrd
    atevrs
    tsrnev
    sdttsa
    rasrtv
    nssdts
    ntnada
    svetve
    tesnvt
    vntsnd
    vrdear
    dvrsen
    enarar
    TESTINPUT;

    private Dec06 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec06();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            'easter',
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            'agmwzecr',
            $this->solver->solvePart1(getInputFile(6, 2016)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            'advent',
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            'owlaxqvq',
            $this->solver->solvePart2(getInputFile(6, 2016)),
        );
    }
}
