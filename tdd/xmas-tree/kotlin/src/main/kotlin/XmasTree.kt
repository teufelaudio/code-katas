class XmasTree {

    fun tree(height: Int) = when (height) {
        2 ->
            """
             x
            xxx
             |
             """.trimIndent()

        else ->
            """
             x
             |
             """.trimIndent()
    }

}