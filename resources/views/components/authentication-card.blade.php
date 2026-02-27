{{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>

</div> --}}

<div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-50">
    
    <div class="w-11/12 sm:w-96 md:w-auto flex flex-col p-2 rounded-md items-center shadow-lg bg-white">
        <div class="p-5">
            {{ $logo }}
        </div>

        <div class="w-full md:min-w-96 mt-6 px-6 py-4 bg-white dark:bg-gray-800  overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>

        <div class="mt-5">
            <span class="text-xs text-gray-500">Desenvolvido por WA 2024 ©</span>
        </div>
    </div>

</div>