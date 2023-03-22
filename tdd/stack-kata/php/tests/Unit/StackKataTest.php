<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\StackKata;
use PHPUnit\Framework\TestCase;

final class StackKataTest extends TestCase
{
    public function test_change_me(): void
    {
        $kata = new StackKata();

        self::assertTrue($kata->changeMe());
    }
}
