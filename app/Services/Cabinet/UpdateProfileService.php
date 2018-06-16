<?php
/**
 *
 */

namespace App\Services\Cabinet;


use App\Entity\User;
use App\Helpers\UserHelper;
use App\Http\Requests\Cabinet\ChangePasswordRequest;
use App\Http\Requests\Cabinet\ProfileUpdateRequest;
use App\Mail\Auth\VerifyMail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Str;

class UpdateProfileService
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function update(ProfileUpdateRequest $request, User $user)
    {
        $isChangeEmail = $request['email'] === $user->email;

        $user->update([
            'email' => $request['email'],
            'name' => $request['name'],
            'status' => $isChangeEmail ? $user->status : UserHelper::STATUS_WAIT,
            'verify_token' => $isChangeEmail ? Str::random() : null,
        ]);

        $this->mailer->to($user->email)->send(new VerifyMail($user));
    }

    public function changePassword(ChangePasswordRequest $request, User $user)
    {
        return $user->update([
            'password' => bcrypt($request['newPassword'])
        ]);
    }
}