import org.junit.jupiter.api.Test
import kotlin.test.assertFalse
import kotlin.test.assertTrue

internal class PasswordValidator3Test {

    private val validator = PasswordValidator3()

    @Test
    fun validPassword() {
        assertTrue(validator.validate("A2cdefg12_4567890"))
    }

    @Test
    fun invalidLength() {
        assertFalse(validator.validate("A2cdefg1_3456789"))
    }

    @Test
    fun missingLowerCaseLetter() {
        assertFalse(validator.validate("A2CDEFG1_34567890"))
    }

    @Test
    fun missingNumber() {
        assertFalse(validator.validate("AicdefgaBCDefghiO"))
    }
}
