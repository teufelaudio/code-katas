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

    public function test_text_string_has_21_word_count(): void
    {
        $processor = new TextProcessor();

        $text = 'Hello, this is an example for you to practice. You should grab this text and make it as your test case.';

        self::assertEquals(21, $processor->countWords($text));
    }
}
