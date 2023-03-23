import org.junit.jupiter.api.Test
import kotlin.test.assertFalse
import kotlin.test.assertTrue

internal class PasswordValidator2Test {

    private val validator = PasswordValidator2()

    @Test
    fun validPassword() {
        assertTrue(validator.validate("A2cdefg"))
    }

    @Test
    fun invalidLength() {
        assertFalse(validator.validate("A2cdef"))
    }

    @Test
    fun missingUpperCaseLetter() {
        assertFalse(validator.validate("a2cdef"))
    }

    @Test
    fun missingLowerCaseLetter() {
        assertFalse(validator.validate("A2CDEF"))
    }

    @Test
    fun missingNumber() {
        assertFalse(validator.validate("Abcdefg"))
    }
}
