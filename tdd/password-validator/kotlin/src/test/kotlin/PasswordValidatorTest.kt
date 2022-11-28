import org.junit.jupiter.api.Test
import kotlin.test.assertFalse
import kotlin.test.assertTrue

internal class PasswordValidatorTest {

    @Test
    fun hasMinLength() {
        val lengthValidator = LengthValidator(
            MIN_PASSWORD_LENGTH,
            TerminalValidator()
        )

        assertFalse(lengthValidator.validate("abc"))
    }

    @Test
    fun doesNotContainCapitalLetter() {
        val containsUpperCaseValidator =
            ContainsUpperCaseValidator(
                TerminalValidator()
            )

        assertFalse(containsUpperCaseValidator.validate("abcdefghijk"))
    }

    @Test
    fun doesNotContainLowercaseLetter() {
        val containsLowerCaseValidator =
            ContainsLowerCaseValidator(
                TerminalValidator()
            )

        assertFalse(containsLowerCaseValidator.validate("AAAAAAAAAA"))
    }

    @Test
    fun doesNotContainDigit() {
        val containsDigitValidator =
            ContainsDigitValidator(
                TerminalValidator()
            )

        assertFalse(containsDigitValidator.validate("abcdeFGhijk"))
    }

    @Test
    fun doesNotContainUnderscore() {
        val containsSpecialCharacterValidator =
            ContainsSpecialCharacterValidator(
                DEFAULT_SPECIAL_CHARACTERS,
                TerminalValidator()
            )
        assertFalse(containsSpecialCharacterValidator.validate("abcdeFGhij9"))
    }

    @Test
    fun acceptsValidPassword() {
        val passwordValidator = PasswordValidator()
        assertTrue(passwordValidator.validate(VALID_PASSWORD))
    }

    companion object {
        const val VALID_PASSWORD = "Abd3fg_i"
        const val MIN_PASSWORD_LENGTH = 8
        val DEFAULT_SPECIAL_CHARACTERS = setOf('_')
    }

}