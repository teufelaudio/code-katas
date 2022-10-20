<?php declare(strict_types=1);

namespace Kata;

final class SlotMachine
{
    public function iGuessItIsNumber(int $number): bool
    {
        return $number === 5;
    }
}
