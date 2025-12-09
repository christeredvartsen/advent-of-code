<?php declare(strict_types=1);
namespace AoC;

use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

#[CoversFunction('AoC\triangular')]
#[CoversFunction('AoC\median')]
#[CoversFunction('AoC\diff')]
#[CoversFunction('AoC\isEven')]
#[CoversFunction('AoC\avg')]
#[CoversFunction('AoC\reverseTriangular')]
#[CoversFunction('AoC\sortString')]
#[CoversFunction('AoC\isBetween')]
class FunctionsTest extends TestCase
{
    #[TestWith([1, 1])]
    #[TestWith([2, 3])]
    #[TestWith([3, 6])]
    #[TestWith([0, 0])]
    public function testTriangular(int $input, int $output): void
    {
        $this->assertSame($output, triangular($input));
    }

    #[TestWith([1, [1]])]
    #[TestWith([5, [1, 2, 4, 5, 6, 60, 100]])]
    #[TestWith([5, [6, 5, 4, 100, 1, 2, 60], false])]
    public function testMedian(float $median, array $values, bool $sorted = true): void
    {
        $this->assertSame($median, median($values, $sorted));
    }

    #[TestWith([3, 1, 4])]
    #[TestWith([3, 2, -1])]
    #[TestWith([0, 0, 0])]
    public function testDiff(int $diff, int $a, int $b): void
    {
        $this->assertSame($diff, diff($a, $b));
    }

    #[TestWith([0, true])]
    #[TestWith([1, false])]
    #[TestWith([2, true])]
    public function testIsEven(int $value, bool $isEven): void
    {
        $this->assertSame($isEven, isEven($value));
    }

    #[TestWith([[1, 2, 3], 2])]
    #[TestWith([[1, 2, 3, 3], 2.25])]
    #[TestWith([[1], 1])]
    public function testAvg(array $input, float $avg): void
    {
        $this->assertSame($avg, avg($input));
    }

    #[TestWith([21, 6])]
    #[TestWith([15, 5])]
    #[TestWith([10, 4])]
    #[TestWith([6, 3])]
    #[TestWith([3, 2])]
    #[TestWith([1, 1])]
    public function testReverseTriangular(int $triangular, int $result): void
    {
        $this->assertSame($result, reverseTriangular($triangular));
    }

    #[TestWith(['abc', false, 'abc'])]
    #[TestWith(['bca', false, 'abc'])]
    #[TestWith(['cba', true,  'cba'])]
    #[TestWith(['abc', true,  'cba'])]
    public function testSortString(string $string, bool $reverse, string $result): void
    {
        $this->assertSame($result, sortString($string, $reverse));
    }

    #[TestWith([false, 0, 1, 3, true])]
    #[TestWith([true,  1, 1, 3, true])]
    #[TestWith([true,  2, 1, 3, true])]
    #[TestWith([true,  3, 1, 3, true])]
    #[TestWith([false, 4, 1, 3, true])]
    #[TestWith([false, 0, 1, 3, false])]
    #[TestWith([false, 1, 1, 3, false])]
    #[TestWith([true,  2, 1, 3, false])]
    #[TestWith([false, 3, 1, 3, false])]
    #[TestWith([false, 4, 1, 3, false])]
    public function testInBetween(bool $result, int $x, int $min, int $max, bool $inclusive): void
    {
        $this->assertSame($result, isBetween($x, $min, $max, $inclusive));
    }

    #[TestWith([134, 100, 34])]
    #[TestWith([34, 100, 34])]
    #[TestWith([123132134, 100, 34])]
    #[TestWith([-34, 100, 66])]
    public function testMod(int $a, int $b, int $result): void
    {
        $this->assertSame($result, mod($a, $b));
    }

    #[TestWith([13, 5, [2, 3]])]
    #[TestWith([-63, 100, [-1, 37]])]
    public function testDivmod(int $a, int $b, array $result): void
    {
        $this->assertSame($result, divmod($a, $b));
    }

    #[TestWith([[0, 0, 0], [0, 0, 0], 0])]
    #[TestWith([[1,2,3], [4,2,3], 3])]
    #[TestWith([[1,2,3], [1,7,3], 5])]
    #[TestWith([[1,2,3], [1,2,9], 6])]
    public function testDistance(array $a, array $b, float $distance): void
    {
        $this->assertEquals($distance, distance($a, $b));
    }
}
