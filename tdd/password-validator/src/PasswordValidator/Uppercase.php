<?php

declare(strict_types = 1);


namespace Kata\PasswordValidator;


final class Uppercase implements ValidatorInterface
{
    public function validate(string $password): bool
    {
        return (bool)preg_match('/[A-Z]/', $password);
    }
}