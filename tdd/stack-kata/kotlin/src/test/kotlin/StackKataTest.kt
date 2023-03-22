import org.junit.jupiter.api.Test
import kotlin.test.assertFalse

internal class StackKataTest {

    private val stack = StackKata()

    @Test
    fun baseTest() {
        assertFalse(stack.changeMe())
    }

}
