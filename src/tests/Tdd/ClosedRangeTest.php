<?php

use PHPUnit\Framework\TestCase;
use Tdd\ClosedRange;
use Tdd\Exception\ClosedRangeLogicException;

class ClosedRangeTest extends TestCase
{
    /**
     * 整数の閉区間を表すクラスのインスタンスの作成が成功する
     * @return void
     */
    public function testSuccessfullyCreateNewInstanceOfClosedRangeClass()
    {
        $closed_range = new ClosedRange(0, 1);
        $this->assertInstanceOf(ClosedRange::class, $closed_range);
    }

    /**
     * 閉区間 [8,3] の閉区間は存在できない
     * @return void
     */
    public function testClosedRangeLogicExceptionWhenCreateClosedRangeInstanceWithLowerGreaterThanUpper()
    {
        $this->expectException(ClosedRangeLogicException::class);
        new ClosedRange(8, 3);
    }

    /**
     * 閉区間の下端点を取得する
     * @dataProvider provideDataForGetLowerEndPointOfClosedRange
     * @return void
     */
    public function testGetLowerEndPointOfClosedRange($lower, $upper, $expected)
    {
        $closed_range = new ClosedRange($lower, $upper);
        $this->assertEquals($expected, $closed_range->getLowerEndPoint());
    }

    /**
     * dataProvider for testGetLowerEndPointOfClosedRange method
     * @return array[]
     */
    public function provideDataForGetLowerEndPointOfClosedRange(): array
    {
        return [
            // "test case" => [$lower, $upper, $expected]
            "[3,8] の下端点は 3" => [3, 8, 3]
        ];
    }

    /**
     * 閉区間の上端点を取得する
     * @dataProvider provideDataForGetUpperEndPointOfClosedRange
     * @return void
     */
    public function testGetUpperEndPointOfClosedRange($lower, $upper, $expected)
    {
        $closed_range = new ClosedRange($lower, $upper);
        $this->assertEquals($expected, $closed_range->getUpperEndPoint());
    }

    /**
     * dataProvider for testGetUpperEndPointOfClosedRange method
     * @return array[]
     */
    public function provideDataForGetUpperEndPointOfClosedRange(): array
    {
        return [
            // "test case" => [$lower, $upper, $expected]
            "[3,8] の上端点は 8" => [3, 8, 8]
        ];
    }

    /**
     * 閉区間文字列表記を表す
     * @dataProvider provideDataForTestingRepresentationForTheClosedRange
     * @return void
     */
    public function testGetStringRepresentationForClosedRange($lower, $upper, $expected) {
        $closed_range = new ClosedRange($lower, $upper);
        $this->assertEquals($expected, $closed_range->toString());
    }

    /**
     * dataProvider for testGetStringRepresentationForClosedRange method
     * @return array[]
     */
    public function provideDataForTestingRepresentationForTheClosedRange(): array
    {
        return [
            // "test case" => [$lower, $upper, $expected]
            "[3,8] の文字列表記は '[3,8]'" => [3, 8, "[3,8]"]
        ];
    }

    /**
     * 閉区間は指定した値を含むか判定する
     * @dataProvider provideDataForTestingIfClosedRangeContainSpecifiedNumber
     * @param int $lower
     * @param int $upper
     * @param int $number
     * @param bool $expected
     * @return void
     */
    public function testIfClosedRangeContainSpecifiedNumber(int $lower, int $upper, int $number, bool $expected)
    {
        $closed_range = new ClosedRange($lower, $upper);
        $this->assertEquals($expected, $closed_range->isContains($number));
    }

    /**
     * dataProvider for testIfClosedRangeContainSpecifiedNumber method
     * @return array[]
     */
    public function provideDataForTestingIfClosedRangeContainSpecifiedNumber(): array
    {
        return [
            // "test case" => [$lower, $upper, $number, expected]
            "[3,8] contains 3" => [3, 8, 3, true], // 閉区間の下限値
            "[3,8] contains 8" => [3, 8, 8, true], // 閉区間の上限値
            "[3,8] not contains 2" => [3, 8, 2, false], // 閉区間の下限外値
            "[3,8] not contains 9" => [3, 8, 9, false], // 閉区間の上限外値
        ];
    }


    /**
     * 2つ閉区間と等しいか判定する
     * @dataProvider provideDataForTestingIfTwoClosedRangeIsEquals
     * @param ClosedRange $range_1
     * @param ClosedRange $range_2
     * @param bool $expected
     * @return void
     */
    public function testIfTwoClosedRangesAreEqual(ClosedRange $range_1, ClosedRange $range_2, bool $expected)
    {
        $this->assertEquals($expected, $range_1->isEquals($range_2));
    }

    /**
     * dataProvider for testIfTwoClosedRangesAreEqual
     * @return array[]
     */
    public function provideDataForTestingIfTwoClosedRangeIsEquals(): array
    {
        return [
            // "test case" => [$closed_range_1, $closed_range_2, $expected]
            "[3,8] and [3,8] is equals" => [new ClosedRange(3,8), new ClosedRange(3,8), true],
            "[3,8] and [1,6] is not equals" => [new ClosedRange(3,8), new ClosedRange(1,6), false]
        ];
    }


    /**
     * @dataProvider provideDataForTestIfClosedRangeContainsOtherClosedRange
     * @param ClosedRange $range_1
     * @param ClosedRange $range_2
     * @param $expected
     * @return void
     */
    public function testIfClosedRangeContainsOtherClosedRange(ClosedRange $range_1, ClosedRange $range_2, $expected)
    {
        $this->assertEquals($expected, $range_1->isContainsOtherClosedRange($range_2));
    }

    public function provideDataForTestIfClosedRangeContainsOtherClosedRange(): array
    {
        return [
            // "test case" => [$closed_range_1, $closed_range_2, $expected]
            "[4,6] contains [3,8]" => [new ClosedRange(3,8), new ClosedRange(3,8), true],
            "[1,10] not and [3,8] is not equals" => [new ClosedRange(3,8), new ClosedRange(1,6), false]
        ];
    }
}
