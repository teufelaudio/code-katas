<?php

declare(strict_types=1);

namespace Kata;

final class Randomizer implements RandomizerInterface
{
    private const MIN = 0;
    private const MAX = 1000000;

    public function createRandomNumbers(int $count): array
    {
        $randomNumbers = [];
        for ($i = 0; $i < $count; $i++) {
            $randomNumbers[] = $this->createRandomNumber();
        }

        return $randomNumbers;
    }

    private function createRandomNumber(): int
    {
        return random_int(self::MIN, self::MAX);
    }
}
