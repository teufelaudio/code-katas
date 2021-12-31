<?php declare(strict_types=1);

namespace Kata;

final class FizzBuzz
{
    public function fizzBuzz(): array
    {
        $values = [];

        foreach (range(1, 100) as $number) {
            if ($number % 15 === 0) {
                $values[] = 'fizzbuzz';
            } elseif ($number % 5 === 0) {
                $values[] = 'buzz';
            } elseif ($number % 3 === 0) {
                $values[] = 'fizz';
            } else {
                $values[] = $number;
            }
        }

        return $values;
    }
}
