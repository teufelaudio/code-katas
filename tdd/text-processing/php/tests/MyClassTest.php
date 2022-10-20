<?php declare(strict_types=1);

namespace KataTests;

use Kata\Game;
use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase
{
    /** @test */
    public function give_me_a_good_name_please(): void
    {
        $xxx = new Game();

        $result = $xxx->theMethod();

        self::assertEquals(true, $result);
    }
}
