<?php

declare(strict_types = 1);


namespace Kata\PasswordValidator;


final class Lowercase implements ValidatorInterface
{
    public function validate(string $password): bool
    {
        return (bool)preg_match('/[a-z]/', $password);
    }
}