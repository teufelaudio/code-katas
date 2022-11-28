class PasswordValidator {

    fun validate(enteredPassword: String) =
        enteredPassword.length >= MIN_PASSWORD_LENGTH
                && enteredPassword.any { it.isUpperCase() }
                && enteredPassword.any { it.isLowerCase() }
                && enteredPassword.any { it.isDigit() }
                && enteredPassword.contains("_")

    companion object {
        const val MIN_PASSWORD_LENGTH = 9
    }

}