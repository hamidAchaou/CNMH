@include('layouts.links')

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
    
        <!-- Email Address -->
        <div class="input-group mb-3">
            <x-input-label for="email" :value="__('Email')" class="w-100" />
    
            <x-text-input id="email" class="form-control"
                          type="email"
                          name="email"
                          :value="old('email')"
                          autofocus
                          autocomplete="username" />
    
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
    
            <x-input-error :messages="$errors->get('email')" class="mt-2 w-100" />
        </div>
    
        <!-- Password -->
        <div class="input-group mb-3">
            <x-input-label for="password" :value="__('Password')" class="w-100" />
    
            <x-text-input id="password" class="form-control"
                          type="password"
                          name="password"
                          autocomplete="current-password" />
    
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
    
            <x-input-error :messages="$errors->get('password')" class="mt-2 w-100" />
        </div>
    
        <!-- Remember Me -->
        <div class="form-check mb-3">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
        </div>
    
        <div class="d-flex justify-content-end">
            {{-- @if (Route::has('password.request'))
                <a class="text-sm text-gray-600" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif --}}
    
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    

</x-guest-layout>
{{-- get scripts admin LTE --}}
@include('layouts.linksScript')
