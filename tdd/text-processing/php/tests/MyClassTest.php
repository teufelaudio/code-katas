<?php declare(strict_types=1);

namespace KataTests;

use Kata\TheClass;
use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase
{
    /** @test */
    public function example_text_(): void
    {
        $xxx = new TheClass();

        $result = $xxx->theMethod('Hello, this is an example for you to practice. You should grab this text and make it as your test case.');

        $expected = [
            'you',
            'this',
            'your',
            'to',
            'text',
            'test',
            'should',
            'practice',
            'make',
            'it',
        ];

        self::assertSame($expected, $result);
    }
}
