<?php

namespace Messenger\Repository;

use Messenger\Model\Entity\Message;
use Messenger\Model\Mapper\MessageMapper;

class DBMessageRepository implements IMessageRepository
{
    private Message $messagemapper;

    public function __construct(Message $messagemapper)
    {
        $this->messagemapper = $messagemapper;
    }

    private function Add(Message $message)
    {
		$this->messagemapper->Add($message);
    }

    public function GetAll() : array
    {
        return $this->messagemapper->GetAll();
    }

    public function Save(Message $message)
    {
        $this->Add($message);
    }
}