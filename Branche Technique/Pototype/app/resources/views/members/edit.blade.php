@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
<div class="content container py-4">
    <div class="container d-flex justify-content-center">
        <div class="card px-3 py-3 mt-3 col-md-8">
            <h2 class="card-header card-header">{{ __('words.update_members') }}</h2>
            <form action="{{ route('members.update', ['id' => $member->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">{{ __('words.first_name') }}</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="{{ __('words.enter_first_name') }}" value="{{$member->firstName}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">{{ __('words.last_name') }}</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="{{ __('words.enter_last_name') }}" value="{{$member->lastName}}" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('words.email') }}</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('words.enter_email') }}" value="{{$member->email}}">
                </div>
                <div class="form-group">
                    <label for="password">{{ __('words.password') }}</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('words.enter_password') }}">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">{{ __('words.confirm_password') }}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('words.confirm_password_placeholder') }}">
                </div>
                <button type="submit" class="btn btn-primary">{{ __('words.update_member') }}</button>
            </form>
        </div>
    </div>
</div>

@endsection
