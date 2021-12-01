<?php declare(strict_types=1);

namespace KataTests\Unit;

use Kata\PasswordValidator;
use Kata\Rules\PasswordRuleInterface;
use PHPUnit\Framework\TestCase;

final class PasswordValidatorTest extends TestCase
{
    public function test_password_validation_without_rules_is_passing(): void
    {
        $validator = new PasswordValidator([]);

        $this->assertTrue($validator->validate(''));
    }

    public function test_password_validation_with_one_passing_rule_is_passing(): void
    {
        $rule1 = $this->createMock(PasswordRuleInterface::class);
        $rule1->method('validateRule')->willReturn(true);

        $validator = new PasswordValidator([
            $rule1
        ]);

        $this->assertTrue($validator->validate(''));
    }

    public function test_password_validation_with_one_failing_rule_is_failing(): void
    {
        $rule1 = $this->createMock(PasswordRuleInterface::class);
        $rule1->method('validateRule')->willReturn(false);

        $validator = new PasswordValidator([
            $rule1
        ]);

        $this->assertFalse($validator->validate(''));
    }

    public function test_password_validation_with_one_passing_and_one_failing_rule_is_failing(): void
    {
        $rule1 = $this->createMock(PasswordRuleInterface::class);
        $rule1->method('validateRule')->willReturn(true);

        $rule2 = $this->createMock(PasswordRuleInterface::class);
        $rule2->method('validateRule')->willReturn(false);

        $validator = new PasswordValidator([
            $rule1,
            $rule2,
        ]);

        $this->assertFalse($validator->validate(''));
    }

    public function test_password_validation_with_all_rules_passing_is_passing(): void
    {
        $rule1 = $this->createMock(PasswordRuleInterface::class);
        $rule1->method('validateRule')->willReturn(true);

        $rule2 = $this->createMock(PasswordRuleInterface::class);
        $rule2->method('validateRule')->willReturn(true);

        $validator = new PasswordValidator([
            $rule1,
            $rule2,
        ]);

        $this->assertTrue($validator->validate(''));
    }

}
