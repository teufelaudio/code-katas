import com.google.common.truth.Truth.assertThat
import org.junit.jupiter.api.Test

internal class XmasTreeTest {

    private val xmas = XmasTree()

    @Test
    fun `tree should have trunk`() {
        assertThat(xmas.tree(0).last()).isEqualTo('|')
    }

    @Test
    fun `should output tree with height 1`() {
        assertThat(xmas.tree(1)).isEqualTo("""
            x
            |
        """.trimIndent())
    }

    @Test
    fun `should output tree with height 2`() {
        assertThat(xmas.tree(2)).isEqualTo("""
             x
            xxx
             |
        """.trimIndent())
    }

    @Test
    fun `should return the widest part of the tree`() {
        val width = xmas.widestPartWidth(3)
        assertThat(width).isEqualTo(5)
    }

}