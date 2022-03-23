const { isLeapYear, getNext10LeapYearsStartingFrom } = require("../src/kata");

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

  it("is a leap year if it's divisible by 4 but not by 100", function () {
    expect(isLeapYear(4)).toBe(true);
    expect(isLeapYear(8)).toBe(true);
    expect(isLeapYear(2008)).toBe(true);
    expect(isLeapYear(2012)).toBe(true);
    expect(isLeapYear(2016)).toBe(true);
  });

  it("is not a leap year if it's not divisble by 4", function () {
    expect(isLeapYear(2017)).toBe(false);
    expect(isLeapYear(2018)).toBe(false);
    expect(isLeapYear(2019)).toBe(false);
  });

  it("gets next 10 leap years", function () {
    expect(getNext10LeapYearsStartingFrom(2021)).toEqual([
      2024, 2028, 2032, 2036, 2040, 2044, 2048, 2052, 2056, 2060,
    ]);
  });
});
