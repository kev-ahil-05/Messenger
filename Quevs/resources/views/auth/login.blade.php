<x-guest-layout>
    <!-- Session Status (Lalabas kapag galing sa Password Reset) -->
    <x-auth-session-status class="mb-5 p-4 bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 rounded-xl text-sm font-medium border border-green-200 dark:border-green-800/30" :status="session('status')" />

    <!-- Header Section -->
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-extrabold text-slate-900 dark:text-white tracking-tight">
            Welcome Back
        </h1>
        <p class="text-sm text-slate-500 dark:text-neutral-400 mt-2">
            Please enter your account details to sign in.
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-slate-700 dark:text-neutral-300 font-medium text-sm mb-1.5 block" />
            <x-text-input id="email" class="block w-full rounded-sm border-slate-300 dark:border-neutral-700 dark:bg-neutral-800 focus:border-blue-500 focus:ring-blue-500 py-2.5 px-4 text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-red-500" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-1.5">
                <x-input-label for="password" :value="__('Password')" class="text-slate-700 dark:text-neutral-300 font-medium text-sm" />
                {{-- @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline rounded focus:outline-none focus:ring-2 focus:ring-blue-500" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif --}}
            </div>
            <x-text-input id="password" class="block w-full rounded-sm border-slate-300 dark:border-neutral-700 dark:bg-neutral-800 focus:border-blue-500 focus:ring-blue-500 py-2.5 px-4 text-sm" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                <input id="remember_me" type="checkbox" class="w-4 h-4 rounded border-slate-300 dark:border-neutral-700 text-blue-600 shadow-sm focus:ring-blue-500 focus:ring-offset-2 dark:bg-neutral-800 cursor-pointer" name="remember">
                <span class="ms-2 text-sm text-slate-600 dark:text-neutral-400 font-medium">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Log In Button -->
        <div class="pt-2">
            <x-primary-button class="w-full justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-xl shadow-md shadow-blue-500/20 transition-all text-sm focus:ring-2 focus:ring-blue-500">
                {{ __('Sign In') }}
            </x-primary-button>
        </div>

        <!-- Redirect Link to Register -->
        <div class="text-center pt-4 border-t border-slate-100 dark:border-neutral-800">
            <span class="text-sm text-slate-500 dark:text-neutral-400">Don't have an account yet?</span>
            <a class="text-sm font-semibold text-blue-600 dark:text-blue-400 hover:underline ms-1 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" href="{{ route('register') }}">
                {{ __('Sign up') }}
            </a>
        </div>
    </form>
</x-guest-layout>
