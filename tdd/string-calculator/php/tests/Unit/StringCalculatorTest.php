<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    public function test_change_me(): void
    {
        $calculator = new StringCalculator();

        self::assertTrue($calculator->changeMe());
    }
}
