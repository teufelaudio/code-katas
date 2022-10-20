<?php declare(strict_types=1);

namespace Kata;

final class SlotMachine
{
    private int $randomNumber;

    public function __construct(NumberGeneratorInterface $numberGenerator)
    {
        $this->randomNumber = $numberGenerator->generateRandomNumber();
    }

    public function iGuessItIsNumber(int $number): bool
    {
        return $number === $this->randomNumber;
    }
}
