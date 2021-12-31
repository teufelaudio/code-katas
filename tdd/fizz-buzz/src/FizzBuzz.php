<?php declare(strict_types=1);

namespace Kata;

final class FizzBuzz
{
    public function fizzBuzz(): array
    {
        $values = [];

        foreach (range(1, 100) as $number) {
            if ($number % 3 === 0) {
                $values[] = 'fizz';

                continue;
            }

            $values[] = $number;
        }

        return $values;
    }
}
