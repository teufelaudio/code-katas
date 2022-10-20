let randomNumber = 5;

const evaluateGuess = (guessedNumber) => {
  if (guessedNumber > randomNumber) {
    return "number too high";
  }

  if (guessedNumber < randomNumber) {
    return "number too low";
  }
  
  return "number is correct";
};

module.exports = { evaluateGuess };
