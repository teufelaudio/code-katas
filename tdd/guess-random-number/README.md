# Guess the random number

## What do we want to build?

We want to create a small game. The game consists of a player trying to guess a random number. The player will have
three attempts to guess the number. If the number is correctly guessed, then the player wins, if not, the player loses.

If the player fails to guess the number, the game must notify the user if the number it's higher or lower.

## What do we try to work out with this kata?

This kata is meant to work on test doubles. But it can also be solved without them. Also, it's an excellent kata to work
on Primitive obsession and baby steps.

## Business rules

- The user starts playing, the game generates a random number that must not change until the game it's over.
- If the user guesses the number the player wins.
- If the user does not guess the number the system would have to notify the user if the number it's higher or lower.
- If the user does not guess the number on three intents it will lose.

> Original kata from https://www.codurance.com/katalyst/random-number-kata