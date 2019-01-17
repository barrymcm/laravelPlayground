<?php


namespace App\Repository;

use App\User;

class UserRepository
{
    public function getUserByEmail($email)
    {
        return User::where(['email' => $email])->first();
    }
}