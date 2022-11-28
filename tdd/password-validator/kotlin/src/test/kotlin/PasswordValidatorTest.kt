import org.junit.jupiter.api.Test
import kotlin.test.assertFalse

internal class PasswordValidatorTest {

    private val validator = PasswordValidator()

    @Test
    fun baseTest() {
        assertFalse(validator.validate("test"))
    }

}