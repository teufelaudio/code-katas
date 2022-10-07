<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\TheClass;
use PHPUnit\Framework\TestCase;

final class TheTest extends TestCase
{
    public function test_change_me(): void
    {
        $theClass = new TheClass();

        self::assertTrue($theClass->changeMe());
    }
}
