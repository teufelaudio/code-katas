<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\TheClass;
use PHPUnit\Framework\TestCase;

final class TheTest extends TestCase
{
    public function test_guess_the_correct_number_at_first(): void
    {
        $randomNumber = 50;

        $theClass = new TheClass($randomNumber);
        $answer = $theClass->guess(50);

        self::assertEquals(0, $answer);
    }
}
