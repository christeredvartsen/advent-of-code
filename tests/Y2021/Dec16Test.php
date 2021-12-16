<?php declare(strict_types=1);
namespace AoC\Y2021;

use PHPUnit\Framework\TestCase;

use function AoC\getInputFile;

/**
 * @coversDefaultClass AoC\Y2021\Dec16
 */
class Dec16Test extends TestCase
{
    private Dec16 $solver;

    protected function setUp(): void
    {
        $this->solver = new Dec16();
    }

    /**
     * @covers ::solvePart1
     */
    public function testSolvePart1(): void
    {
        $this->assertSame(
            6,
            $this->solver->solvePart1('D2FE28'),
        );

        $this->assertSame(
            16,
            $this->solver->solvePart1('8A004A801A8002F478'),
        );

        $this->assertSame(
            12,
            $this->solver->solvePart1('620080001611562C8802118E34'),
        );

        $this->assertSame(
            23,
            $this->solver->solvePart1('C0015000016115A2E0802F182340'),
        );

        $this->assertSame(
            31,
            $this->solver->solvePart1('A0016C880162017C3686B18A3D4780'),
        );

        $this->assertSame(
            989,
            $this->solver->solvePart1(getInputFile(16, 2021)),
        );
    }

    /**
     * @covers ::solvePart2
     */
    public function testSolvePart2(): void
    {
        $this->assertSame(
            3,
            $this->solver->solvePart2('C200B40A82'),
        );

        $this->assertSame(
            54,
            $this->solver->solvePart2('04005AC33890'),
        );

        $this->assertSame(
            7,
            $this->solver->solvePart2('880086C3E88112'),
        );

        $this->assertSame(
            9,
            $this->solver->solvePart2('CE00C43D881120'),
        );

        $this->assertSame(
            1,
            $this->solver->solvePart2('D8005AC2A8F0'),
        );

        $this->assertSame(
            0,
            $this->solver->solvePart2('F600BC2D8F'),
        );

        $this->assertSame(
            0,
            $this->solver->solvePart2('9C005AC2F8F0'),
        );

        $this->assertSame(
            1,
            $this->solver->solvePart2('9C0141080250320F1802104A08'),
        );

        $this->assertSame(
            7936430475134,
            $this->solver->solvePart2(getInputFile(16, 2021)),
        );
    }
}
