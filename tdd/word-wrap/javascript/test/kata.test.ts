import { format } from "../src/kata";

describe("The word wrapper", function () {
  it("doesn't wrap an wmpty string", function () {
    const result = format("", 1);
    expect(result).toBe("");
  });
});
