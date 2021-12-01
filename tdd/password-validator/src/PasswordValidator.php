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
        if (preg_match('/[A-Z]/', $password) === 0) {
            return false;
        }
        if (preg_match('/[a-z]/', $password) === 0) {
            return false;
        }
        if (preg_match('/\d+/', $password) === 0) {
            return false;
        }
        if (preg_match('/_/', $password) === 0) {
            return false;
        }

        return true;
    }
}
