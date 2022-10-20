class Game {
  #randomNumber;

  constructor(predefinedNumber) {
    this.#randomNumber = predefinedNumber !== undefined ? predefinedNumber : 5;
  }

  evaluateGuess(guessedNumber) {
    if (guessedNumber > this.#randomNumber) {
      return "number too high";
    }

    if (guessedNumber < this.#randomNumber) {
      return "number too low";
    }

    return "number is correct";
  }
}

module.exports = { Game };
