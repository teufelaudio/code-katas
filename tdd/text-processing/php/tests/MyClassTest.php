<?php declare(strict_types=1);

namespace KataTests;

use Kata\TextAnalyser;
use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase
{
    /** @test */
    public function test_text_has_zero_words(): void
    {
        $textAnalyzer = new TextAnalyser();

        $result = $textAnalyzer->analyzeWordCount('');

        self::assertEquals(0, $result);
    }
}
