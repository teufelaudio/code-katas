<?php

declare(strict_types = 1);


namespace Kata\PasswordValidator;


final class Length implements ValidatorInterface
{
    const MIN_CHARACTERS = 8;

    public function validate(string $password): bool
    {
        return strlen($password) > self::MIN_CHARACTERS;
    }
}