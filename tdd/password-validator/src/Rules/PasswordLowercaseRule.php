<?php

declare(strict_types=1);

namespace Kata\Rules;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class PasswordLowercaseRule implements PasswordRuleInterface
{
    public function validateRule(string $password): bool
    {
        try {
            Assertion::regex($password, '/[a-z]+/');

            return true;
        } catch (AssertionFailedException $exception) {
            return false;
        }
    }
}