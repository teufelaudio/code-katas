<?php

namespace Kata\Rules;

interface PasswordRuleInterface
{
    public function validateRule(string $password): bool;
}