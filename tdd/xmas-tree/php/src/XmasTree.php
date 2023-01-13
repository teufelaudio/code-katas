<?php declare(strict_types=1);

namespace Kata;

final class XmasTree
{
    public function generate(int $height): array
    {
        $tree = [];

        for ($i = 1; $i <= $height; $i++) {
            $tree[] = 'X';
        }

        $tree[] = '|';

        return $tree;
    }
}
