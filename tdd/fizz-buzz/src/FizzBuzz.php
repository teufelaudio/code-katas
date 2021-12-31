<?php declare(strict_types=1);

namespace Kata;

final class FizzBuzz
{
    public function fizzBuzz(): array
    {
        $values = [];

        foreach (range(1, 100) as $number) {
            if ($this->isNumberMultipleOf($number, 15)) {
                $values[] = 'fizzbuzz';
            } elseif ($this->isNumberMultipleOf($number, 5)) {
                $values[] = 'buzz';
            } elseif ($this->isNumberMultipleOf($number, 3)) {
                $values[] = 'fizz';
            } elseif ($this->containsNumber($number, 3)) {
                $values[] = 'fizz';
            } elseif ($this->containsNumber($number, 5)) {
                $values[] = 'buzz';
            } else {
                $values[] = $number;
            }
        }

        return $values;
    }

    private function isNumberMultipleOf(int $number, int $modulo): bool
    {
        return $number % $modulo === 0;
    }

    private function containsNumber(int $number, int $needle): bool
    {
        return str_contains((string)$number, (string)$needle);
    }
}
