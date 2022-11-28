import org.junit.jupiter.api.Test
import kotlin.test.assertFalse

internal class PasswordValidatorTest {

    private val validator = PasswordValidator()

    @Test
    fun hasMinLength() {
        val shortPassword = "abc"
        assertFalse(validator.validate(shortPassword))
    }

    @Test
    fun doesNotContainCapitalLetter() {
        val passwordWithCapital = "abcdefghijk"
        assertFalse(validator.validate(passwordWithCapital))
    }

    @Test
    fun doesNotContainLowercaseLetter() {
        val example = "AAAAAAAAAA"
        assertFalse(validator.validate(example))
    }

    @Test
    fun doesNotContainDigit() {
        val passwordWithoutNumber = "abcdeFGhijk"
        assertFalse(validator.validate(passwordWithoutNumber))
    }

    @Test
    fun doesNotContainUnderscore() {
        val passwordWithoutUnderscore = "abcdeFGhij9"
        assertFalse(validator.validate(passwordWithoutUnderscore))
    }

}