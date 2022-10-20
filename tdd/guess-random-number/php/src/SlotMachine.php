<?php declare(strict_types=1);

namespace Kata;

final class SlotMachine
{
    public const LOWER_NUMBER = "your guess is lower then the number";
    public const HIGHER_NUMBER = "your guess is higher then the number";
    public const LOOSE_PHRASE = 'you loose';
    private int $randomNumber;
    private int $counter;

    public function __construct(NumberGeneratorInterface $numberGenerator)
    {
        $this->counter = 0;
        $this->randomNumber = $numberGenerator->generateRandomNumber();
    }

    public function iGuessItIsNumber(int $number)
    {
        $this->counter++;

        if ($this->counter > 3) {
            return self::LOOSE_PHRASE;
        }

        if($number < $this->randomNumber){
            return self::LOWER_NUMBER . (($this->counter === 3) ? ' ' . self::LOOSE_PHRASE : '');
        }

        if ($number > $this->randomNumber){
            return self::HIGHER_NUMBER . (($this->counter === 3) ? ' ' . self::LOOSE_PHRASE : '');
        }

        return $number === $this->randomNumber;
    }
}
