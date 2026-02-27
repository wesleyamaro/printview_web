<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

       
       <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}" />
       
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
       
        <!--Sweet Alert -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

        <wireui:scripts />
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased soft-scrollbar bg-gray-200 dark:bg-gray-800">
        <x-banner />

        @include('walert')
        
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            @can('MENU', $permissao)
                @can('TESTE', $permissao)
                <div class="pb-16">
                    @livewire('navigation-menu')
                </div> <!-- Modelo novo - Produtos List 002 -->
            @else
                <div>
                    @livewire('navigation-menu')
                </div> <!-- Modelo antigo - Produtos List 001 -->
            @endcan
            @endcan

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-gray-200 dark:bg-gray-800 shadow">
                    <div class="{{-- max-w-7xl --}}md:w-10/12 mx-auto py-2 px-2 sm:px-6 lg:px-2">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <footer class="mt-10 md:mt-0">
                @include('components.menu-mobile')
            </footer>
        </div>


        @stack('modals')

        @livewireScripts
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    </body>
</html>
