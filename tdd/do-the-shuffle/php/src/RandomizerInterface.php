<?php

declare(strict_types=1);

namespace Kata;

interface RandomizerInterface
{
    /**
     * @return list<int>
     */
    public function createRandomNumbers(int $count): array;
}