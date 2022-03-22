<?php

declare(strict_types=1);

namespace KataTests;

use Kata\MyClass;
use PHPUnit\Framework\TestCase;

final class MyClassTest extends TestCase
{
    public function test_nothing(): void
    {
        $kata = new MyClass();

        self::assertTrue($kata->changeMe());
    }
}
