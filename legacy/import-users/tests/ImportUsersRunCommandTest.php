<?php

declare(strict_types=1);

namespace tests;

use PHPUnit\Framework\TestCase;

final class ImportUsersRunCommandTest extends TestCase
{
    public function test(): void
    {
        $expected = '*********************************************************************************\n* ID		* COUNTRY	* NAME		* EMAIL				*\n*********************************************************************************\n* 200189617246	* Germany	* Lukas Schmidt	* lukas.shmidt@example.com	*\n* 200189016257	* Germany	* Maria Fischer	* maria.fischer@example.com	*\n* 230573109005	* Spain 	* Luis Sanchez	* luis.sanchez@example.com	*\n* 230854119034	* Italy 	* Elio Pausini	* elio.pausini@example.com	*\n* 270054311737	* India 	* Mitesh Kumari	* mitesh.kumari@example.com	*\n* 202160712259	* Germany	* Elena Mueller	* elena.muller@example.com	*\n* 270554319031	* India 	* Natasha Shah	* natasha.shah@example.com	*\n* 100000000001	* Australia	* Nevaeh Dunn	* nevaeh.dunn@example.com	*\n* 100000000002	* Norway	* Sara Abdallah	* sara.abdallah@example.com	*\n* 100000000003	* France	* Melvin Perrin	* melvin.perrin@example.com	*\n* 100000000004	* Australia	* Dawn Snyder	* dawn.snyder@example.com	*\n* 100000000005	* Netherlands	* Irina Kaptein	* irina.kaptein@example.com	*\n*********************************************************************************\n12 users in total!';
        exec('php ../php/run.php', $output);

        $outputString = implode('\n', $output);

        self::assertEquals($expected, $outputString);
    }
}
