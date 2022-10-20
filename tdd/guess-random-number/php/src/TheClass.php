<?php declare(strict_types=1);

namespace Kata;

final class TheClass
{
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
