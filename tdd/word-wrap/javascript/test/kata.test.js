const {wordWrapper} = require('../src/kata');

describe("When input string is empty", function () {
    it("output string should be empty", function () {
        const result = wordWrapper("");

        expect(result).toBe("");
    });
});
