<?php declare(strict_types=1);

namespace Kata;

final class Randomizer
{
    private const MIN = 0;
    private const MAX = 1000000;

    public function createRandomNumber(): int
    {
        return random_int(self::MIN, self::MAX);
    }
}
