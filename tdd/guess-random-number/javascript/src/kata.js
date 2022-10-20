class Game {
  #randomNumber;

  constructor() {
    this.#randomNumber = 5;
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
