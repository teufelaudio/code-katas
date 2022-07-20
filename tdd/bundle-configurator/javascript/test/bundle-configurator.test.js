const {selectProducts} = require('../src/bundle-configurator');

describe("Bundle configurator", function () {
    it("returns the product if there's only one", function () {
        const result = selectProducts("P1");

        expect(result).toStrictEqual(["P1"]);
    });

    it("returns B1 if the cart contains P1 and P2", function () {
        const result = selectProducts("P1", "P2");

        expect(result).toStrictEqual(["B1"]);
    });

    it("detects B1 when selecting its products", function () {
        const result = selectProducts("P2", "P1");

        expect(result).toStrictEqual(["B1"]);
    });

    it("returns B1,P3 if the cart contains P1,P2,P3", function () {
        const result = selectProducts("P1", "P2", "P3");

        expect(result).toStrictEqual(["B1", "P3"]);
    });

    it("returns B1,P3 if the cart contains P3,P1,P2", function () {
        const result = selectProducts("P3", "P1", "P2");

        expect(result).toStrictEqual(["B1", "P3"]);
    });

    it("returns P1,B3 if the cart contains P1,P3,P4", function () {
        const result = selectProducts("P1", "P3", "P4");

        expect(result).toStrictEqual(["B2", "P3"]);
    });


});
