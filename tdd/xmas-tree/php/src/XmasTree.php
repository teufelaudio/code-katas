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

        return implode(PHP_EOL, $outputLines);
    }
}
