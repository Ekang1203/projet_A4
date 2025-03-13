<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-white" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white font-semibold"/>
            <x-text-input id="email" 
                          class="block mt-1 w-full border border-gray-600 bg-gray-900 p-2 rounded-md focus:ring-2 focus:ring-blue-500 text-white"
                          type="email" 
                          name="email" 
                          :value="old('email')" 
                          required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-white font-semibold"/>
            <x-text-input id="password" 
                          class="block mt-1 w-full border border-gray-600 bg-gray-900 p-2 rounded-md focus:ring-2 focus:ring-blue-500 text-white"
                          type="password" 
                          name="password" 
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" 
                       type="checkbox" 
                       class="rounded border-gray-600 bg-gray-900 text-indigo-500 shadow-sm focus:ring-indigo-400 focus:ring-2 focus:ring-offset-2" 
                       name="remember">
                <span class="ms-2 text-sm !text-white !opacity-100 font-semibold"> {{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-blue-400 hover:text-blue-600" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button 
                class="ms-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md focus:ring-2 focus:ring-blue-400 focus:outline-none disabled:opacity-50">
                {{ __('Log in') }}
            </x-primary-button>



        </div>
    </form>
</x-guest-layout>
