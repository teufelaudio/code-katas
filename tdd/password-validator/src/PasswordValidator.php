<?php declare(strict_types=1);

namespace Kata;

use Kata\PasswordValidator\ValidatorInterface;

final class PasswordValidator
{

    /**
     * @var list<ValidatorInterface>
     */
    private array $passwordValidators;

    public function __construct(array $passwordValidators)
    {
        $this->passwordValidators = $passwordValidators;
    }

    public function isValid(string $password): bool
    {
        foreach($this->passwordValidators as $passwordValidator) {
            if (!$passwordValidator->validate($password)) {
                return false;
            }
        }

        return true;
    }
}
