<?php declare(strict_types=1);

namespace Kata;

use Kata\Rules\PasswordRuleInterface;

final class PasswordValidator
{
    /**
     * @var list<PasswordRuleInterface>
     */
    private array $passwordRules;

    public function __construct(array $passwordRules)
    {
        $this->passwordRules = $passwordRules;
    }

    public function validate(string $password): bool
    {
        foreach ($this->passwordRules as $rule) {
            if (!$rule->validateRule($password)) {
                return false;
            }
        }

        return true;
    }
}
