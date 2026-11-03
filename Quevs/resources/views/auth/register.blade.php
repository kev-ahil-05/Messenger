<x-guest-layout>
    
        
        <!-- Header Section -->
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                Create an Account
            </h1>
            <p class="text-sm text-slate-500 dark:text-neutral-400 mt-2">
                Join us today! Please enter your details below.
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Full Name')" class="text-slate-700 dark:text-neutral-300 font-medium text-sm mb-1.5 block" />
                <x-text-input id="name" class="block w-full rounded-sm border-slate-300 dark:border-neutral-700 dark:bg-neutral-800 focus:border-blue-500 focus:ring-blue-500 py-2.5 px-4 text-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
                <x-input-error :messages="$errors->get('name')" class="mt-1.5 text-xs text-red-500" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email Address')" class="text-slate-700 dark:text-neutral-300 font-medium text-sm mb-1.5 block" />
                <x-text-input id="email" class="block w-full rounded-sm border-slate-300 dark:border-neutral-700 dark:bg-neutral-800 focus:border-blue-500 focus:ring-blue-500 py-2.5 px-4 text-sm" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-red-500" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-slate-700 dark:text-neutral-300 font-medium text-sm mb-1.5 block" />
                <x-text-input id="password" class="block w-full rounded-sm border-slate-300 dark:border-neutral-700 dark:bg-neutral-800 focus:border-blue-500 focus:ring-blue-500 py-2.5 px-4 text-sm" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-slate-700 dark:text-neutral-300 font-medium text-sm mb-1.5 block" />
                <x-text-input id="password_confirmation" class="block w-full rounded-sm border-slate-300 dark:border-neutral-700 dark:bg-neutral-800 focus:border-blue-500 focus:ring-blue-500 py-2.5 px-4 text-sm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5 text-xs text-red-500" />
            </div>

            <!-- Action Section -->
            <div class="pt-2">
                <x-primary-button class="w-full justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-xl shadow-md shadow-blue-500/20 transition-all text-sm focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    {{ __('Create Account') }}
                </x-primary-button>
            </div>

            <!-- Redirect Link -->
            <div class="text-center pt-4 border-t border-slate-100 dark:border-neutral-800">
                <span class="text-sm text-slate-500 dark:text-neutral-400">Already have an account?</span>
                <a class="text-sm font-semibold text-blue-600 dark:text-blue-400 hover:underline ms-1 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" href="{{ route('login') }}">
                    {{ __('Log in') }}
                </a>
            </div>
        </form>
    
</x-guest-layout>
