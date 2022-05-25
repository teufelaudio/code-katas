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
        $result = [];

        $text = $this->normalizeText($text);

        $explodedText = explode(' ', $text);

        foreach($explodedText as $word) {
            if (!isset($result[$word])) {
                $result[$word] = 0;
            }

            $result[$word]++;
        }

        return $result;
    }

    private function normalizeText(string $text): string
    {
        return strtolower(str_replace([',','!'],'',$text));
    }
}
