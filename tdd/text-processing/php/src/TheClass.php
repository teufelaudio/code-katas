<?php declare(strict_types=1);

namespace Kata;

class TheClass
{
    public function theMethod(string $inputText): array
    {
        $inputText = str_replace([',', '.', '!', ':', '?', ';'], '', $inputText);
        $words = explode(' ', $inputText);
        $occurences = [];

        foreach ($words as $word) {
            $key = strtolower($word);
            if (empty($occurences[$key])) {
                $occurences[$key] = 1;
            } else {
                $occurences[$key]++;
            }
        }

        usort($occurences, function($a, $b) {
            return $a - $b;
        });

        

        return $occurences;
    }

    private function sort(array $occurences): array
    {
        $sorted = [];

        

        return $sorted;
    }
}
