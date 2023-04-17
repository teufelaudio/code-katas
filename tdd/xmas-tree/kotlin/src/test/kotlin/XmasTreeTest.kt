import org.junit.jupiter.api.Test
import kotlin.test.assertEquals
import kotlin.test.assertFalse

internal class XmasTreeTest {

    @Test
    fun treeShouldHaveTrunk() {
        val xmas = XmasTree()

        val output : String = xmas.tree()

        assertEquals('|', output.last())
    }

}