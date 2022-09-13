<?php

namespace Tdd;

use Tdd\Exception\ClosedRangeLogicException;

class ClosedRange
{
    /** @var int 下端点 */
    private int $lower;

    /** @var int 上端点 */
    private int $upper;

    /**
     * $lower > $upperの場合はClosedRangeLogicExceptionを投げる
     * @param int $lower
     * @param int $upper
     * @throws ClosedRangeLogicException
     */
    public function __construct(int $lower, int $upper)
    {
        if ($lower > $upper) {
            throw new ClosedRangeLogicException("lower must smaller than upper");
        }
        $this->lower = $lower;
        $this->upper = $upper;
    }

    /**
     * 下端点を取得する
     * @return int
     */
    public function getLowerEndPoint(): int
    {
        return $this->lower;
    }

    /**
     * 上端点を取得する
     * @return int
     */
    public function getUpperEndPoint(): int
    {
        return $this->upper;
    }

    /**
     * 閉区間の文字列表記を取得する
     * @return string
     */
    public function toString(): string
    {
        return sprintf("[%s,%s]", $this->getLowerEndPoint(), $this->getUpperEndPoint());
    }

    /**
     * 閉区間が指定した整数を含むか判定する
     * @param int $number
     * @return bool
     */
    public function isContains(int $number): bool
    {
        if ($number < $this->getLowerEndPoint() || $number > $this->getUpperEndPoint()) {
            return false;
        }
        return true;
    }

    /**
     * 閉区間が別の閉区間と等しいか判定する
     * @param ClosedRange $other_range
     * @return bool
     */
    public function isEquals(ClosedRange $other_range):bool
    {
        if ($this->getLowerEndPoint() === $other_range->getLowerEndPoint() && $this->getUpperEndPoint() === $other_range->getUpperEndPoint()) {
            return true;
        }
        return false;
    }

    public function isContainsOtherClosedRange(ClosedRange $other_range): bool
    {
        return true;
    }
}
