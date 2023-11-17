"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var kata_1 = require("../src/kata");
describe("The word wrapper", function () {
    it("doesn't wrap an wmpty string", function () {
        var result = (0, kata_1.format)("", 1);
        expect(result).toBe("");
    });
});
