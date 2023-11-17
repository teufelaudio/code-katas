"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var kata_1 = require("../src/kata");
describe("The word wrapper", function () {
    it("doesn't wrap an empty string", function () {
        var result = (0, kata_1.format)("", 1);
        expect(result).toBe("");
    });
    it("doesn't wrap a string which is shorter than the column width", function () {
        var result = (0, kata_1.format)("Hello", 10);
        expect(result).toBe("Hello");
    });
});
