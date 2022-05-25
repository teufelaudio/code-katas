<?php declare(strict_types=1);

namespace Kata;

class Processor
{
    public function process(string $text): string{
        $words = $this->analyse($text);
        return $this->prepareOutput($words);
    }

    private function analyse(string $inputText): array
    {
        $inputText = str_replace([',', '.', '!', ':', '?', ';'], '', $inputText);
        $words = explode(' ', $inputText);

        $occurrences = [];
        foreach ($words as $word) {
            $key = strtolower($word);
            if (empty($occurrences[$key])) {
                $occurrences[$key] = 1;
            } else {
                $occurrences[$key]++;
            }
        }
        arsort($occurrences);

        return array_keys($occurrences);
    }

    private function prepareOutput(array $words): string
    {
        return sprintf('Those are the top 10 words used: %s. The text has in total %s words', implode(',', array_slice($words,0, 10)), count($words));
    }
}
