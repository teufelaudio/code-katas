<?php

declare(strict_types=1);

namespace KataTests\Unit;

use Kata\XmasTree;
use Kata\XmasTreePrinter;
use PHPUnit\Framework\TestCase;

final class XmasTreePrinterTest extends TestCase
{
    public function test_print_of_tree(): void
    {
        $xmasTree = new XmasTree('X', '|');
        $xmasTreePrinter = new XmasTreePrinter();

        $tree = $xmasTree->generate(6);
        $xmasTreePrinter->print($tree);

        $this->assertTrue(true);
    }
}
