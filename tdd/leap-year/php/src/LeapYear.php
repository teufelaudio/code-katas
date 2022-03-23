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

        return $this->isDivisibleBy($year, 4);
    }

    private function isDivisibleBy(int $year, int $divisor): bool
    {
        return $year % $divisor === 0;
    }

    public function getNextLeapYears(int $leapYear, int $count): array
    {
        $leapYears = [];

        while (count($leapYears) < $count) {
            $leapYear++;
            if ($this->isLeapYear($leapYear)) {
                $leapYears[] = $leapYear;
            }
        }

        return $leapYears;
    }
}
