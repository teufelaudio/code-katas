const {evaluateGuess} = require('../src/kata');

describe("Guessing 5", function () {
    it("leads to winning the game", function () {
        const result = evaluateGuess(5);

        expect(result).toBe("number is correct");
    });
});

describe("Guessing lower than 5", function () {
    it("outputs number is too low", function () {
        const result = evaluateGuess(2);

        expect(result).toBe("number too low");
    });
});

describe("Guessing higher than 5", function () {
    it("outputs number is too high", function () {
        const result = evaluateGuess(6);

        expect(result).toBe("number too high");
    });
});
