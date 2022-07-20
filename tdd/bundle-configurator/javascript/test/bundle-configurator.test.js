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

    it("returns B1 if the cart contains P2 and P1", function () {
        const result = selectProducts("P2", "P1");

        expect(result).toStrictEqual(["B1"]);
    });
});
