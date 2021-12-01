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
        if (strtolower($password) === $password) {
            return false;
        }
        if (strtoupper($password) === $password) {
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
}
