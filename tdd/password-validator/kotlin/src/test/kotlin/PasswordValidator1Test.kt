import org.junit.jupiter.api.Test
import kotlin.test.assertFalse
import kotlin.test.assertTrue

internal class PasswordValidator1Test {

    private val validator = PasswordValidator1()

    @Test
    fun validPassword() {
        assertTrue(validator.validate("1bc_eFghi"))
    }

    @Test
    fun invalidLength() {
        assertFalse(validator.validate("1bc_eFgh"))
    }

    @Test
    fun missingCapitalLetter() {
        assertFalse(validator.validate("1bc_efghi"))
    }

    @Test
    fun missingLowerLetter() {
        assertFalse(validator.validate("1BC_EFGHI"))
    }

    @Test
    fun missingNumber() {
        assertFalse(validator.validate("abc_eFghi"))
    }

    @Test
    fun missingUnderscore() {
        assertFalse(validator.validate("1bc+eFghi"))
    }
}
