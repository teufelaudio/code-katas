<?php

declare(strict_types = 1);

namespace Kata;

final class PopularityAnalyzer implements PopularityAnalyzerInterface
{
    public function mostPopularWords(string $text): array
    {
        if (empty($text)) {
            return [];
        }
        return explode(' ', $text);
    }
}