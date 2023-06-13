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

        $wordList = explode(' ', $string);

        $wordList = array_count_values($wordList);

        arsort($wordList, SORT_NUMERIC);

        return $wordList;
    }
}
