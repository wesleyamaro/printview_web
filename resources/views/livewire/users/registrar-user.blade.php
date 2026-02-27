<div>

    <x-slot name="header">
        <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">            
            <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
            </svg>
              
            {{ __('Registrar usuário') }}
        </h2>
    </x-slot>

    <!--Notificação wireui-->
    <x-notifications position="top-right" /> 


    <div class="w-full md:w-10/12 p-3 mx-auto mt-3 sm:px-2 lg:p-3 bg-gray-200 dark:bg-slate-800  rounded-lg">    

        <div class="p-5">
            <span class="w-full text-blue-600 dark:text-blue-300">
                Registre um novo usuário para o sistema.
            </span>
        </div>
        <div class="md:w-4/12 p-3 md:p-5 m-auto rounded-md bg-gray-300 dark:bg-slate-900 ">
            <form wire:submit.prevent="register">
                @csrf
    
                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input-wire wire:model="name" id="name" type="text" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus  />
                </div>
    
                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input-wire wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
    
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input-wire wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
    
                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input-wire wire:model="passwordConfirmation" id="passwordConfirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                </div>

    
                <div class="flex items-center justify-end mt-4">
                    {{-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a> --}}
    
                    <x-button-wire type="submit" positive class="ms-4">
                        {{ __('Register') }}
                    </x-button-wire>
                </div>
            </form>


        </div>

        <div class="p-4 mt-5 mb-4 text-sm md:text-base text-black rounded-lg bg-yellow-400 dark:bg-gray-900 dark:text-yellow-300" role="alert">
            <span class="font-medium">Atenção!</span>  Não se esqueça de que, após o registro, é necessário atribuir as permissões de acesso ao sistema para o novo usuário.
        </div>

    </div>



</div>
