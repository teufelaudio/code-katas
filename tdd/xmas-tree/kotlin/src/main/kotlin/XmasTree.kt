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

    // TODO Integrate in main function, make private
    fun widestPartWidth(height: Int) = height * 2 -1

}