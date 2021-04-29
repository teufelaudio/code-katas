<?php

declare(strict_types = 1);

namespace Kata;

use RuntimeException;

final class Adder
{
    private const MAX_NUMBER_ALLOWED = 1000;

    public static function add(string $input): int
    {
        $numbers = self::getNumbersFromInput($input);

        return self::addNumbers($numbers);
    }

    /**
     * @return string[]
     */
    private static function getNumbersFromInput(string $input): array
    {
        $delimiter = self::getDelimiterFromInput($input);
        $newInput = str_replace('\n', $delimiter, $input);

        return explode($delimiter, $newInput);
    }

    private static function getDelimiterFromInput(string $input): string
    {
        if (strpos($input, '//') === 0) {
            $openPos = strpos($input, '[');
            $closePos = strpos($input, ']');
            if ($openPos !== false && $closePos !== false) {
                if ($openPos + 1 >= $closePos) {
                    throw new RuntimeException('invalid delimiter');
                }
                return substr($input, $openPos + 1, $closePos - $openPos - 1);
            }
            return $input[2];
        }

        return ',';
    }

    private static function addNumbers(array $numbers): int
    {
        $result = 0;
        $negativeNumbers = [];
        foreach ($numbers as $rawNumber) {
            $number = (int)$rawNumber;
            if ($number < 0) {
                $negativeNumbers[] = $number;
            }
            if ($number <= self::MAX_NUMBER_ALLOWED) {
                $result += $number;
            }
        }

        if (!empty($negativeNumbers)) {
            throw new RuntimeException('negatives not allowed: ' . implode(',', $negativeNumbers));
        }

        return $result;
    }
}
