<?php

namespace App\Http\Controllers\Auth;


use App\Enums\GenderEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Enums\RoleEnum;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        $roles = RoleEnum::list();
        $genders = GenderEnum::list();

        return view('auth.register', compact('roles', 'genders'));
    }

    public function store(RegisterUserRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        auth()->login($user);

        return redirect()->route('home');
    }
}
