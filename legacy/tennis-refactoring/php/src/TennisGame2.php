<?php

namespace TennisGame;

class TennisGame2 implements TennisGame
{
    private const NUMBER_NAME_MAP = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty',
    ];

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

    private function getNumberName(int $points): string
    {
        return self::NUMBER_NAME_MAP[$points];
    }

    public function getScore(): string
    {
        $score = "";
        if ($this->player1Points === $this->player2Points && $this->player1Points < 4) {
            if ($this->player1Points === 0) {
                $score = $this->getNumberName(0);
            }
            if ($this->player1Points === 1) {
                $score = $this->getNumberName(1);
            }
            if ($this->player1Points === 2) {
                $score = $this->getNumberName(2);
            }
            $score .= "-All";
        }

        if ($this->player1Points > 0 && $this->player2Points === 0) {
            if ($this->player1Points === 1) {
                $this->player1Result = $this->getNumberName(1);
            }
            if ($this->player1Points === 2) {
                $this->player1Result = $this->getNumberName(2);
            }
            if ($this->player1Points === 3) {
                $this->player1Result = $this->getNumberName(3);
            }

            $this->player2Result = $this->getNumberName(0);
            $score = "{$this->player1Result}-{$this->player2Result}";
        }

        if ($this->player2Points > 0 && $this->player1Points === 0) {
            if ($this->player2Points === 1) {
                $this->player2Result = $this->getNumberName(1);
            }
            if ($this->player2Points === 2) {
                $this->player2Result = $this->getNumberName(2);
            }
            if ($this->player2Points === 3) {
                $this->player2Result = $this->getNumberName(3);
            }
            $this->player1Result = $this->getNumberName(0);
            $score = "{$this->player1Result}-{$this->player2Result}";
        }

        if ($this->player1Points >= 4 && $this->player2Points >= 0 && ($this->player1Points - $this->player2Points) >= 2) {
            return "Win for " . $this->player1Name;
        }

        if ($this->player2Points >= 4 && $this->player1Points >= 0 && ($this->player2Points - $this->player1Points) >= 2) {
            return "Win for " . $this->player2Name;
        }

        if ($this->player1Points > $this->player2Points && $this->player2Points >= 3) {
            return "Advantage " . $this->player1Name;
        }

        if ($this->player2Points > $this->player1Points && $this->player1Points >= 3) {
            return "Advantage " . $this->player2Name;
        }

        if ($this->player1Points === $this->player2Points && $this->player1Points >= 3) {
            return "Deuce";
        }

        if ($this->player2Points > $this->player1Points && $this->player2Points < 4) {
            if ($this->player2Points === 2) {
                $this->player2Result = $this->getNumberName(2);
            }
            if ($this->player2Points === 3) {
                $this->player2Result = $this->getNumberName(3);
            }
            if ($this->player1Points === 1) {
                $this->player1Result = $this->getNumberName(1);
            }
            if ($this->player1Points === 2) {
                $this->player1Result = $this->getNumberName(2);
            }
            return "{$this->player1Result}-{$this->player2Result}";
        }

        if ($this->player1Points > $this->player2Points && $this->player1Points < 4) {
            if ($this->player1Points === 2) {
                $this->player1Result = $this->getNumberName(2);
            }
            if ($this->player1Points === 3) {
                $this->player1Result = $this->getNumberName(3);
            }
            if ($this->player2Points === 1) {
                $this->player2Result = $this->getNumberName(1);
            }
            if ($this->player2Points === 2) {
                $this->player2Result = $this->getNumberName(2);
            }
            return "{$this->player1Result}-{$this->player2Result}";
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
