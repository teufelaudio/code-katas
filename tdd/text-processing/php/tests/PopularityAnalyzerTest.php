<?php

declare(strict_types = 1);


namespace KataTests;

use Kata\PopularityAnalyzer;
use PHPUnit\Framework\TestCase;

final class PopularityAnalyzerTest extends TestCase
{
    public function test_empty_string(): void
    {
        $popularityAnalyzer = new PopularityAnalyzer();

        $result = $popularityAnalyzer->mostPopularWords('');

        self::assertEmpty($result);
    }

    public function test_three_different_words(): void
    {
        $popularityAnalyzer = new PopularityAnalyzer();

        $result = $popularityAnalyzer->mostPopularWords('one two three');

        self::assertCount(3, $result);
    }

    public function test_three_identical_words_with_different_case(): void
    {
        $popularityAnalyzer = new PopularityAnalyzer();

        $result = $popularityAnalyzer->mostPopularWords('one One oNe');

        self::assertEquals(['one' => 3], $result);
    }

    public function test_counts_popularity(): void
    {
        $popularityAnalyzer = new PopularityAnalyzer();

        $result = $popularityAnalyzer->mostPopularWords('one One ONE Two TWO three');

        self::assertEquals(
            [
                'one' => 3,
                'two' => 2,
                'three' => 1,
            ],
            $result
        );
    }
}
