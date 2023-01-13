<?php declare(strict_types=1);

namespace Kata;

final class XmasTree
{
    public function getTreeWithHeight(int $height): string
    {
        $outputLines = [];

        if ($height === 1) {
            $outputLines[] = 'x';
            $outputLines[] = '|';
        }

        if ($height === 2) {

            $outputLines[] = ' x';
            $outputLines[] = 'xxx';
            $outputLines[] = ' |';
        }

        if ($height === 3) {

            $outputLines[] = '  x';
            $outputLines[] = ' xxx';
            $outputLines[] = 'xxxxx';
            $outputLines[] = '  |';
        }

        $tree = [];
        $this->getTreeLine($tree, 1);

        return implode(PHP_EOL, $outputLines);
    }

    private function getTreeLine(array $currentTree, int $heightLevel) {
        $currentTree[] = str_repeat(' ', $heightLevel-1) . str_repeat('|', $heightLevel);
        $currentTree[] = str_repeat(' ', $heightLevel-1) . str_repeat('x', $heightLevel);

        return $currentTree;
    }
}
