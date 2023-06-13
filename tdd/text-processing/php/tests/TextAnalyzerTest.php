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

    public function test_word_map_contains_one_entry_for_one_word_string(): void
    {
        $result = $this->analyzer->getWordCountMap('foo');

        self::assertEquals(['foo' => 1], $result);
    }

    public function test_word_map_contains_correct_entry_for_two_same_words_string(): void
    {
        $result = $this->analyzer->getWordCountMap('foo foo');

        self::assertEquals(['foo' => 2], $result);
    }

    public function test_word_map_contains_correct_entry_for_two_different_words_string(): void
    {
        $result = $this->analyzer->getWordCountMap('foo bar');

        self::assertEquals([
            'foo' => 1,
            'bar' => 1,
        ], $result);
    }

    public function test_word_map_contains_correct_entries_for_different_words_string_with_duplicates(): void
    {
        $result = $this->analyzer->getWordCountMap('bar foo foo');

        self::assertSame([
            'foo' => 2,
            'bar' => 1,
        ], $result);
    }

    public function test_word_map_contains_correct_entries_for_different_words_string_with_multiple_duplicates(): void
    {
        $result = $this->analyzer->getWordCountMap('baz bar baz foo baz foo');

        self::assertSame([
            'baz' => 3,
            'foo' => 2,
            'bar' => 1,
        ], $result);
    }
}
