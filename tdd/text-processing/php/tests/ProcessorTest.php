<?php declare(strict_types=1);

namespace KataTests;

use Kata\PopularityAnalyzerInterface;
use Kata\Processor;
use PHPUnit\Framework\TestCase;

class ProcessorTest extends TestCase
{
    public function test_empty_string(): void
    {
        $popularityAnalyzer = $this->createStub(PopularityAnalyzerInterface::class);
        $processor = new Processor($popularityAnalyzer);

        $result = $processor->process('');

        self::assertEquals(
            <<<EOF
            These are the top 10 words used:

            The text has in total 0 words
            EOF, $result);

    }
}
