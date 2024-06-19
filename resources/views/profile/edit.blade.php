@extends('layouts.app')
@section('edit')
    @include('includes.error')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mb-4">
                <div class="card">
                    <div class="card-header">{{ __('Edit Profile') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="first_name">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $user->last_name) }}">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="middle_name">{{ __('Middle Name') }}</label>
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name', $user->middle_name) }}">
                                @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="birthday"
                                       class="col-md-4 mb-2 col-form-label text-md-right">{{ __('Your Birthday') }}</label>

                                <div class="col-md-6">
                                    <input id="birthday" type="date"
                                           class="form-control datepicker @error('birthday') is-invalid @enderror"
                                           name="birthday">
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

                            <div class="form-group mb-0">
                                <div class="col-md-4 offset-md-4 mt-2">
                                    <button type="submit" class="btn btn-outline-light">
                                        {{ __('Save Changes') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
