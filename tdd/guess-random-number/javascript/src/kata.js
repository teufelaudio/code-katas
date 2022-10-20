let randomNumber = 5;

const evaluateGuess = (guessedNumber) => {
  if (guessedNumber === randomNumber) {
    return "number is correct";
  }

  return "number too low";
};

module.exports = { evaluateGuess };
