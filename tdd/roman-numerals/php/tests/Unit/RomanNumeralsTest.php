<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\RomanNumerals;
use PHPUnit\Framework\TestCase;

final class RomanNumeralsTest extends TestCase
{
    public function test_change_me(): void
    {
        $validator = new RomanNumerals();

        self::assertTrue($validator->changeMe());
    }
}
