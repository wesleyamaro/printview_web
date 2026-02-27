<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- <x-authentication-card-logo /> --}}
            <img src="./img/printview-logo.svg" alt="" srcset="" class="w-36">
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="">
            @csrf

            <div>
                <x-input-wire
                    icon="at-symbol"
                    label="{{ __('Email') }}"
                    placeholder="seu email"
                    id="email"
                    name="email"
                    :value="old('email')" 
                    required autofocus 
                    autocomplete="username"
                />
            </div>

            <div class="mt-4">
                <x-inputs.password 
                    label="{{ __('Password') }}"
                    icon="finger-print"
                    placeholder="sua senha"
                    id="password"
                    name="password" 
                    required
                    value="" 
                    autocomplete="current-password"/>
            </div>


            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-4 text-end">
                
                <div class="flex justify-between ">
                    {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="underline text-sm text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-blue-800" >
                            {{ __('Registre-se') }}
                        </a>
                    @endif --}}

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                {{--@if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

                <x-button-wire positive label="{{ __('Log in') }}" class="w-full mt-4" type="submit"/>
                
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
