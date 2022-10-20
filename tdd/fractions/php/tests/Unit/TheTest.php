<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\Game;
use PHPUnit\Framework\TestCase;

final class TheTest extends TestCase
{
    public function test_change_me(): void
    {
        $theClass = new Game();

        self::assertTrue($theClass->changeMe());
    }
}
