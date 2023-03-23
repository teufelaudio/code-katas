import org.junit.jupiter.api.Test
import kotlin.test.assertTrue

internal class PasswordValidatorTest {

    private val validator = PasswordValidator()

    @Test
    fun validPassword() {
        assertTrue(validator.validate("1bc_eFghi"))
    }
}