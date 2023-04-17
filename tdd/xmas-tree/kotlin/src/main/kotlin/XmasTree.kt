class XmasTree {

    fun tree(height: Int) = StringBuilder().apply {
        repeat(height) { layer ->
            val levelWidth = 1 + 2 * layer
            val levelSpaces = height - layer - 1
            repeat(levelSpaces) { append(" ") }
            repeat(levelWidth)  { append("x") }
            append(System.lineSeparator())
        }

        append(" ".repeat((height - 1).coerceAtLeast(0)) + "|")
    }.toString()

}