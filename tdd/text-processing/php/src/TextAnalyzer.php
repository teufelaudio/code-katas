<?php declare(strict_types=1);

namespace Kata;

class TextAnalyzer
{
    public function analyze(string $text): int
    {
        return str_word_count($text);
    }
}
