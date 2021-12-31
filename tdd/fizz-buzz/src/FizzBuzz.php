<?php declare(strict_types=1);

namespace Kata;

final class FizzBuzz
{
    public function fizzBuzz(): array
    {
        $values = range(1, 100);

        foreach ($values as $key => $number) {
            if ($number % 3 === 0) {
                $values[$key] = 'fizz';
            }
        }

        return $values;
    }
}
