const {Game} = require('../src/kata');

describe("_", function () {
    it("The player wins when the input number matches the random number", function () {
        expect(new Game(0).evaluateGuess(0)).toBe("number is correct");
        expect(new Game(1).evaluateGuess(1)).toBe("number is correct");
        expect(new Game(5).evaluateGuess(5)).toBe("number is correct");
    });
});

describe("Guessing lower than 5", function () {
    it("outputs number is too low", function () {
        let predefinedNumber = 5;
        const result = new Game(predefinedNumber).evaluateGuess(2);

        expect(result).toBe("number too low");
    });
});

describe("Guessing higher than 5", function () {
    it("outputs number is too high", function () {
        let predefinedNumber = 5;
        const result = new Game(predefinedNumber).evaluateGuess(6);

        expect(result).toBe("number too high");
    });
});
