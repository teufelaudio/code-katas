const {changeMe: wasGuessCorrect} = require('../src/kata');

describe("Guessing 5", function () {
    it("leads to winning the game", function () {
        const result = wasGuessCorrect(5);

        expect(result).toBe(true);
    });
});
