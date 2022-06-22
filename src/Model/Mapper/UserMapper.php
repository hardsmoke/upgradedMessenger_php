<?php

namespace Messenger\Model\Mapper;

use PDO;
use Messenger\Model\Entity\User;

class UserMapper implements \JsonSerializable
{
    private PDO $connection;

    public function __construct(string $dbHost, string $dbName, string $dbUsername, string $dbPassword)
    {
        $this->connection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    }

	public function Add(User $user)
	{
		$username = $user->GetUsername();
        $password = $user->GetPassword();

        $query = "INSERT INTO users(username, password) VALUES ('$username', '$password')";
        $this->connection->query($query);
	}
	
	public function FindByName(string $username) : User
	{
		$query = "SELECT * FROM users WHERE users.username = '$username'";
        $usersParams = $this->connection->query($query)->fetch(PDO::FETCH_ASSOC);
        $user = new User('', '');

        if ($usersParams['username'] != null)
        {
            return new User($usersParams['username'], $usersParams['password']);
        }

        return $user;
	}
}
