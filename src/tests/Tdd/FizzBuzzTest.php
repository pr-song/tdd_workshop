<?php

use PHPUnit\Framework\TestCase;
use Tdd\FizzBuzz;


class FizzBuzzTest extends TestCase
{
    private FizzBuzz $fizzbuzz;

    public function setUp():void
    {
        $this->fizzbuzz = new FizzBuzz();
    }

    /**
     * @dataProvider provideDataForReturnFizzWhenPassingMultipleOf3
     * @return void
     */
    public function testReturnFizzWhenPassingMultipleOf3($number)
    {
        // 検証と実装
        $this->assertEquals("Fizz", $this->fizzbuzz->convertNumberToString($number));
    }

    /**
     * @dataProvider provideDataForReturnBuzzWhenPassingMultipleOf5
     * @return void
     */
    public function testReturnBuzzWhenPassingMultipleOf5($number)
    {
        $this->assertEquals('Buzz', $this->fizzbuzz->convertNumberToString($number));
    }

    /**
     * @dataProvider provideDataForReturnFizzBuzzWhenPassingMultipleOf3And5
     * @return void
     */
    public function testReturnFizzBuzzWhenPassingMultipleOf3And5()
    {
        $this->assertEquals("FizzBuzz", $this->fizzbuzz->convertNumberToString(30));
    }

    /**
     * @dataProvider provideDataForReturnStringOfNumberWhenPassingOtherNumber
     * @return void
     */
    public function testReturnStringOfNumberWhenPassingOtherNumber($number)
    {
        $this->assertEquals((string)$number, $this->fizzbuzz->convertNumberToString($number));
    }

    public function provideDataForReturnFizzWhenPassingMultipleOf3():array
    {
        return [
            [
                'number' => 3,
            ],
            [
                'number' => 6,
            ]
        ];
    }

    public function provideDataForReturnBuzzWhenPassingMultipleOf5(): array
    {
        return [
            [
                'number' => 5,
            ],
            [
                'number' => 10,
            ]
        ];
    }

    public function provideDataForReturnFizzBuzzWhenPassingMultipleOf3And5(): array
    {
        return [
            [
                'number' => 15,
            ],
            [
                'number' => 30,
            ]
        ];
    }

    public function provideDataForReturnStringOfNumberWhenPassingOtherNumber(): array
    {
        return [
            [
                'number' => 1
            ],
            [
                'number' => 2
            ]
        ];
    }
}
