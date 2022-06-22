<?php

namespace TennisGame;

class TennisGame2 implements TennisGame
{
    private int $player1Points = 0;
    private int $player2Points = 0;

    private string $player1Result = "";
    private string $player2Result = "";

    private string $player1Name;
    private string $player2Name;

    public function __construct(string $player1Name, string $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function getScore(): string
    {
        $score = "";
        if ($this->player1Points === $this->player2Points && $this->player1Points < 4) {
            if ($this->player1Points === 0) {
                $score = "Love";
            }
            if ($this->player1Points === 1) {
                $score = "Fifteen";
            }
            if ($this->player1Points === 2) {
                $score = "Thirty";
            }
            $score .= "-All";
        }

        if ($this->player1Points === $this->player2Points && $this->player1Points >= 3) {
            $score = "Deuce";
        }

        if ($this->player1Points > 0 && $this->player2Points === 0) {
            if ($this->player1Points === 1) {
                $this->player1Result = "Fifteen";
            }
            if ($this->player1Points === 2) {
                $this->player1Result = "Thirty";
            }
            if ($this->player1Points === 3) {
                $this->player1Result = "Forty";
            }

            $this->player2Result = "Love";
            $score = "{$this->player1Result}-{$this->player2Result}";
        }

        if ($this->player2Points > 0 && $this->player1Points === 0) {
            if ($this->player2Points === 1) {
                $this->player2Result = "Fifteen";
            }
            if ($this->player2Points === 2) {
                $this->player2Result = "Thirty";
            }
            if ($this->player2Points === 3) {
                $this->player2Result = "Forty";
            }
            $this->player1Result = "Love";
            $score = "{$this->player1Result}-{$this->player2Result}";
        }

        if ($this->player1Points > $this->player2Points && $this->player1Points < 4) {
            if ($this->player1Points === 2) {
                $this->player1Result = "Thirty";
            }
            if ($this->player1Points === 3) {
                $this->player1Result = "Forty";
            }
            if ($this->player2Points === 1) {
                $this->player2Result = "Fifteen";
            }
            if ($this->player2Points === 2) {
                $this->player2Result = "Thirty";
            }
            $score = "{$this->player1Result}-{$this->player2Result}";
        }

        if ($this->player2Points > $this->player1Points && $this->player2Points < 4) {
            if ($this->player2Points === 2) {
                $this->player2Result = "Thirty";
            }
            if ($this->player2Points === 3) {
                $this->player2Result = "Forty";
            }
            if ($this->player1Points === 1) {
                $this->player1Result = "Fifteen";
            }
            if ($this->player1Points === 2) {
                $this->player1Result = "Thirty";
            }
            $score = "{$this->player1Result}-{$this->player2Result}";
        }

        if ($this->player1Points > $this->player2Points && $this->player2Points >= 3) {
            $score = "Advantage " . $this->player1Name;
        }

        if ($this->player2Points > $this->player1Points && $this->player1Points >= 3) {
            $score = "Advantage " . $this->player2Name;
        }

        if ($this->player1Points >= 4 && $this->player2Points >= 0 && ($this->player1Points - $this->player2Points) >= 2) {
            $score = "Win for " . $this->player1Name;
        }

        if ($this->player2Points >= 4 && $this->player1Points >= 0 && ($this->player2Points - $this->player1Points) >= 2) {
            $score = "Win for " . $this->player2Name;
        }

        return $score;
    }

    public function wonPoint(string $playerName): void
    {
        if ($playerName === "player1") {
            $this->player1Points++;
        } else {
            $this->player2Points++;
        }
    }
}
