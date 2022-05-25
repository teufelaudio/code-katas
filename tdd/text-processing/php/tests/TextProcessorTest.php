<?php declare(strict_types=1);

namespace KataTests;

use Kata\TextProcessor;
use PHPUnit\Framework\TestCase;

class TextProcessorTest extends TestCase
{
    public function test_empty_string_has_0_word_count(): void
    {
        $processor = new TextProcessor();

        self::assertEquals(0, $processor->countWords(''));
    }

    public function test_text_string_has_1_word_count(): void
    {
        $processor = new TextProcessor();

        $text = 'Hello!';

        self::assertEquals(1, $processor->countWords($text));
    }

    public function test_text_string_has_5_word_count(): void
    {
        $processor = new TextProcessor();

        $text = 'Hello, this is an example.';

        self::assertEquals(5, $processor->countWords($text));
    }
}
