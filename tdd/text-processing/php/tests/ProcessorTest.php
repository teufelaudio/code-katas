<?php declare(strict_types=1);

namespace KataTests;

use Kata\Processor;
use PHPUnit\Framework\TestCase;

class ProcessorTest extends TestCase
{
    /** @test */
    public function example_text_(): void
    {
        $processor = new Processor();

        $result = $processor->process('Hello, this is an example for you to practice. You should grab this text and make it as your test case.');

        $expected = 'Those are the top 10 words used: you,this,hello,text,test,your,as,it,make,and. The text has in total 21 words';

        self::assertSame($expected, $result);
    }
}
