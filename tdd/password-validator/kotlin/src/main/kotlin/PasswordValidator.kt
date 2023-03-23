class PasswordValidator {

    fun validate(password: String) =
        password.length >= 9 && password.any { it.isUpperCase() }
}
