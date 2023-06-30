<?php

declare(strict_types=1);

const USER_URL = 'https://randomuser.me/api/?inc=gender,name,email,location&results=5&seed=a9b25cd955e2037h';

// fields: ID, gender, Name ,country, postcode, email, Birthdate
function readUserFromCsv(): array
{
    $usersFromCsv = array_map('str_getcsv', file(__DIR__ . '/../users.csv'));
    $csvProviders = [];
    array_walk($csvProviders, function (&$a) use ($usersFromCsv) {
        $a = array_combine($usersFromCsv[0], $a);
    });
    array_shift($usersFromCsv); # Remove header column

    return $usersFromCsv;
}

function readUserFromWebUrl(): array
{
    $webProvider = json_decode(file_get_contents(USER_URL))->results;

    $pr = [];
    array_walk($pr, function (&$a) use ($webProvider) {
        $a = array_combine($webProvider[0], $a);
    });

    $usersFromWeb = [];

    $i = 100000000000;
    foreach ($webProvider as $item) {
        $i++;
        if ($item instanceof stdClass) {
            $usersFromWeb[] = [
                $i, // id
                $item->gender,
                $item->name->first . ' ' . $item->name->last,
                $item->location->country,
                $item->location->postcode,
                $item->email,
                (new Datetime('now'))->format('Y') // birthday
            ];
        }
    }

    return $usersFromWeb;
}

function printUserList(array $users): void
{
    echo "*********************************************************************************" . PHP_EOL;
    echo "* ID\t\t* COUNTRY\t* NAME\t\t* EMAIL\t\t\t\t*" . PHP_EOL;
    echo "*********************************************************************************" . PHP_EOL;
    foreach ($users as $user) {
        echo sprintf("* %s\t* %s\t* %s\t* %s\t*", $user[0], $user[3], $user[2], $user[5]) . PHP_EOL;
    }
    echo "*********************************************************************************" . PHP_EOL;
    echo count($users) . ' users in total!' . PHP_EOL;
}

$usersFromCsv = readUserFromCsv();

$usersFromWeb = readUserFromWebUrl();
/**
 * @param $providers [ id -> number,
 *                   email -> string
 *                   first_name -> string
 *                   last_name -> string ] array
 */
$users = array_merge($usersFromCsv, $usersFromWeb); # merge arrays

printUserList($users);

