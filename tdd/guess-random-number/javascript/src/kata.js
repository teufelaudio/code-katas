let randomNumber = 5;

const evaluateGuess = (guessedNumber) => {
  if (guessedNumber === randomNumber) {
    return "number is correct";
  }
  if (guessedNumber > randomNumber) {
    return "number too high";
  }

  return "number too low";
};

module.exports = { evaluateGuess };
