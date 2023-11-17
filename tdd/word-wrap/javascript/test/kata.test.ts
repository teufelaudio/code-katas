import { format } from "../src/kata";

describe("The word wrapper", function () {
  it("doesn't wrap an empty string", function () {
    const result = format("", 1);
    expect(result).toBe("");
  });

  it("doesn't wrap a string which is shorter than the column width", function () {
    const result = format("Hello", 10);
    expect(result).toBe("Hello");
  });

  it("doesn't wrap two words which are shorter than the column width", function () {
    const result = format("Hello world", 20);
    expect(result).toBe("Hello world");
  });

  it("wraps two words if they're longer than the column width", function () {
    const result = format("Hello world", 7);
    expect(result).toBe(`\
Hello
world`);
  });

  it("wraps three words of the column width into three separate lines", function () {
    const result = format("Hello super world", 5);
    expect(result).toBe(`\
Hello
super
world`);
  });

  it("wraps multiple words shorter than the column width correctly into separate lines", function () {
    const result = format("The cat sat on the mat.", 8);
    expect(result).toBe(`\
The cat
sat on
the mat.`);
  });
});
