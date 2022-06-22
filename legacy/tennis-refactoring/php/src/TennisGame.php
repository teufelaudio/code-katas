<?php

namespace TennisGame;

interface TennisGame
{
    public function assignPointToPlayer(string $playerName): void;

    public function getScore(): string;
}