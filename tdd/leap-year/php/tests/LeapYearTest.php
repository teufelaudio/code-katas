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
}
