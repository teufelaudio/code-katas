const { isLeapYear } = require("../src/kata");

describe("Leap Year Kata", function () {
  it("is a leap year if it's divisible by 400", function () {
    expect(isLeapYear(0)).toBe(true);
    expect(isLeapYear(1)).toBe(false);
    expect(isLeapYear(400)).toBe(true);
    expect(isLeapYear(2000)).toBe(true);
  });

  it("is not a leap year if it is divisible by 100 but not by 400", function () {
    expect(isLeapYear(1600)).toBe(true);
    expect(isLeapYear(1700)).toBe(false);
    expect(isLeapYear(1800)).toBe(false);
    expect(isLeapYear(1900)).toBe(false);
    expect(isLeapYear(2000)).toBe(true);
    expect(isLeapYear(2100)).toBe(false);
  });

  it("all years divisible by 4 but not by 100 are leap years", function () {
    expect(isLeapYear(4)).toBe(true);
    expect(isLeapYear(8)).toBe(true);
    expect(isLeapYear(2008)).toBe(true);
    expect(isLeapYear(2012)).toBe(true);
    expect(isLeapYear(2016)).toBe(true);
  });
});
