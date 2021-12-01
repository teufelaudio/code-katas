<?php declare(strict_types=1);

namespace Kata;

final class PasswordValidator
{
    const MIN_CHARACTERS = 8;

    public function isValid(string $password): bool
    {
        return $this->checkAmountOfCharacters($password);
    }

    private function checkAmountOfCharacters(string $password): bool
    {
        return strlen($password) > self::MIN_CHARACTERS;
    }
}
