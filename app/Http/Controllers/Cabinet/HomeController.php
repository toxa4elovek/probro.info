<?php
/**
 *
 */

namespace App\Http\Controllers\Cabinet;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function profile()
    {
        $user = \Auth::user();

        return view('cabinet.profile', compact('user'));
    }
}