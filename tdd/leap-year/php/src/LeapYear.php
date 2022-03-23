<?php

declare(strict_types=1);

namespace Kata;

final class LeapYear
{
    public function isLeapYear(int $year): bool
    {
        if ($year % 400 === 0) {
            return true;
        }

        if ($year % 4 === 0 && $year % 100 !== 0) {
            return true;
        }

        return false;
    }

    public function getNextLeapYears(int $count, int $currentYear): array
    {
        $leapYears = [];

        while (count($leapYears) < $count) {
            if ($this->isLeapYear($currentYear)) {
                $leapYears[] = $currentYear;
            }

            $currentYear++;
        }

        return $leapYears;
    }
}
