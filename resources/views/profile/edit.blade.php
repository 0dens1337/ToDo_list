@extends('layouts.app')
@section('edit')
    @include('includes.error')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mb-4">
                <div class="card">
                    <div class="card-header">{{ __('Edit Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 mb-2 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname"
                                       class="col-md-4 mb-2 col-form-label text-mb-right">{{ __('Last Name') }}</label>
                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                           class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                           value="{{ old('lastname') }}" required autocomplete="firstname">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="firstname"
                                       class="col-md-4 mb-2 col-form-label text-mb-right">{{ __('First Name') }}</label>
                                <div class="col-md-6">
                                    <input id="firstname" type="text"
                                           class="form-control @error('firstname') is-invalid @enderror"
                                           name="firstname" value="{{ old('firstname') }}" required
                                           autocomplete="lastname">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="middlename"
                                       class="col-md-4 mb-2 col-form-label text-mb-right">{{ __('Middle Name') }}</label>
                                <div class="col-md-6">
                                    <input id="middlename" type="text"
                                           class="form-control @error('middlename') is-invalid @enderror"
                                           name="middlename" value="{{ old('middlename') }}" required
                                           autocomplete="middlename">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 mb-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 mb-2 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation"
                                       class="col-md-4 mb-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control w-50 text-center">
                                    @foreach($roles as $id => $role)
                                        <option value="{{ $id }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control w-50 text-center">
                                    @foreach($genders as $id => $gender)
                                        <option value="{{ $id }}">{{ $gender }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4 mt-2">
                                    <form method="PUT" action="{{ route('home') }}">
                                        <button type="submit" class="btn btn-outline-light">
                                            {{ __('Edit') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
