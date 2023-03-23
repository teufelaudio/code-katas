sealed interface PasswordValidatorInterface {

    fun validate(password: String): Boolean
}
