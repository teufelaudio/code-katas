import com.google.common.truth.Truth.assertThat
import org.junit.jupiter.api.Test

internal class XmasTreeTest {

    private val xmas = XmasTree()

    @Test
    fun `tree should have trunk`() {
        val output = xmas.tree(0)
        assertThat(output.last()).isEqualTo('|')
    }

    @Test
    fun `should output tree with height 1`() {
        val output = xmas.tree(1)
        assertThat(output).isEqualTo("""
            x
            |
        """.trimIndent())
    }

    @Test
    fun `should output tree with height 2`() {
        val output = xmas.tree(2)
        assertThat(output).isEqualTo("""
             x
            xxx
             |
        """.trimIndent())
    }
}