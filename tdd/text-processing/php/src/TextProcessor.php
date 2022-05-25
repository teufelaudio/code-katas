<?php declare(strict_types=1);

namespace Kata;

class TextProcessor
{
    public function countWords(string $text): int
    {
        return str_word_count($text);
    }
}
