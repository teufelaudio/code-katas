<?php

declare(strict_types=1);

namespace Kata;

final class LeapYear
{
    public function isLeapYear(int $year): bool
    {
        if ($this->isDivisibleBy($year, 100) && !$this->isDivisibleBy($year, 400)) {
            return false;
        }

        return true;
    }

    private function isDivisibleBy(int $year, int $divisor): bool
    {
        return $year % $divisor === 0;
    }
}
