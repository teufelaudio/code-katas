<?php

declare(strict_types=1);

namespace Kata;

use function PHPUnit\Framework\assertSame;

final class XmasTree
{
    public function __construct(
        private string $treeLeaveSymbol
    )
    {
        assertSame(1, strlen($this->treeLeaveSymbol));
    }

    public function getTreeWithHeight(int $height): string
    {
        $tree = [];
        $this->getTrunk($tree, $height);
        $this->getTreeLines($tree, $height);
        $tree = array_reverse($tree);

        print_r($tree);

        return implode(PHP_EOL, $tree);
    }

    private function getTrunk(array &$currentTree, int $treeHeight)
    {
        $currentTree[] = str_repeat(' ', $treeHeight-1) . '|';

        return $currentTree;
    }

    private function getTreeLines(array &$currentTree, int $treeHeight)
    {
        // height*2 -1
        $currentTree[] = $this->getWhitespaces($currentTree) . $this->getLeaves($treeHeight);
        $treeHeight--;

        if ($treeHeight > 0) {
            return $this->getTreeLines($currentTree, $treeHeight);
        }

        return $currentTree;
    }

    private function getLeaves($treeHeight): string
    {
        // height*2 -1
        return str_repeat($this->treeLeaveSymbol, ($treeHeight*2)-1);
    }

    private function getWhitespaces(array $currentTree): string
    {
        return str_repeat(' ', count($currentTree) - 1);
    }
}
