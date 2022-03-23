const {isLeapYear} = require('../src/kata');

describe("Leap Year Kata", function () {
    it("is a leap year if it's divisible by 400", function () {
        expect(isLeapYear(0)).toBe(true);
        expect(isLeapYear(1)).toBe(false);
        expect(isLeapYear(400)).toBe(true);
        expect(isLeapYear(2000)).toBe(true);
    });
});
