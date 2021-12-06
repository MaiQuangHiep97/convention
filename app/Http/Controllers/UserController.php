<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $users = $this->userRepo->getAll();
        return view('users.index', ['users' => $users]);
    }

    public function store(AddUserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $this->userRepo->create($data);
        return redirect('user')->with('success', 'Đã thêm user thành công');
    }

    public function edit($id)
    {
        $user = $this->userRepo->find($id);
        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        $this->userRepo->update($id, $data);
        return redirect('user')->with('success', 'Đã cập nhật User thành công');
    }

    public function delete($id)
    {
        if (Auth::id() == $id) {
            return redirect()->back()->with('false', 'You do not have access');
        } else {
            $this->userRepo->delete($id);
            return redirect('user')->with('success', 'Đã xóa user thành công');
        }
    }
}
