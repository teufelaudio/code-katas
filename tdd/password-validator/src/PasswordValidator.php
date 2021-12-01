<?php

declare(strict_types=1);

namespace Kata;

final class PasswordValidator
{
    public function validatePassword(string $password): bool
    {
        if (strlen($password) < 8) {
            return false;
        }
        if (!$this->containsUppercaseLetter($password)) {
            return false;
        }
        if (!$this->containsLowercaseLetter($password)) {
            return false;
        }
        if (preg_match('/\d+/', $password) === 0) {
            return false;
        }
        if (false === strpos($password, '_')) {
            return false;
        }

        return true;
    }

    private function containsUppercaseLetter($password) {
        return strtolower($password) !== $password;
    }

    private function containsLowercaseLetter($password) {
        return strtoupper($password) !== $password;
    }
}
