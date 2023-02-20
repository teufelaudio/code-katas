class Yatzy(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) {

    private var dice = IntArray(5)

    init {
        dice[0] = d1
        dice[1] = d2
        dice[2] = d3
        dice[3] = d4
        dice[4] = d5
    }

    fun fours() = dice.evaluate(4)

    fun fives() = dice.evaluate(5)

    fun sixes() = dice.evaluate(6)

    companion object {

        private const val FACES_OF_A_DIE = 6
        private const val YATZY_JACKPOT = 50

        private fun IntArray.evaluate(diceNumber: Int): Int {
            var sum = 0
            for (element in this) {
                if (element == diceNumber) {
                    sum += diceNumber
                }
            }
            return sum
        }

        fun chance(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) = d1 + d2 + d3 + d4 + d5

        fun yatzy(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) =
            evaluateMultipleFaceCounts(5, d1, d2, d3, d4, d5)

        fun ones(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) = intArrayOf(d1, d2, d3, d4, d5).evaluate(1)

        fun twos(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) = intArrayOf(d1, d2, d3, d4, d5).evaluate(2)

        fun threes(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) = intArrayOf(d1, d2, d3, d4, d5).evaluate(3)

        // 2, 2, 4 , 5, 1

        // face counts: 1, 2, 0, 1, 1

        // 2, 1, 4 , 5, 3 small straight

        // face counts: 1, 1, 1, 1, 1, 0

        // 2, 6, 4 , 5, 3 large straight

        // face counts: 0, 1, 1, 1, 1, 1
        private fun accumulateCounts(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int): IntArray {
            val counts = IntArray(FACES_OF_A_DIE)
            counts[d1 - 1]++
            counts[d2 - 1]++
            counts[d3 - 1]++
            counts[d4 - 1]++
            counts[d5 - 1]++
            return counts
        }

        fun score_pair(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) =
            evaluateMultipleFaceCounts(2, d1, d2, d3, d4, d5)

        fun two_pair(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int): Int {
            val counts = accumulateCounts(d1, d2, d3, d4, d5)
            var n = 0
            var score = 0
            var i = 0
            while (i < 6) {
                if (counts[6 - i - 1] >= 2) {
                    n++
                    score += 6 - i
                }
                i += 1
            }
            return if (n == 2)
                score * 2
            else
                0
        }

        fun three_of_a_kind(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) =
            evaluateMultipleFaceCounts(3, d1, d2, d3, d4, d5)

        fun four_of_a_kind(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) =
            evaluateMultipleFaceCounts(4, d1, d2, d3, d4, d5)

        private fun evaluateMultipleFaceCounts(occurrences: Int, d1: Int, d2: Int, d3: Int, d4: Int, d5: Int): Int {
            val faceCounts = accumulateCounts(d1, d2, d3, d4, d5)
            for (i in 5 downTo 0)
                if (faceCounts[i] >= occurrences)
                    return if (occurrences == 5) YATZY_JACKPOT
                    else (i + 1) * occurrences
            return 0
        }

        private fun evaluateStraight(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int): Int {
            val faceCounts = accumulateCounts(d1, d2, d3, d4, d5)
            val isStraight = faceCounts.filter { it == 1 }.size == 5

            return if (isStraight) {
                chance(d1, d2, d3, d4, d5)
            } else 0
        }

        fun smallStraight(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) = evaluateStraight(d1, d2, d3, d4, d5)

        fun largeStraight(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) = evaluateStraight(d1, d2, d3, d4, d5)

        fun fullHouse(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int): Int {
            val tallies: IntArray
            var _2 = false
            var i: Int
            var _2_at = 0
            var _3 = false
            var _3_at = 0

            tallies = IntArray(FACES_OF_A_DIE)
            tallies[d1 - 1] += 1
            tallies[d2 - 1] += 1
            tallies[d3 - 1] += 1
            tallies[d4 - 1] += 1
            tallies[d5 - 1] += 1

            i = 0
            while (i != 6) {
                if (tallies[i] == 2) {
                    _2 = true
                    _2_at = i + 1
                }
                i += 1
            }

            i = 0
            while (i != 6) {
                if (tallies[i] == 3) {
                    _3 = true
                    _3_at = i + 1
                }
                i += 1
            }

            return if (_2 && _3)
                _2_at * 2 + _3_at * 3
            else
                0
        }
    }
}


