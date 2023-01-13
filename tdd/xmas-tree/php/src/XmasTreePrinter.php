<?php declare(strict_types=1);

namespace Kata;

final class XmasTreePrinter
{
    public function print(array $tree): void
    {
        foreach ($tree as $row) {
            print $row . PHP_EOL;
        }
    }
}
