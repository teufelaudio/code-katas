const bundles = {
    B1: ["P1", "P2"],
    B2: ["P1", "P4"],
    B3: ["P3", "P4"],
    B4: ["P1", "P2", "P3", "P4"],
    B5: ["P1", "P5"],
};

const selectProducts = (...productNames) => {
    let result = [];

    const possibleBundles = Object.values(bundles)
        .filter((b) => listContainsBundleProducts(productNames, b))

    console.log(possibleBundles);

    return result;
};

const listContainsBundleProducts = (list, bundle) => {
    for (let product of bundle) {
        if (!list.includes(product)) {
            return false;
        }
    }
    return true;
};

module.exports = {selectProducts};
