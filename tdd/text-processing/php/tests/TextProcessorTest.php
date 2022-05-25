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
}
