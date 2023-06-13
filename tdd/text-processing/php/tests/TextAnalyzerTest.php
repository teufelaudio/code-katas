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
}
