<?php

namespace Tdd;

class FizzBuzz
{
    /**
     * @param int $number
     * @return string
     */
    public function convertNumberToString(int $number): string
    {
        if ($number % 3 === 0 && $number % 5 === 0) {
            return "FizzBuzz";
        }
        if ($number % 3 === 0) {
            return "Fizz";
        }
        if ($number % 5 === 0) {
            return "Buzz";
        }
        return (string)$number;
    }
}
