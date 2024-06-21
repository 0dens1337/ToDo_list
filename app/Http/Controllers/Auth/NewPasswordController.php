<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewPasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class NewPasswordController extends Controller
{

    public function create(Request $request)
    {
        return view('auth.change-password', ['request' => $request]);
    }

    public function store(NewPasswordRequest $request): RedirectResponse
    {
        if(!Hash::check($request->current_password, Auth::user()->password)){

            return back()->withErrors(['current_password' => 'Current password incorrect']);
        }
        Auth::user()->update(['password' => Hash::make($request->new_password),]);

        return redirect()->route('profile.edit')->with('status', 'Password changed successfully!');
    }
}
