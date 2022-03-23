<?php

declare(strict_types=1);

namespace KataTests;

use Kata\LeapYear;
use PHPUnit\Framework\TestCase;

final class LeapYearTest extends TestCase
{
    private LeapYear $leapYear;

    public function setUp(): void
    {
        $this->leapYear = new LeapYear();
    }

    public function test_year_divisible_by_400_is_leap_year(): void
    {
        $actual = $this->leapYear->isLeapYear(2000);

        self::assertTrue($actual);
    }

    // All years divisible by 100 but not by 400 are NOT leap years
    // (so, for example, 1700, 1800, and 1900 were NOT leap years, NOR will 2100 be a leap year)
    public function test_year_divisible_by_100_but_not_400_is_not_leap_year(): void
    {
        self::assertFalse($this->leapYear->isLeapYear(1700));
        self::assertFalse($this->leapYear->isLeapYear(1800));
        self::assertFalse($this->leapYear->isLeapYear(1900));
        self::assertFalse($this->leapYear->isLeapYear(2100));
    }

    // All years divisible by 4 but not by 100 ARE leap years (e.g., 2008, 2012, 2016),
    public function test_year_divisible_by_4_but_not_100_is_leap_year(): void
    {
        self::assertTrue($this->leapYear->isLeapYear(2008));
        self::assertTrue($this->leapYear->isLeapYear(2012));
        self::assertTrue($this->leapYear->isLeapYear(2016));
    }

    // All years not divisible by 4 are NOT leap years (e.g. 2017, 2018, 2019).
    public function test_year_not_divisible_by_4_is_not_leap_year(): void
    {
        self::assertFalse($this->leapYear->isLeapYear(2017));
        self::assertFalse($this->leapYear->isLeapYear(2018));
        self::assertFalse($this->leapYear->isLeapYear(2019));
    }

    // Display the next 10 leap years from the current year.
    // Output: 2024, 2028, 2032, 2036, 2040, 2044, 2048, 2052, 2056, 2060
    public function test_get_next_10_leap_years(): void
    {
        $leapYears = $this->leapYear->getNextLeapYears(10, 2022);

        self::assertEquals([2024, 2028, 2032, 2036, 2040, 2044, 2048, 2052, 2056, 2060], $leapYears);
    }

    // Calculate which is the 10th leap year starting from the -6 year.
    // Output: 32 (Reason: 4, 0, 4, 8, 12, 16, 20, 24, 28, 32)
    public function test_get_next_10th_leap_year_of_year_minus_6(): void
    {
        $leapYears = $this->leapYear->getNextLeapYears(10, -6);

        $leapYears10th = $leapYears[9];

        self::assertEquals(32, $leapYears10th);
    }
}
