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

        return $wordList;
    }
}
