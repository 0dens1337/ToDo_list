<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\Enums\RoleEnum;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */


    public function show(Request $request)
    {
        $user = auth()->user();

        return view('profile.show', compact('user'));
    }


    public function edit(Request $request): View
    {
        $roles = RoleEnum::list();
        $genders = GenderEnum::list();

        return view('profile.edit', [
            'user' => $request->user(),
            'roles' => $roles,
            'genders' => $genders,
        ]);

    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->update($request->validated());

        return Redirect::route('profile.edit')->with('success', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password', 'confirmed'],
            'password_confirmation' => ['required'],

        ]);

        $user = $request->user();
        if (!Hash::check($request->password, $user->password))
        {
            return back()->withErrors(['password' => 'Incorrect password']);
        }


        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
