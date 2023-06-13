<?php declare(strict_types=1);

namespace KataTests;

use Kata\TextAnalyzer;
use PHPUnit\Framework\TestCase;

class TextAnalyzerTest extends TestCase
{
    private TextAnalyzer $analyzer;

    protected function setUp(): void
    {
        $this->analyzer = new TextAnalyzer();
    }

    /** @test */
    public function test_empty_string_returns_0(): void
    {
        $result = $this->analyzer->analyze('');

        self::assertEquals(0, $result);
    }

    public function test_one_word_string_returns_1(): void
    {
        $result = $this->analyzer->analyze('foo');

        self::assertEquals(1, $result);
    }

    public function test_two_word_string_returns_2(): void
    {
        $result = $this->analyzer->analyze('foo bar');

        self::assertEquals(2, $result);
    }

    public function test_word_map_is_empty_for_empty_string(): void
    {
        $result = $this->analyzer->getWordCountMap('');

        self::assertEquals([], $result);
    }
}
