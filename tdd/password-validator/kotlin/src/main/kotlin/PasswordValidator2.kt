class PasswordValidator2 : PasswordValidatorInterface {

    override fun validate(password: String): Boolean {
        return password.length > 6
            && password.any { it.isUpperCase() }
            && password.any { it.isLowerCase() }
            && password.any { it.isDigit() }
    }
}
