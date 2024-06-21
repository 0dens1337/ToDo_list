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
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                @enderror
                            </div>
                            <div class="accordion mt-3" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Additional information
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="form-group">
                                                <label for="first_name">{{ ('First Name') }}</label>
                                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                                                @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="last_name">{{ ('Last Name') }}</label>
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
                                            <div class="form-group row mt-3">
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
                                        </div>
                                    </div>
                                </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 mb-2">
                                    <button type="submit" class="btn btn-outline-info">
                                        {{ __('Save Changes') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>

                            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                Change Password
                            </button>

                            <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('password.change.post') }}">
                                                @csrf

                                                <div class="mb-3">
                                                    <label for="current_password" class="form-label">Current Password</label>
                                                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                                                    @error('current_password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="new_password" class="form-label">New Password</label>
                                                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                                                    @error('new_password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                <hr>
                                <div class="container d-flex justify-content-center mt-2">
                                <div class="card text-center" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Deletion</h5>
                                        <h6>This option will delete your profile from our site. In case if you will ever want to return back you can always return back profile by contacting to us. But we hope you will never click the button bellow c: </h6>
                                            <div>
                                                <a type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">Delete</a>
                                            </div>
                                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Confirm deletion</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form id="deleteForm" action="{{ route('profile.destroy') }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="form-group">
                                                                <label for="password">Input your password to confirm:</label>
                                                                <input type="password" name="password" id="password" class="form-control" required>
                                                                <label for="password_confirmation">Confirm password</label>
                                                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" form="deleteForm" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
