<?php declare(strict_types=1);
namespace AoC\Y2017;

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
        $this->assertSame(0, $this->solver->solvePart1('1'));
        $this->assertSame(3, $this->solver->solvePart1('12'));
        $this->assertSame(2, $this->solver->solvePart1('23'));
        $this->assertSame(31, $this->solver->solvePart1('1024'));

        $this->assertSame(326, $this->solver->solvePart1(getInputFile(3, 2017)));
    }

    public function testSolvePart2(): void
    {
        $this->assertSame(363010, $this->solver->solvePart2(getInputFile(3, 2017)));
    }
}
