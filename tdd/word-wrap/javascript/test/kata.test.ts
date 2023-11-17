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
});
