<?php declare(strict_types=1);

namespace Kata;

final class XmasTree
{
    public function getTreeWithHeight(int $height): string
    {
        if ($height === 1) {
            return <<< 'NOWDOC'
            x
            |
            NOWDOC;
        } else {
            return <<< 'NOWDOC'
             x
            xxx
             |
            NOWDOC;
        }
    }
}
