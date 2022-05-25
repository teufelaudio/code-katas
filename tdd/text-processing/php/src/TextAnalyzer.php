<?php declare(strict_types=1);

namespace Kata;

class TextAnalyzer
{
    public function analyzeWordCount(string $text): int
    {
        return count($this->getWords($text));
    }

    public function analyzeWordFrequency(string $text): array
    {
        return array_count_values(
            array_map('strtolower', $this->getWords($text))
        );
    }

    private function getWords(string $text): array
    {
        $text = preg_replace('/[[:punct:]]/', '', trim($text));

        if ($text === '') {
            return [];
        }

        $words = explode(' ', $text);

        return  $words === false
            ? []
            : $words;
    }
}