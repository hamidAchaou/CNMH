{{-- @extends('layouts.app') --}}

{{-- @section('title', 'HomePage')

@section('content')
    <div class="">
        <div class="container d-flex justify-content-center">
            <div class="card px-3 py-3 mt-3 col-md-8">
                <h2 class="card-header card-header">Ajouter Members</h2>
                <form method="POST" action="{{ route('members.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName">Nom</label>
                                <input type="text" name="firstName" id="firstName" class="form-control" value="{{old('firstName')}}"
                                    placeholder="Enter first name" required>
                            </div>
                            @error('firstName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastName">Prénom</label>
                                <input type="text" name="lastName" id="lastName" class="form-control" value="{{old('lastName')}}"
                                    placeholder="Enter last name" required>
                            </div>
                            @error('lastName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value="{{old('email')}}"
                            required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            placeholder="Confirm password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Member</button>
                </form>
            </div>
        </div>
    </div>
@endsection --}}
@extends('layouts.app')

@section('title', 'Ajouter Members')

@section('content_header')
    <h1>Ajouter Members</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="card col-md-8">
        <div class="card-body">
            <form method="POST" action="{{ route('members.store') }}">
                @csrf

                <!-- Nom -->
                <div class="form-group">
                    <label for="firstName">Nom</label>
                    <input id="firstName" class="form-control" type="text" name="firstName" value="{{ old('firstName') }}" required autofocus autocomplete="firstName">
                    @error('firstName')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Prenom -->
                <div class="form-group">
                    <label for="lastName">Prenom</label>
                    <input id="lastName" class="form-control" type="text" name="lastName" value="{{ old('lastName') }}" required autofocus autocomplete="lastName">
                    @error('lastName')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary ms-2">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
