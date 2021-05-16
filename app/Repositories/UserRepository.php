<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Faker\Provider\Base;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->model->with(['transactions'])->where('email', $email)->first();
    }

    public function create(array $attributes): User
    {
        return $this->model->create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password']),
        ]);
    }
}
