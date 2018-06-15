<?php

namespace App\Http\Controllers\Admin;

use App\Entity\User;
use App\Helpers\UserHelper;
use App\Services\Auth\RegisterService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    private $service;

    public function __construct(RegisterService $service)
    {
        $this->service = $service;
    }

    public function index(?Request $request)
    {
        $conditions = [];

        if ($request) {
           $conditions = array_filter($request->only(['status', 'role', 'email', 'name']), function($param) {
               return (bool) $param;
           });
        }
        $users = User::where($conditions)->orderBy('created_at')->with('posts')->paginate(20);
        $statuses = UserHelper::getStatuses();
        $roles = UserHelper::getRoles();

        return view('admin.users.index', compact('users', 'roles', 'statuses', 'conditions'));
    }

    public function verify(User $user)
    {
        try {
            $this->service->verify($user->id);

            return redirect()->route('admin.users.index')->with('success', "Пользователь: {$user->email} успешно активирован");
        } catch (\DomainException $e) {
            return redirect()->route('admin.users.index')->with('error', $e->getMessage());
        }
    }
}
