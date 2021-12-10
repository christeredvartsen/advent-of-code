<?php declare(strict_types=1);
namespace AoC\Y2021;

use PHPUnit\Framework\TestCase;
use function AoC\getInputFile;

/**
 * @coversDefaultClass AoC\Y2021\Dec10
 */
class Dec10Test extends TestCase
{
    private string $testInput = <<<TESTINPUT
        [({(<(())[]>[[{[]{<()<>>
        [(()[<>])]({[<{<<[]>>(
        {([(<{}[<>[]}>{[]{[(<()>
        (((({<>}<{<{<>}{[]{[]{}
        [[<[([]))<([[{}[[()]]]
        [{[{({}]{}}([{[{{{}}([]
        {<[[]]>}<{[{[{[]{()[[[]
        [<(<(<(<{}))><([]([]()
        <{([([[(<>()){}]>(<<{{
        <{([{{}}[<[[[<>{}]]]>[]]
    TESTINPUT;

    private Dec10 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec10();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            26397,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            339411,
            $this->solver->solvePart1(getInputFile(10, 2021)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            288957,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            2289754624,
            $this->solver->solvePart2(getInputFile(10, 2021)),
        );
    }
}
