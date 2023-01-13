<?php

declare(strict_types=1);

namespace KataTests\Unit;

use Kata\XmasTree;
use PHPUnit\Framework\TestCase;

final class XmasTreeTest extends TestCase
{
    public function test_tree_with_height_1(): void
    {
        $a = new XmasTree('x');

        $expected = <<< 'NOWDOC'
        x
        |
        NOWDOC;
        self::assertSame($expected, $a->getTreeWithHeight(1));
    }

    public function test_tree_with_height_2(): void
    {
        $a = new XmasTree('x');

        $expected = <<< 'NOWDOC'
         x
        xxx
         |
        NOWDOC;
        self::assertSame($expected, $a->getTreeWithHeight(2));
    }

    public function test_tree_with_height_3(): void
    {
        $a = new XmasTree('o');

        $expected = <<< 'NOWDOC'
          o
         ooo
        ooooo
          |
        NOWDOC;
        self::assertSame($expected, $a->getTreeWithHeight(3));
    }

    public function test_tree_with_height_4(): void
    {
        $a = new XmasTree('W');

        $expected = <<< 'NOWDOC'
           W
          WWW
         WWWWW
        WWWWWWW
           |
        NOWDOC;
        self::assertSame($expected, $a->getTreeWithHeight(4));
    }
}
