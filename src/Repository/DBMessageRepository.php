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

    public function Save(Message $message)
    {
        $this->messagemapper->Add($message);
    }
}
