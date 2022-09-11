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

    public function testReturnStringOf1WhenPassingNumberOf1()
    {
        // 検証と実装
        $this->assertEquals("1", $this->fizzbuzz->convertNumberToString(1));
    }

    public function testReturnStringOf2WhenPassingNumberOf2()
    {
        // 検証と実装
        $this->assertEquals("2", $this->fizzbuzz->convertNumberToString(2));
    }

    public function testReturnFizzWhenPassingNumberOf3()
    {
        // 検証と実装
        $this->assertEquals("Fizz", $this->fizzbuzz->convertNumberToString(3));
    }

    public function testReturnFizzWhenPassingMultipleOf3()
    {
        $this->assertEquals("Fizz", $this->fizzbuzz->convertNumberToString(6));
    }

    public function testReturnBuzzWhenPassingNumberOf5()
    {
        // 検証と実装
        $this->assertEquals("Buzz", $this->fizzbuzz->convertNumberToString(5));
    }

    public function testReturnBuzzWhenPassingMultipleOf5()
    {
        $this->assertEquals("Buzz", $this->fizzbuzz->convertNumberToString(10));
    }

    public function testReturnFizzBuzzWhenPassingNumberOf15()
    {
        // 検証と実装
        $this->assertEquals("FizzBuzz", $this->fizzbuzz->convertNumberToString(15));
    }

    public function testReturnFizzBuzzWhenPassingMultipleOf3And5()
    {
        $this->assertEquals("FizzBuzz", $this->fizzbuzz->convertNumberToString(30));
    }

    public function testReturnStringOfNumberWhenPassingOtherNumber()
    {
        $this->assertEquals("4", $this->fizzbuzz->convertNumberToString(4));

    }
}
