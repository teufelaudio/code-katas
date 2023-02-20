import Foundation

public struct Yatzy {
    private var dice: [Int]

    public init(d1: Int, d2: Int, d3: Int, d4: Int, _5: Int) {
        dice = [Int](repeating:0, count:5)
        dice[0] = d1
        dice[1] = d2
        dice[2] = d3
        dice[3] = d4
        dice[4] = _5
    }

    public static func chance(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        d1 + d2 + d3 + d4 + d5
    }
    
    public static func yatzy(dice: Int...) -> Int {
        var counts = [Int](repeating: 0, count:6)
        for die in dice {
            counts[die-1] += 1
            var i = 0;
            while i != 6 {
                if counts[i] == 5 {
                    return 50
                }
                i += 1
            }
        }
        return 0
    }
    
    public static func sum(all value: Int, d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        var sum = 0
        if d1 == value {
            sum += value
        }
        if d2 == value {
            sum += value
        }
        if d3 == value {
            sum += value
        }
        if d4 == value {
            sum += value
        }
        if d5 == value {
            sum += value
        }
        return sum
    }
    
    public static func ones(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        sum(all: 1, d1: d1, d2: d2, d3: d3, d4: d4, d5: d5)
    }

    public static func twos(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        sum(all: 2, d1: d1, d2: d2, d3: d3, d4: d4, d5: d5)
    }

    public static func threes(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        sum(all: 3, d1: d1, d2: d2, d3: d3, d4: d4, d5: d5)
    }

    public static func fours(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        sum(all: 4, d1: d1, d2: d2, d3: d3, d4: d4, d5: d5)
    }

    public static func fives(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        sum(all: 5, d1: d1, d2: d2, d3: d3, d4: d4, d5: d5)
    }

    public static func sixes(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        sum(all: 6, d1: d1, d2: d2, d3: d3, d4: d4, d5: d5)
    }

    public static func scorePair(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        var numberSet: Set<Int> = []
        var highestPair: Int = 0
        [d1, d2, d3, d4, d5].forEach { value in
            guard numberSet.contains(value) else { numberSet.insert(value); return }
            guard highestPair < value else { return }
            highestPair = value
        }
        return highestPair * 2
    }

    public static func twoPairs(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        var counts = [Int](repeating: 0, count: 6)
        counts[d1-1] += 1;
        counts[d2-1] += 1;
        counts[d3-1] += 1;
        counts[d4-1] += 1;
        counts[d5-1] += 1;
        var n = 0
        var score = 0
        for i in 0..<6 {
            if counts[6-i-1] >= 2 {
                n += 1
                score += (6-i)
            }
        }
        if n == 2 {
            return score * 2
        } else {
            return 0
        }
    }

    public static func fourOfAKind(_1: Int, _2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        var tallies: [Int]
        tallies = [Int](repeating: 0, count: 6)
        tallies[_1-1] += 1;
        tallies[_2-1] += 1;
        tallies[d3-1] += 1;
        tallies[d4-1] += 1;
        tallies[d5-1] += 1;
        var i = 0
        while i < 6 {
            if tallies[i] >= 4 {
                return (i + 1) * 4
            }
            i += 1
        }
        return 0
    }

    
    public static func threeOfAKind(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        var t: [Int]
        t = [Int](repeating: 0, count: 6)
        t[d1-1] += 1;
        t[d2-1] += 1;
        t[d3-1] += 1;
        t[d4-1] += 1;
        t[d5-1] += 1;
        var i = 0
        while i < 6 {
            if t[i] >= 3 {
                return (i+1) * 3
            }
            i += 1
        }
        return 0
    }

    public static func smallStraight(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        let dices = [d1, d2, d3, d4, d5].sorted()
        if Set([1,2,3,4]).isSubset(of: dices) ||
           Set([2,3,4,5]).isSubset(of: dices) ||
            Set([3,4,5,6]).isSubset(of: dices) {
            return 15
        }
        return 0
    }
    
    public static func largeStraight(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        let dices = [d1, d2, d3, d4, d5].sorted()
        if Set([1,2,3,4,5]).isSubset(of: dices) ||
           Set([2,3,4,5,6]).isSubset(of: dices) {
            return 20
        }
        return 0        
    }

    public static func fullHouse(d1: Int, d2: Int, d3: Int, d4: Int, d5: Int) -> Int {
        var tallies: [Int]
        var _2 = false
        var i: Int
        var _2_at = 0
        var _3 = false
        var _3_at = 0
        
        tallies = [Int](repeating: 0, count: 6)
        tallies[d1-1] += 1;
        tallies[d2-1] += 1;
        tallies[d3-1] += 1;
        tallies[d4-1] += 1;
        tallies[d5-1] += 1;
        
        i = 0
        while i != 6 {
            if tallies[i] == 2 {
                _2 = true
                _2_at = i+1
            }
            i += 1
        }
        
        i = 0
        while i != 6 {
            if tallies[i] == 3 {
                _3 = true
                _3_at = i + 1
            }
            i += 1
        }
        if _2 && _3 {
            return _2_at * 2 + _3_at * 3
        } else {
            return 0
        }
    }
    
}
