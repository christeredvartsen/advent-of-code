<?php declare(strict_types=1);
namespace AoC\Y2015;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

use function AoC\getInputFile as getInputFile;

#[CoversClass(Dec03::class)]
class Dec03Test extends TestCase
{
    private Dec03 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec03();
    }

    public function testSolvePart1(): void
    {
        $this->assertSame(
            2,
            $this->solver->solvePart1('>'),
        );

        $this->assertSame(
            4,
            $this->solver->solvePart1('^>v<'),
        );

        $this->assertSame(
            2,
            $this->solver->solvePart1('^v^v^v^v^v'),
        );

        $this->assertSame(
            2565,
            $this->solver->solvePart1(getInputFile(3, 2015)),
        );
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(
            3,
            $this->solver->solvePart2('^v'),
        );

        $this->assertSame(
            3,
            $this->solver->solvePart2('^>v<'),
        );

        $this->assertSame(
            11,
            $this->solver->solvePart2('^v^v^v^v^v'),
        );

        $this->assertSame(
            2639,
            $this->solver->solvePart2(getInputFile(3, 2015)),
        );
    }
}
