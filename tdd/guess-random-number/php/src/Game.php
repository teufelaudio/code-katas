<?php declare(strict_types=1);

namespace Kata;

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
        $this->attempts++;

        if ($this->attempts > self::MAX_ATTEMPTS) {
            return self::GUESS_TOO_MANY_GUESSES;
        }
        if ($this->attempts === self::MAX_ATTEMPTS) {
            $correct = ($guessNumber <=> $this->number);
            return ($correct === self::GUESS_IS_CORRECT)
                ? self::GUESS_IS_CORRECT
                : self::GUESS_TOO_MANY_GUESSES;
        }

        return ($guessNumber <=> $this->number);
    }
}
