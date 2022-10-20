<?php declare(strict_types=1);

namespace Kata;

final class Game
{
    public const GUESS_IS_TOO_LOW = -1;
    public const GUESS_IS_CORRECT = 0;
    public const GUESS_IS_TOO_HIGH = 1;

    private int $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function guess(int $guessNumber): int
    {
        return ($guessNumber <=> $this->number);
    }
}
