<?php

namespace App\Http\Controllers\Cabinet;

use App\Entity\User;
use App\Http\Requests\Cabinet\ChangePasswordRequest;
use App\Http\Requests\Cabinet\ProfileUpdateRequest;
use App\Http\Controllers\Controller;
use App\Services\Cabinet\UpdateProfileService;

class UsersController extends Controller
{
    private $service;

    public function __construct(UpdateProfileService $service)
    {
        $this->service = $service;
    }

    public function update(ProfileUpdateRequest $request, User $user)
    {
        try {
            if ($request['email'] !== $user->email) {
                $messages['info'] =  __('info.changeEmail');
            }

            $this->service->update($request, $user);
            $messages['success'] =  __('tips.updateProfile');

            return redirect()->route('cabinet.profile')->with($messages);
        } catch (\DomainException $e) {
            return redirect()->route('cabinet.profile')->with(['error' => $e->getMessage()]);
        }
    }

    public function changePassword(ChangePasswordRequest $request, User $user)
    {
        try {
            $this->service->changePassword($request, $user);
            return redirect()->route('cabinet.profile')->with('success', __('tips.changePassword'));
        } catch (\DomainException $e) {
            return redirect()->route('cabinet.profile')->with('error', $e->getMessage());
        }
    }
}
