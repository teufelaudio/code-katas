<?php

declare(strict_types=1);

namespace KataTests\Unit\Rules;

use Kata\Rules\PasswordLengthRule;
use PHPUnit\Framework\TestCase;

final class PasswordLengthRuleTest extends TestCase
{
    private PasswordLengthRule $rule;

    protected function setUp(): void
    {
        $this->rule = new PasswordLengthRule();
    }

    public function test_password_password_with_less_then_8_chars_is_failing(): void
    {
        self::assertFalse($this->rule->validateRule('abcdefg'));
    }

    public function test_password_with_8_or_more_chars_is_passing(): void
    {
        self::assertTrue($this->rule->validateRule('abcdefgh'));
    }
}