const {Game} = require('../src/kata');

describe("Guessing 5", function () {
    it("leads to winning the game", function () {
        let predefinedNumber = 5;
        const result = new Game(predefinedNumber).evaluateGuess(5);

        expect(result).toBe("number is correct");
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
