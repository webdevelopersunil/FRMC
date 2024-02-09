<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


<h4>Hello! let's get started</h4>
<h6 class="font-weight-light">Sign in to continue.</h6>
<form class="pt-3" method="GET" action="#" >
<div class="form-group">
    <x-input-label for="cpfNo" :value="__('CpfNo')" />
    <x-text-input id="cpfNo" class="block mt-1 w-full" type="text" name="cpfNo" :value="old('cpfNo') ? old('cpfNo') : 'A004628'" required autofocus autocomplete="cpfNo" />
    <x-input-error :messages="$errors->get('cpfNo')" class="mt-2" />
</div>
<div class="form-group">
<x-input-label for="password" :value="__('Password')" />

<x-text-input id="password" class="block mt-1 w-full" type="password"
                name="password"
                value="Welcome@12"
                required autocomplete="current-password" />

<x-input-error :messages="$errors->get('password')" class="mt-2" />

</div>

<!-- <div class="mt-3">
    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
</div> -->

<!-- <div class="my-2 d-flex justify-content-between align-items-center">
    <div class="form-check">
    <label class="form-check-label text-muted">
        <input type="checkbox" class="form-check-input">
        Keep me signed in
    </label>
    </div>
    <a href="" class="auth-link text-black">Forgot password?</a>
</div> -->

<div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="text-center mt-4 font-weight-light">
    Don't have an account? <a href="{{ route('register') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create</a>
</div>

</form>

</x-guest-layout>