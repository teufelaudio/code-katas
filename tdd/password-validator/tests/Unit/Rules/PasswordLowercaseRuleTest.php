<?php

declare(strict_types=1);

namespace KataTests\Unit\Rules;

use Kata\Rules\PasswordLowercaseRule;
use PHPUnit\Framework\TestCase;

final class PasswordLowercaseRuleTest extends TestCase
{
    private PasswordLowercaseRule $rule;

    protected function setUp(): void
    {
        $this->rule = new PasswordLowercaseRule();
    }

    public function test_password_without_any_lowercase_letter_is_failing(): void
    {
        self::assertFalse($this->rule->validateRule('ABCDEFGH'));
    }

    public function test_password_with_one_lowercase_letter_is_passing(): void
    {
        self::assertTrue($this->rule->validateRule('ABCdEFGH'));
    }
}