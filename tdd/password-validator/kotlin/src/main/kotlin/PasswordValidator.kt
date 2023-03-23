class PasswordValidator {

    fun validate(password: String): Boolean {
        return password.length >= 9
            && password.any { it.isUpperCase() }
            && password.any { it.isLowerCase() }
    }
}
