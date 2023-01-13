<?php

declare(strict_types=1);

namespace Kata;

final class XmasTree
{
    public function getTreeWithHeight(int $height): string
    {
        $babyTree = [
            'x',
            '|'
        ];

        $outputLines = $this->growTree($babyTree, $height);

        return implode(PHP_EOL, $outputLines);
    }

    private function growTree(array $currentTree, int $targetHeight)
    {
        $currentHeight = count($currentTree) - 1;

        if ($currentHeight === $targetHeight) return $currentTree;

        $currentBiggestBranch = $currentTree[$currentHeight - 1];

        $currentTree = array_map(function ($currentLine) {
            return ' ' . $currentLine;
        }, $currentTree);

        $currentTrunk = $currentTree[$currentHeight];

        $currentTree[$currentHeight] = $currentBiggestBranch . 'xx';
        $currentTree[] = $currentTrunk;

        return $this->growTree($currentTree, $targetHeight);
    }
}
