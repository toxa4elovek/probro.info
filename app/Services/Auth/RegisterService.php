<?php
/**
 *
 */

namespace App\Services\Auth;


use App\Entity\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\Auth\VerifyMail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Auth\Events\Registered;

class RegisterService
{
    private $mailer;
    private $dispatcher;

    public function __construct(Mailer $mailer, Dispatcher $dispatcher)
    {
        $this->mailer     = $mailer;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param RegisterRequest $request
     */
    public function register(RegisterRequest $request):void
    {
        $user = User::register(
            $request['name'],
            $request['email'],
            $request['password']
        );

        $this->mailer->to($user->email)->send(new VerifyMail($user));

        $this->dispatcher->dispatch(new Registered($user));
    }

    /**
     * @param int $userId
     */
    public function verify(int $userId):void
    {
        /**
         * @var User $user
         */
        $user = User::findOrFail($userId);
        $user->verify();
    }
}