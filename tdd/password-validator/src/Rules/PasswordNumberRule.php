<?php

declare(strict_types=1);

namespace Kata\Rules;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class PasswordNumberRule implements PasswordRuleInterface
{
    public function validateRule(string $password): bool
    {
        try {
            Assertion::regex($password, '/[0-9]+/');

            return true;
        } catch (AssertionFailedException $exception) {
            return false;
        }
    }
}