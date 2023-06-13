<?php declare(strict_types=1);

namespace Kata;

class TextAnalyzer
{
    public function analyze(string $text): int
    {
        return str_word_count($text);
    }

    public function getWordCountMap(string $string): array
    {
        if ($string === '') {
            return [];
        }

        $string = $this->sanitizeString($string);

        $wordList = explode(' ', $string);

        $wordList = array_count_values($wordList);

        arsort($wordList, SORT_NUMERIC);

        return $wordList;
    }

    private function sanitizeString(string $string): string
    {
        $string = strtolower($string);

        $string = str_replace([',','.'], '', $string);

        return $string;
    }
}
