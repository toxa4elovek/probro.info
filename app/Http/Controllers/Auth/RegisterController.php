<?php

namespace App\Http\Controllers\Auth;

use App\Entity\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\RegisterService;

use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/cabinet';
    private $service;

    public function __construct(RegisterService $service)
    {
        $this->middleware('guest');
        $this->service = $service;
    }


    public function register(RegisterRequest $request)
    {
        $this->service->register($request);

        return redirect()->route('login')
            ->with('success', 'Проверьте свою почту для подтверждения email');
    }
    public function verify($token)
    {
        /**@var User $user*/
        if (!$user = User::where('verify_token',$token)->first()) {
            return redirect()->route('login')
                ->with('error', 'Извините, ссылка не идентифицирована');
        }

        try {
            $this->service->verify($user->id);

            return redirect()->route('login')
                ->with('success', 'Подтверждение успешно пожалуйста авторизуйтесь');
        } catch (\DomainException $e) {
            return redirect()->route('login')
                ->with('error', $e->getMessage());
        }
    }
}
