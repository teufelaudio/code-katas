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
    public function give_me_a_good_name_please(): void
    {
        $result = $this->analyzer->analyze();

        self::assertEquals(true, $result);
    }
}
