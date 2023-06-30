<?php

declare(strict_types=1);

const USER_URL = 'https://randomuser.me/api/?inc=gender,name,email,location&results=5&seed=a9b25cd955e2037h';

class User
{
    private int $id;
    private string $gender = '';
    private string $name = '';
    private string $country = '';
    private string $postcode = '';
    private string $email = '';
    private DateTimeImmutable $birthdate;

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $gender
     * @return User
     */
    public function setGender(string $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $country
     * @return User
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @param string $postcode
     * @return User
     */
    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;
        return $this;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param DateTimeImmutable $birthdate
     * @return User
     */
    public function setBirthdate(DateTimeImmutable $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public static function fromArray(array $userArray): self
    {
        return (new self)
            ->setId((int)$userArray['id'])
            ->setGender($userArray['gender'])
            ->setName($userArray['name'])
            ->setCountry($userArray['country'])
            ->setPostcode($userArray['postcode'])
            ->setEmail($userArray['email'])
            ->setBirthdate(new DateTimeImmutable($userArray['birthdate']));
    }
}

// fields: ID, gender, Name ,country, postcode, email, Birthdate
/**
 * @return list<list<string>>
 */
function readUserFromCsv(): array
{
    $csv = fopen(__DIR__ . '/../users.csv', 'r');  // Open the CSV file in read mode
    $headers = fgetcsv($csv);  // Read the first line as headers

    $users = array();  // Initialize an empty array to store the data

    while (($row = fgetcsv($csv)) !== false) {
//        $users[] = (new User())->fromArray((array)array_combine($headers, $row));  // Combine headers with row values and add to the data array
        $users[] = array_combine($headers, $row);  // Combine headers with row values and add to the data array
    }

    fclose($csv);  // Close the file

    return $users;
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

$users = array_merge(
    readUserFromCsv(),
    readUserFromWebUrl()
);

printUserList($users);

