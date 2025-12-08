<?php declare(strict_types=1);
namespace AoC\Y2025;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec06::class)]
class Dec06Test extends TestCase
{
    private string $testInput;
    private Dec06 $solver;

    protected function setUp(): void
    {
        $this->testInput = trim(file_get_contents(dirname(dirname(__DIR__)) . '/input/2025/06_test.txt'), PHP_EOL);
        $this->solver = new Dec06();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            4277556,
            $this->solver->solvePart1($this->testInput),
        );

        $this->assertSame(
            4583860641327,
            $this->solver->solvePart1(getInputFile(6, 2025)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            3263827,
            $this->solver->solvePart2($this->testInput),
        );

        $this->assertSame(
            11602774058280,
            $this->solver->solvePart2(getInputFile(6, 2025)),
        );
    }
}
