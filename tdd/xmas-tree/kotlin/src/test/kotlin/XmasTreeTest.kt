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
    fun `should output tree with height 3`() {
        assertThat(xmas.tree(3)).isEqualTo("""
              x
             xxx
            xxxxx
              |
        """.trimIndent())
    }

    @Test
    fun `should output tree with height 10`() {
        assertThat(xmas.tree(10)).isEqualTo(
            """
                 x
                xxx
               xxxxx
              xxxxxxx
             xxxxxxxxx
            xxxxxxxxxxx
           xxxxxxxxxxxxx
          xxxxxxxxxxxxxxx
         xxxxxxxxxxxxxxxxx
        xxxxxxxxxxxxxxxxxxx
                 |
        """.trimIndent())
    }

}