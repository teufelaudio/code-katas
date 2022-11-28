interface Validator {
    fun validate(string: String): Boolean
}

class PasswordValidator : Validator {

    private val passwordValidator: Validator =
        LengthValidator(
            MIN_PASSWORD_LENGTH,
            ContainsUpperCaseValidator(
                ContainsLowerCaseValidator(
                    ContainsDigitValidator(
                        ContainsSpecialCharacterValidator(
                            DEFAULT_SPECIAL_CHARACTERS,
                            TerminalValidator()
                        )
                    )
                )
            )
        )

    override fun validate(string: String) : Boolean = passwordValidator.validate(string)

    companion object {
        const val MIN_PASSWORD_LENGTH = 8
        val DEFAULT_SPECIAL_CHARACTERS = setOf('_')
    }

}

class LengthValidator(
    private val minLength: Int,
    private val validator: Validator
) : Validator {
    override fun validate(string: String): Boolean {
        return if (string.length >= minLength) {
            validator.validate(string)
        } else {
            println("Invalid Password Length")
            false
        }
    }
}

class ContainsUpperCaseValidator(
    private val validator: Validator
) : Validator {
    override fun validate(string: String): Boolean {
        return if (string.any { it.isUpperCase() }) {
            validator.validate(string)
        } else {
            println("No upper case letter present - 'A-Z'")
            false
        }
    }
}

class ContainsLowerCaseValidator(
    private val validator: Validator
) : Validator {
    override fun validate(string: String): Boolean {
        return if (string.any { it.isLowerCase() }) {
            validator.validate(string)
        } else {
            println("No lower case letter present - 'a-z'")
            false
        }
    }
}

class ContainsDigitValidator(
    private val validator: Validator
    ) : Validator {
    override fun validate(string: String): Boolean {
        return if (string.any { it.isDigit() }) {
            validator.validate(string)
        } else {
            println("No digit present - '0-9'")
            false
        }
    }

}

class ContainsSpecialCharacterValidator(
    val charSet: Set<Char>,
    val validator: Validator
    ) : Validator {
    override fun validate(string: String): Boolean {
        return if (string.any { charSet.contains(it) } ) {
            validator.validate(string)
        } else {
            println("No Special Character present - '$charSet'")
            false
        }
    }
}

class TerminalValidator: Validator {
    override fun validate(string: String): Boolean = true
}

