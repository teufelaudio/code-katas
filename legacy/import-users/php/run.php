<?php

declare(strict_types=1);

const USER_URL = 'https://randomuser.me/api/?inc=gender,name,email,location&results=5&seed=a9b25cd955e2037h';

$usersFromCsv = readUserFromCsv();

// fields: ID, gender, Name ,country, postcode, email, Birthdate
function readUserFromCsv()
{
    $usersFromCsv = array_map('str_getcsv', file(__DIR__ . '/../users.csv'));
    $csvProviders = [];
    array_walk($csvProviders, function (&$a) use ($usersFromCsv) {
        $a = array_combine($usersFromCsv[0], $a);
    });

    return array_shift($usersFromCsv); # Remove header column
}

# Parse URL content
$url = USER_URL;
$web_provider = json_decode(file_get_contents($url))->results;
$pr = [];
array_walk($pr, function (&$a) use ($web_provider) {
    $a = array_combine($web_provider[0], $a);
});

$usersFromWeb = [];
$i = 100000000000;
foreach ($web_provider as $item) {
    $i++;
    if ($item instanceof stdClass) {
        $usersFromWeb[] = [
            $i, // id
            $item->gender,
            $item->name->first . ' ' . $item->name->last,
            $item->location->country,
            $item->location->postcode,
            $item->email,
            (new Datetime('now'))->format('Y') // birhtday
        ];
    }
}

/**
 * @param $providers [ id -> number,
 *                   email -> string
 *                   first_name -> string
 *                   last_name -> string ] array
 */
$users = array_merge($usersFromCsv, $usersFromWeb); # merge arrays

printUserList($users);

function printUserList(array $users) {
    echo "*********************************************************************************" . PHP_EOL;
    echo "* ID\t\t* COUNTRY\t* NAME\t\t* EMAIL\t\t\t\t*" . PHP_EOL;
    echo "*********************************************************************************" . PHP_EOL;
    foreach ($users as $user) {
        echo sprintf("* %s\t* %s\t* %s\t* %s\t*", $user[0], $user[3], $user[2], $user[5]) . PHP_EOL;
    }
    echo "*********************************************************************************" . PHP_EOL;
    echo count($users) . ' users in total!' . PHP_EOL;
}
