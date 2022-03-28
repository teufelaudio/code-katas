<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\FizzBuzz;
use PHPUnit\Framework\TestCase;

final class FizzBuzzTest extends TestCase
{
    public function test_ensure_the_list_has_100_values(): void
    {
        $fizzBuzz = new FizzBuzz();

        $currentValue = $fizzBuzz->changeMe();

        self::assertTrue($currentValue);
    }
}
