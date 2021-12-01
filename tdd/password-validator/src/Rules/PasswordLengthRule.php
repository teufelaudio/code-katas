<?php

declare(strict_types=1);

namespace Kata\Rules;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class PasswordLengthRule implements PasswordRuleInterface
{
    private const MIN_PASSWORD_LENGTH = 8;

    public function validateRule(string $password): bool
    {
        try {
            Assertion::minLength($password, self::MIN_PASSWORD_LENGTH);

            return true;
        } catch (AssertionFailedException $exception) {
            return false;
        }
    }
}