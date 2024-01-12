<?php declare(strict_types=1);

namespace Kata;

class Processor
{
    public function process(string $text): string
    {
        return <<<EOF
            These are the top 10 words used:

            The text has in total 0 words
            EOF;
    }
}
