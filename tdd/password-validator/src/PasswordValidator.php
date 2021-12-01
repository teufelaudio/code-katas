<?php declare(strict_types=1);

namespace Kata;

final class PasswordValidator
{
    public function validatePwd(string $pwd): bool
    {
        if (strlen($pwd) >= 8) {
            return true;
        }
        return false;
    }
}
