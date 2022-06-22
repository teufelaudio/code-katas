<?php

declare(strict_types = 1);

namespace TennisGame;

use RuntimeException;

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

    private string $player1Name;
    private string $player2Name;

    public function __construct(string $player1Name, string $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function getScore(): string
    {
        if ($this->player1Points === $this->player2Points) {
            return $this->getDrawScore();
        }

        if ($this->isThereAWinner()) {
            return "Win for " . $this->getLeaderName();
        }

        if ($this->couldNextPointWin()) {
            return "Advantage " . $this->getLeaderName();
        }

        return "{$this->getNumberName($this->player1Points)}-{$this->getNumberName($this->player2Points)}";
    }

    public function assignPointToPlayer(string $playerName): void
    {
        if ($playerName !== $this->player1Name
            && $playerName !== $this->player2Name
        ) {
            throw new RuntimeException('not valid player');
        }
        if ($playerName === $this->player1Name) {
            $this->player1Points++;
        } else {
            $this->player2Points++;
        }
    }

    private function getNumberName(int $points): string
    {
        return self::NUMBER_NAME_MAP[$points];
    }

    private function getDrawScore(): string
    {
        if ($this->player1Points >= 3) {
            return "Deuce";
        }

        return $this->getNumberName($this->player1Points) . "-All";
    }

    private function isThereAWinner(): bool
    {
        return max($this->player1Points, $this->player2Points) >= 4
            && abs($this->player1Points - $this->player2Points) >= 2;
    }

    private function couldNextPointWin(): bool
    {
        return min($this->player1Points, $this->player2Points) >= 3;
    }

    private function getLeaderName(): string
    {
        return $this->player1Points > $this->player2Points
            ? $this->player1Name
            : $this->player2Name;
    }
}
