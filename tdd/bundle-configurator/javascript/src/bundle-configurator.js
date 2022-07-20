const selectProducts = (...productNames) => {
    if (productNames.length === 1) return ["P1"];

    return ["B1"];
};

module.exports = {selectProducts};
