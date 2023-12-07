<?php declare(strict_types=1);

namespace Kata;

final class TrebuchetDay1
{
    public function extractTwoDigitNumber(string $string): string
    {
        preg_match_all('/\d+/', $string, $matches);

        $number = implode('', $matches[0]);

        if ($number === '') {
            return '';
        }

        $first = (int) $number[0];
        $last = (int) substr($number, -1);


        return $first . $last;
    }

    public function extractSumOfAllTwoDigitNumbers(string $input): int
    {
        $rows = explode("\n", $input);

        $sum = 0;

        foreach ($rows as $row) {
            $sum += (int)$this->extractTwoDigitNumber($row);
        }

        return $sum;
    }
}
