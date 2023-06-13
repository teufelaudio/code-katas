<?php

declare(strict_types = 1);

namespace Kata;

interface PopularityAnalyzerInterface
{
    public function mostPopularWords(string $text): array;
}