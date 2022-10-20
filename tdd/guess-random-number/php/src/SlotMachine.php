<?php declare(strict_types=1);

namespace Kata;

final class SlotMachine
{
    public const LOWER_NUMBER = "your guess is lower then the number";
    public const HIGHER_NUMBER = "your guess is higher then the number";
    private int $randomNumber;

    public function __construct(NumberGeneratorInterface $numberGenerator)
    {
        $this->randomNumber = $numberGenerator->generateRandomNumber();
    }

    public function iGuessItIsNumber(int $number)
    {
        if($number < $this->randomNumber){
            return self::LOWER_NUMBER;
        }

        if ($number > $this->randomNumber){
            return self::HIGHER_NUMBER;
        }

        return $number === $this->randomNumber;
    }
}
