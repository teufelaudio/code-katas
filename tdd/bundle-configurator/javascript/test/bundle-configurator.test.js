const {selectProducts} = require('../src/bundle-configurator');

describe("Bundle configurator", function () {
    it("should return the product if there's only one", function () {
        const result = selectProducts("P1");

        expect(result).toBe("P1");
    });
});
