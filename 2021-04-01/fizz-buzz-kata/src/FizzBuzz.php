<?php

declare(strict_types = 1);

namespace Kata;

final class FizzBuzz
{
    public function values(): array
    {
        $result = [];

        for ($i = 1; $i <= 100; $i++) {
            $result[$i] = $this->value($i);
        }

        return $result;
    }

    private function value(int $number): string
    {
        if ($this->isMultipleOf15($number)) {
            return 'FizzBuzz';
        }

        if ($this->isMultipleOf3($number)) {
            return 'Fizz';
        }

        if ($this->isMultipleOf5($number)) {
            return 'Buzz';
        }

        return (string)$number;
    }

    private function isMultipleOf3(int $number): bool
    {
        return 0 === $number % 3;
    }

    private function isMultipleOf5(int $number): bool
    {
        return 0 === $number % 5;
    }

    private function isMultipleOf15(int $number): bool
    {
        return $this->isMultipleOf3($number) && $this->isMultipleOf5($number);
    }
}
