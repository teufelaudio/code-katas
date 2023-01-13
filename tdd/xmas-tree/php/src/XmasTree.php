<?php declare(strict_types=1);

namespace Kata;

final class XmasTree
{
    public function generate(int $height): array
    {
        $tree = [];

        if ($height < 0) {
            return $tree;
        }

        for ($level = 1; $level <= $height; $level++) {

            $spaces = $this->createSpacesByHeight($height + 1 - $level);
            $x = $this->createXByLevel($level);

            $tree[] = $spaces . $x . $spaces;
        }

        $tree[] = $this->createTrunkWithSpacesByHeight($height);

        return $tree;
    }

    private function createSpacesByHeight(int $height): string
    {
        if ($height < 1) {
            return '';
        }

        $spaceAmount = $height - 1;

        return str_repeat(' ', $spaceAmount);
    }

    private function createXByLevel(int $currentTreeLevel): string
    {
        $xAmount = 2 * $currentTreeLevel - 1;

        return str_repeat('X', $xAmount);
    }

    private function createTrunkWithSpacesByHeight(int $height): string
    {
        if ($height < 1) {
            return '|';
        }

        $spaces = str_repeat(' ', $height - 1);

        return $spaces . '|' . $spaces;
    }
}
