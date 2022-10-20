<?php

declare(strict_types = 1);

namespace Kata;

interface NumberGeneratorInterface
{
    public function generateRandomNumber(): int;
}