<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" type="email" class="form-control" name="email" :value="old('email')" required autofocus
                autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control" name="password" required
                autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label text-muted small">{{ __('Remember me') }}</label>
        </div>

        <div class="d-grid gap-2 mt-4">
            <button type="submit" class="btn btn-villa btn-lg">
                {{ __('Log in') }}
            </button>
        </div>

        <div class="text-center mt-3">
            @if (Route::has('password.request'))
                <a class="text-muted small text-decoration-none" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <div class="mt-2">
                <span class="text-muted small">Don't have an account?</span>
                <a href="{{ route('register') }}" class="small fw-bold">Sign up</a>
            </div>
        </div>
    </form>
</x-guest-layout>