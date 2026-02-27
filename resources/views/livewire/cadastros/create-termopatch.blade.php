<div>
    
    
    <div class="flex items-center justify-between bg-green-700  rounded-lg mb-3">
        @if (session()->has('error'))
            <div class="flex items-center w-full  h-10 alert bg-red-600 text-white">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <x-slot name="header">
        <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
            <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M4 5a2 2 0 0 0-2 2v2.5c0 .6.4 1 1 1a1.5 1.5 0 1 1 0 3 1 1 0 0 0-1 1V17a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2.5a1 1 0 0 0-1-1 1.5 1.5 0 1 1 0-3 1 1 0 0 0 1-1V7a2 2 0 0 0-2-2H4Z"/>
            </svg>
              
            {{ __('Cadastrar termopatch') }}
        </h2>
    </x-slot>



    <div class="w-full md:w-11/12  mx-auto sm:px-2 lg:p-3 bg-white dark:bg-slate-800 rounded-lg">

        <div x-data="{ tab: 'first' }">
            <!--TAB - INICIO-->
            <div class="flex">
                <button :class="{ 'active': tab === 'first', 'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600'
                : tab === 'first', 'border-b-2 border-gray-300 dark:border-slate-600'
                : tab !== 'first' }" @click="tab = 'first'" 
                class="text-gray-600 dark:text-gray-400 py-1 px-3 rounded-t-lg">
                    Cadastrar
                </button>
    
                <button :class="{ 'active': tab === 'second', 'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600'
                : tab === 'second', 'border-b-2 border-gray-300 dark:border-slate-600'
                : tab !== 'second' }" @click="tab = 'second'" 
                class="text-gray-600 dark:text-gray-400 py-1 px-3 rounded-t-md">
                    Termopatchs
                </button>
        

            </div>
            <!--TAB - FIM-->
            
            <!--TABS - INICIO-->
            <div class="bg-gray-200 dark:bg-slate-800 p-2 rounded-b-lg">
                <div x-show="tab === 'first'" >
                    <div class="mt-2">
                        @include('components.termopatch.create-termopatch')
                    </div>
                </div>
            
                <div x-show="tab === 'second'">
                    <div class="mt-2">
                        @include('components.termopatch.consultar-termopatch')
                    </div>
                </div>
    
            </div>
            <!--TABS - FIM-->

        </div>
    
    
    </div>
    

</div>
