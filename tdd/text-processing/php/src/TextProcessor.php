<?php declare(strict_types=1);

namespace Kata;

class TextProcessor
{
    public function countWords(string $text): int
    {
        return str_word_count($text);
    }

    /**
     * @return list<string>
     */
    public function listTopWords(string $text): array
    {
        $text = $this->normalizeText($text);

        $explodedText = explode(' ', $text);

        $result = array_count_values($explodedText);

        krsort($result);
        uasort($result,fn($a, $b) => $b <=> $a);

        return array_keys(array_slice($result, 0, 10));
    }

    private function normalizeText(string $text): string
    {
        return strtolower(str_replace([',','!','.'],'',$text)); // TODO: improve to catch all unwanted character
    }
}
