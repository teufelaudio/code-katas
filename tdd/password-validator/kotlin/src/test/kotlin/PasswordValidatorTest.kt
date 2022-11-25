import org.junit.jupiter.api.Test

internal class PasswordValidatorTest {

    @Test
    fun testChangeMe() {
        val validator = PasswordValidator()

        assert(validator.changeMe())
    }
}