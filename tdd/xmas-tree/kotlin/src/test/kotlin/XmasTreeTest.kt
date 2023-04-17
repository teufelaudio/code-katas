import com.google.common.truth.Truth.assertThat
import org.junit.jupiter.api.Test

internal class XmasTreeTest {

    private val xmas = XmasTree()

    @Test
    fun `tree should have trunk`() {
        val output = xmas.tree()
        assertThat(output.last()).isEqualTo('|')
    }

    @Test
    fun `should output tree with height 1`() {
        val output = xmas.tree()
        assertThat(output).isEqualTo("""
            x
            |
        """.trimIndent())
    }
}