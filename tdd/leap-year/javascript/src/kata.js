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

const get10thNextLeapYear = (baseYear) => {
  return getNext10LeapYearsStartingFrom(baseYear)[9];
};

module.exports = { isLeapYear, getNext10LeapYearsStartingFrom, get10thNextLeapYear };
