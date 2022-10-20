<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\Game;
use PHPUnit\Framework\TestCase;

final class TheTest extends TestCase
{
    public function test_guess_the_correct_number_at_first(): void
    {
        $randomNumber = 50;

        $theClass = new Game($randomNumber);
        $answer = $theClass->guess(50);

        self::assertEquals(Game::GUESS_IS_CORRECT, $answer);
    }

    public function test_guess_a_number_too_low_at_first(): void
    {
        $randomNumber = 50;

        $theClass = new Game($randomNumber);
        $answer = $theClass->guess(10);

        self::assertEquals(Game::GUESS_IS_TOO_LOW, $answer);
    }

    public function test_guess_a_number_too_high_at_first(): void
    {
        $randomNumber = 50;

        $theClass = new Game($randomNumber);
        $answer = $theClass->guess(90);

        self::assertEquals(Game::GUESS_IS_TOO_HIGH, $answer);
    }

    public function test_guess_the_correct_number_at_third_attempt(): void
    {
        $randomNumber = 50;

        $theClass = new Game($randomNumber);
        $answer = $theClass->guess(90);
        $answer = $theClass->guess(40);
        $answer = $theClass->guess(50);

        self::assertEquals(Game::GUESS_IS_CORRECT, $answer);
    }
}
