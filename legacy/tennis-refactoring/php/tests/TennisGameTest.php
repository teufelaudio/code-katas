<?php

namespace KataTests;

use Kata\TennisGame;
use PHPUnit\Framework\TestCase;

class TennisGameTest extends TestCase
{

    /**
     * @test
     *
     * @param int $score1
     * @param int $score2
     * @param string $expectedResult
     * @dataProvider data
     */
    public function scores($score1, $score2, $expectedResult)
    {
        $game = new TennisGame('player1', 'player2');

        $highestScore = max($score1, $score2);
        for ($i = 0; $i < $highestScore; $i++) {
            if ($i < $score1) {
                $game->wonPoint("player1");
            }
            if ($i < $score2) {
                $game->wonPoint("player2");
            }
        }
        $this->assertEquals($expectedResult, $game->getScore());
    }

    /**
     * @return mixed[][]
     */
    public function data()
    {
        return [
            '0-0' => [0, 0, "Love-All"],
            '1-1' => [1, 1, "Fifteen-All"],
            '2-2' => [2, 2, "Thirty-All"],
            '3-3' => [3, 3, "Deuce"],
            '4-4' => [4, 4, "Deuce"],
            '1-0' => [1, 0, "Fifteen-Love"],
            '0-1' => [0, 1, "Love-Fifteen"],
            '2-0' => [2, 0, "Thirty-Love"],
            '0-2' => [0, 2, "Love-Thirty"],
            '3-0' => [3, 0, "Forty-Love"],
            '0-3' => [0, 3, "Love-Forty"],
            '4-0' => [4, 0, "Win for player1"],
            '0-4' => [0, 4, "Win for player2"],
            '2-1' => [2, 1, "Thirty-Fifteen"],
            '1-2' => [1, 2, "Fifteen-Thirty"],
            '3-1' => [3, 1, "Forty-Fifteen"],
            '1-3' => [1, 3, "Fifteen-Forty"],
            '4-1' => [4, 1, "Win for player1"],
            '1-4' => [1, 4, "Win for player2"],
            '3-2' => [3, 2, "Forty-Thirty"],
            '2-3' => [2, 3, "Thirty-Forty"],
            '4-2' => [4, 2, "Win for player1"],
            '2-4' => [2, 4, "Win for player2"],
            '4-3' => [4, 3, "Advantage player1"],
            '3-4' => [3, 4, "Advantage player2"],
            '5-4' => [5, 4, "Advantage player1"],
            '4-5' => [4, 5, "Advantage player2"],
            '15-14' => [15, 14, "Advantage player1"],
            '14-15' => [14, 15, "Advantage player2"],
            '6-4' => [6, 4, "Win for player1"],
            '4-6' => [4, 6, "Win for player2"],
            '16-14' => [16, 14, "Win for player1"],
            '14-16' => [14, 16, "Win for player2"],
        ];
    }
}
