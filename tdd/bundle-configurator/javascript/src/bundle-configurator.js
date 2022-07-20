const bundles = {
  B1: ["P1", "P2"],
  B2: ["P1", "P4"],
  B3: ["P3", "P4"],
  B4: ["P1", "P2", "P3", "P4"],
  B5: ["P1", "P5"],
};

const selectProducts = (...productNames) => {
  const sortedProductNames = productNames.sort();
  const possibleBundles = getPossibleBundleNames(sortedProductNames);

  if (possibleBundles.length === 0) return productNames;

  return replaceProductsWithBundleName(productNames, possibleBundles[0]);
};

const getPossibleBundleNames = (productNames) => {
  const possibleBundles = [];

  for (let bundleKey in bundles) {
    if (listContainsBundleProducts(productNames, bundles[bundleKey])) {
      possibleBundles.push(bundleKey);
    }
  }

  return possibleBundles;
};

const listContainsBundleProducts = (list, bundle) => {
  for (let product of bundle) {
    if (!list.includes(product)) {
      return false;
    }
  }
  return true;
};

const replaceProductsWithBundleName = (productNames, bundleName) => {
    const result = [bundleName];

    for (let productName of productNames) {
        if (!bundles[bundleName].includes(productName)) {
            result.push(productName);
        }
    }

    return result;
}

module.exports = { selectProducts };
