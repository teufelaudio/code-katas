import com.google.common.truth.Truth.assertThat
import org.junit.jupiter.api.Test

internal class XmasTreeTest {

    @Test
    fun treeShouldHaveTrunk() {
        val xmas = XmasTree()

        val output : String = xmas.tree()

        assertThat(output.last()).isEqualTo('|')
    }

}