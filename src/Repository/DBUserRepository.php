<?php

namespace Messenger\Repository;

use Messenger\Model\User;
use PDO;

class DBUserRepository implements IUserRepository
{
    private PDO $connection;

    public function __construct(string $dbHost, string $dbName, string $dbUsername, string $dbPassword)
    {
        $dbHost = "localhost";
        $dbName = "messenger";
        $dbUsername = "root";
        $dbPassword = "aGo90nPIi";

        $this->connection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    }

    private function Add(User $user)
    {
        $username = $user->GetUsername();
        $password = $user->GetPassword();

        $query = "INSERT INTO users(username, password) VALUES ('$username', '$password')";
        $this->connection->query($query);
    }

    public function FindByUsername(string $username) : User
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

    public function Save(User $user)
    {
        $this->Add($user);
    }
}