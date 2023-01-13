<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\XmasTree;
use PHPUnit\Framework\TestCase;

final class XmasTreeTest extends TestCase
{
    public function test_change_me(): void
    {
        $a = new XmasTree();

        self::assertTrue($a->changeMe());
    }
}
