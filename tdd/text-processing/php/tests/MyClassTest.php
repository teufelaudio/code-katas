<?php declare(strict_types=1);

namespace KataTests;

use Kata\TextAnalyzer;
use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase
{
    private TextAnalyzer $textAnalyzer;

    protected function setUp(): void
    {
        $this->textAnalyzer = new TextAnalyzer();
    }

    public function test_empty_text_has_zero_words(): void
    {
        $result = $this->textAnalyzer->analyzeWordCount('');

        self::assertEquals(0, $result);
    }

    public function test_text_with_only_whitespace_has_zero_words(): void
    {
        $result = $this->textAnalyzer->analyzeWordCount(' ');

        self::assertEquals(0, $result);
    }

    public function test_text_with_only_whitespaces_has_zero_words(): void
    {
        $result = $this->textAnalyzer->analyzeWordCount('    ');

        self::assertEquals(0, $result);
    }

    public function test_text_with_one_word(): void
    {
        $result = $this->textAnalyzer->analyzeWordCount('Hello');

        self::assertEquals(1, $result);
    }

    public function test_text_with_two_words(): void
    {
        $result = $this->textAnalyzer->analyzeWordCount('Hello hello');

        self::assertEquals(2, $result);
    }

    public function test_text_from_example(): void
    {
        $result = $this->textAnalyzer->analyzeWordCount('Hello, this is an example for you to practice. You should grab this text and make it as your test case.');

        self::assertEquals(21, $result);
    }

    public function test_frequency_of_empty_text(): void
    {
        $result = $this->textAnalyzer->analyzeWordFrequency('');

        self::assertEquals([], $result);
    }

    public function test_frequency_of_one_single_word(): void
    {
        $result = $this->textAnalyzer->analyzeWordFrequency('Hello');

        self::assertEquals(['hello' => 1], $result);
    }

    public function test_frequency_of_two_same_words(): void
    {
        $result = $this->textAnalyzer->analyzeWordFrequency('Hello Hello');

        self::assertEquals(['hello' => 2], $result);
    }

    public function test_frequency_is_case_insensetive(): void
    {
        $result = $this->textAnalyzer->analyzeWordFrequency('Hello hello');

        self::assertEquals(['hello' => 2], $result);
    }

    public function test_frequency_of_two_same_words_and_a_third_one(): void
    {
        $result = $this->textAnalyzer->analyzeWordFrequency('Hello hello Bob');

        self::assertEquals(['hello' => 2, 'bob' => 1], $result);
    }

    public function test_frequency_ignores_punctuation(): void
    {
        $result = $this->textAnalyzer->analyzeWordFrequency('Hello, hello Bob!');

        self::assertEquals(['hello' => 2, 'bob' => 1], $result);
    }
}
