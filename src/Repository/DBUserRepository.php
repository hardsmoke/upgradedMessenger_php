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

    private function Add(User $user)
    {
	$this->usermapper->Add($user);
    }

    public function FindByUsername(string $username) : User
    {
        return $this->usermapper->FindByUsername($username);
    }

    public function Save(User $user)
    {
        $this->Add($user);
    }
}
