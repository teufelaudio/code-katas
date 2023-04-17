class XmasTree {

    companion object {
        const val NEW_LINE = "\n"
    }

    fun tree(height: Int): String {
        if (height == 0 ) return  "|"
        val sb = StringBuilder()

        for (lineNumber in 1..height) {
            val spaces = levelSpaces(height, lineNumber)
            val xs = levelWidth(lineNumber)

            val line = spaces + xs + NEW_LINE
            sb.append(line)
        }

        sb.append(levelSpaces(height, lineNumber = height) + "|")
        return sb.toString()
    }

    private fun levelSpaces(height: Int, lineNumber: Int) = " ".repeat(lineNumber * height - 1)

    // TODO Integrate in main function, make private
    fun levelWidth(height: Int) = "x".repeat(height * 2 - 1)

}