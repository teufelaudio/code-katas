<?php

declare(strict_types = 1);


namespace Kata\PasswordValidator;


interface ValidatorInterface
{
    public function validate(string $password): bool;
}