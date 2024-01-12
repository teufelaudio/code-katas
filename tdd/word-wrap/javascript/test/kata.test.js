const {changeMe} = require('../src/kata');

describe("change me", function () {
    it("does something", function () {
        const result = changeMe("ok");

        expect(result).toBe(false);
    });
});
