<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\XmasTree;
use PHPUnit\Framework\TestCase;

final class XmasTreeTest extends TestCase
{
    /**
     * @exp
     *   X  -> 1
     *   |  -> 0
     */
    public function test_height_zero_returns_trunk(): void
    {
        $xmasTree = new XmasTree();
        $tree = $xmasTree->generate(0);

        self::assertEquals(['|'], $tree);
    }

    public function test_height_one_returns_trunk_with_one_x(): void
    {
        $xmasTree = new XmasTree();
        $tree = $xmasTree->generate(1);

        self::assertEquals(['X','|'], $tree);
    }
}
