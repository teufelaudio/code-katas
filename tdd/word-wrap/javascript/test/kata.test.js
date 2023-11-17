const {wordWrapper} = require('../src/kata');

describe("When input string is empty", function () {
    it("output string should be empty", function () {
        const result = wordWrapper("");

        expect(result).toBe("");
    });
});

describe("When we enter the string 'a cat'", function () {
    it("The output should be wrapped correctly", function () {
        const result = wordWrapper("a cat");

        expect(result).toBe("a\ncat");
    });
});

describe("When we enter the string 'The cat sat on the mat.'", function () {
    it("The output should be wrapped correctly", function () {
        const result = wordWrapper("The cat sat on the mat.", 8);

        expect(result).toBe("The cat\nsat on\nthe mat.");
    });
});

