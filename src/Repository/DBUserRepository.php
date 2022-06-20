<?php

namespace Messenger\Repository;

use Messenger\Model\Entity\User;
use Messenger\Model\Mapper\UserMapper;

class DBUserRepository implements IUserRepository
{
    private UserMapper $usermapper;

    public function __construct(UserMapper $usermapper)
    {
        $this->usermapper = $usermapper;
    }

    public function Save(User $user)
    {
        $this->usermapper->Add($user);
    }
}
