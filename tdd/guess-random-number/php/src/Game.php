<?php declare(strict_types=1);

namespace Kata;

use function PHPUnit\Framework\returnArgument;

final class Game
{
    public const GUESS_IS_TOO_LOW = -1;
    public const GUESS_IS_CORRECT = 0;
    public const GUESS_IS_TOO_HIGH = 1;
    public const GUESS_TOO_MANY_GUESSES = 42;

    public const MAX_ATTEMPTS = 3;

    private int $number;

    private int $attempts = 0;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function guess(int $guessNumber): int
    {
        $guessResult = ($guessNumber <=> $this->number);

        if ($this->isLastAttempt() &&
            $guessResult !== self::GUESS_IS_CORRECT
        ) {
            return self::GUESS_TOO_MANY_GUESSES;
        }

        return $guessResult;
    }

    private function isLastAttempt(): bool
    {
        $this->attempts++;

        return ($this->attempts === self::MAX_ATTEMPTS);
    }
}
