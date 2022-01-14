<?php declare(strict_types=1);
namespace AoC;

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    /**
     * @covers AoC\triangular
     * @testWith [1, 1]
     *           [2, 3]
     *           [3, 6]
     *           [0, 0]
     */
    public function testTriangular(int $input, int $output): void
    {
        $this->assertSame($output, triangular($input));
    }

    /**
     * @covers AoC\median
     * @testWith [1, [1]]
     *           [5, [1, 2, 4, 5, 6, 60, 100]]
     *           [5, [6, 5, 4, 100, 1, 2, 60], false]
     */
    public function testMedian(float $median, array $values, bool $sorted = true): void
    {
        $this->assertSame($median, median($values, $sorted));
    }

    /**
     * @covers AoC\diff
     * @testWith [3, 1, 4]
     *           [3, 2, -1]
     *           [0, 0, 0]
     */
    public function testDiff(int $diff, int $a, int $b): void
    {
        $this->assertSame($diff, diff($a, $b));
    }

    /**
     * @covers AoC\isEven
     * @testWith [0, true]
     *           [1, false]
     *           [2, true]
     */
    public function testIsEven(int $value, bool $isEven): void
    {
        $this->assertSame($isEven, isEven($value));
    }

    /**
     * @covers AoC\avg
     * @testWith [[1, 2, 3], 2]
     *           [[1, 2, 3, 3], 2.25]
     *           [[1], 1]
     */
    public function testAvg(array $input, float $avg): void
    {
        $this->assertSame($avg, avg($input));
    }

    /**
     * @covers AoC\reverseTriangular
     * @testWith [21, 6]
     *           [15, 5]
     *           [10, 4]
     *           [6, 3]
     *           [3, 2]
     *           [1, 1]
     */
    public function testReverseTriangular(int $triangular, int $result): void
    {
        $this->assertSame($result, reverseTriangular($triangular));
    }

    /**
     * @covers AoC\sortString
     * @testWith ["abc", false, "abc"]
     *           ["bca", false, "abc"]
     *           ["cba", true,  "cba"]
     *           ["abc", true,  "cba"]
     */
    public function testSortString(string $string, bool $reverse, string $result): void
    {
        $this->assertSame($result, sortString($string, $reverse));
    }
}
