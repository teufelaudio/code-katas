<?php declare(strict_types=1);

namespace Kata;

final class PasswordValidator
{
    const MIN_CHARACTERS = 8;

    public function isValid(string $password): bool
    {
        if (!$this->validateAmountOfCharacters($password)) {
            return false;
        }
        if (!$this->validateUppercaseLetter($password)) {
            return false;
        }

        return true;
    }

    public function validateAmountOfCharacters(string $password): bool
    {
        return strlen($password) > self::MIN_CHARACTERS;
    }

    public function validateUppercaseLetter(string $password): bool
    {
        return (bool)preg_match('/[A-Z]/', $password);
    }
}
