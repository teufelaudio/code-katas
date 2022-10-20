<?php

declare(strict_types = 1);

namespace Kata;

final class NumberGenerator implements NumberGeneratorInterface
{
    public function generateRandomNumber(): int
    {
        return rand(0, 100);
    }
}