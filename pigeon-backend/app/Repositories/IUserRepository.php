<?php

namespace App\Repositories;
use App\Models\User;


interface IUserRepository {

    public function findById(User $user);
    public function save(User $user);
    public function remove(User $user); // This is for testing


}
