<?php

declare(strict_types=1);

namespace KataTests\Unit\Rules;

use Kata\Rules\PasswordUppercaseRule;
use PHPUnit\Framework\TestCase;

final class PasswordUppercaseRuleTest extends TestCase
{
    private PasswordUppercaseRule $rule;

    protected function setUp(): void
    {
        $this->rule = new PasswordUppercaseRule();
    }

    public function test_password_without_any_uppercase_letter_is_failing(): void
    {
        self::assertFalse($this->rule->validateRule('abcdefgh'));
    }

    public function test_password_with_one_uppercase_letter_is_passing(): void
    {
        self::assertTrue($this->rule->validateRule('abcDefgh'));
    }
}