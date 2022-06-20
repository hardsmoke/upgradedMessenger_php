<?php

namespace Messenger\Model\Mapper;

class MessageMapper
{
    private PDO $connection;

    public function __construct(string $dbHost, string $dbName, string $dbUsername, string $dbPassword)
    {
        $this->connection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    }
	
    public function Add(Message $message)
    {
        $messageText = $message->GetMessage();
        $username = $message->GetUsername();

        $query = "INSERT INTO messages(message, username, datetime) VALUES ('$messageText', '$username', NOW())";
        $this->connection->query($query);
    }


    public function GetAll() : array
    {
        $query = "SELECT message, username, datetime FROM messages";

        return $this->connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}