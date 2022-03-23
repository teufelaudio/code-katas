<?php

declare(strict_types=1);

namespace KataTests;

use Kata\LeapYear;
use PHPUnit\Framework\TestCase;

final class LeapYearTest extends TestCase
{
    private LeapYear $leapYear;

    protected function setUp(): void
    {
        $this->leapYear = new LeapYear();
    }

    public function test_divisible_by_400_is_a_leap_year(): void
    {
        self::assertTrue($this->leapYear->isLeapYear(2000));
    }

    public function test_divisible_by_100_but_not_by_400_are_not_leap_years(): void
    {
        self::assertFalse($this->leapYear->isLeapYear(1700));
        self::assertFalse($this->leapYear->isLeapYear(1800));
    }

    public function test_divisible_by_4_but_not_by_100_are_leap_years(): void
    {
        self::assertTrue($this->leapYear->isLeapYear(2008));
        self::assertTrue($this->leapYear->isLeapYear(2012));
        self::assertTrue($this->leapYear->isLeapYear(2016));
    }

    public function test_not_divisible_by_4_are_not_leap_years(): void
    {
        self::assertFalse($this->leapYear->isLeapYear(2017));
        self::assertFalse($this->leapYear->isLeapYear(2018));
        self::assertFalse($this->leapYear->isLeapYear(2019));
    }

    public function test_next_10_leap_years_starting_from_leap_year_2022(): void
    {
        self::assertSame(
            [2024, 2028, 2032, 2036, 2040, 2044, 2048, 2052, 2056, 2060],
            $this->leapYear->getNextLeapYears(2020, 10)
        );
        self::assertSame(
            [2024, 2028, 2032, 2036, 2040, 2044, 2048, 2052, 2056, 2060],
            $this->leapYear->getNextLeapYears(2021, 10)
        );
        self::assertSame(
            [2024, 2028, 2032, 2036, 2040, 2044, 2048, 2052, 2056, 2060],
            $this->leapYear->getNextLeapYears(2022, 10)
        );
    }
}
