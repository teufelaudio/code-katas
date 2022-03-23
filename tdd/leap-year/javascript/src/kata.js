const isLeapYear = (year) => {
  if (year % 400 === 0) return true;
  if (year % 100 === 0) return false;
  return year % 4 === 0;
};

const getNext10LeapYearsStartingFrom = (baseYear) => {
  let result = [];
  while (result.length < 10) {
    baseYear++;
    if (isLeapYear(baseYear)) {
      result.push(baseYear);
    }
  }
  return result;
};

module.exports = { isLeapYear, getNext10LeapYearsStartingFrom };
