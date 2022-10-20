let randomNumber = 5;

const wasGuessCorrect = (guessedNumber) => {
  return guessedNumber === randomNumber;
};

module.exports = { changeMe: wasGuessCorrect };
