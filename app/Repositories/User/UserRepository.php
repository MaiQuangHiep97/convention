<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\User::class;
    }
    // public function create($attributes = [])
    // {
    //     return $this->model->create([
    //         'name' => $attributes['name'],
    //         'email' => $attributes['email'],
    //         'phone' => $attributes['phone'],
    //         'password' => Hash::make($attributes['password']),
    //     ]);
    // }
    // public function editUser($id)
    // {
    //     return $this->model->find($id);
    // }
}
