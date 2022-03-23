<?php

declare(strict_types=1);

namespace KataTests;

use Kata\LeapYear;
use PHPUnit\Framework\TestCase;

final class LeapYearTest extends TestCase
{
    public function test_divisible_by_400_is_a_leap_year(): void
    {
        $leapYear = new LeapYear();

        self::assertTrue($leapYear->isLeapYear(2000));
    }

    public function test_divisible_by_100_but_not_by_400_are_not_leap_years(): void
    {
        $leapYear = new LeapYear();

        self::assertFalse($leapYear->isLeapYear(1000));
    }
}
