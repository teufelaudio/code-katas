<?php

declare(strict_types=1);

namespace KataTests\Unit\Rules;

use Kata\Rules\PasswordLengthRule;
use Kata\Rules\PasswordNumberRule;
use PHPUnit\Framework\TestCase;

final class PasswordNumberRuleTest extends TestCase
{
    private PasswordNumberRule $rule;

    protected function setUp(): void
    {
        $this->rule = new PasswordNumberRule();
    }

    public function test_password_without_any_number_is_failing(): void
    {
        self::assertFalse($this->rule->validateRule('ABCDEFGH'));
    }

    public function test_password_with_one_number_is_passing(): void
    {
        self::assertTrue($this->rule->validateRule('ABCd9EFGH'));
    }
}