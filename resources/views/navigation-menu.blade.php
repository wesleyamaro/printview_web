@can('TESTE', $permissao)
    <nav x-data="{ open: false }"
        class="fixed top-0  left-0 right-0 z-50 bg-gray-300 dark:bg-gray-950 border-b border-gray-100 dark:border-gray-700">
        <!-- Modelo novo - Produtos List 002 -->
    @else
        <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
            <!-- Modelo antigo - Produtos List 001 -->
        @endcan
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    {{-- <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a> --}}
                    <a href="{{ route('novidades') }}" wire:navigate class="flex items-center ">
                        <img src="https://printview.shop/img/logo_printview.png" class="h-6 me-3 sm:h-7" alt="Printview Logo" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">PrintView</span>         
                     </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @can('MENU-MAIS-VENDIDO', $permissao)
                    <x-nav-link href="{{ route('mais_vendido') }}" wire:navigate :active="request()->routeIs('dashboard')" class="flex gap-x-2">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1v14h16M4 10l3-4 4 4 5-5m0 0h-3.207M16 5v3.207"/>
                        </svg>
                        {{ __('Mais pedidas') }}
                    </x-nav-link>
                    @endcan
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @can('MENU-NOVIDADE', $permissao)
                    <x-nav-link href="{{ route('novidades') }}" wire:navigate :active="request()->routeIs('novidades')">
                        {{ __('Novidades') }}
                    </x-nav-link>
                    @endcan
                </div>


                <!--MENU DROPDOWN -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @can('MENU-PRODUTOS', $permissao)
                    <x-nav-link id="dropdownNavbarLinkProdutos" data-dropdown-toggle="dropdownNavbarProdutos" {{-- href="{{ route('dashboard') }}" --}} :active="request()->routeIs('transfers')" class="cursor-pointer">
                        {{ __('Produtos') }}
                        <svg class="w-2.5 h-2.5 ms-2.5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </x-nav-link>               
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbarProdutos" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            @can('SUBMENU-TRANSFER', $permissao)
                            <li>
                                <a href="{{ route('produtos', ['tipo' => 'transfer']) }}" wire:navigate class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Transfers</a>
                            </li>
                            @endcan
                            
                            @can('SUBMENU-TERMOPATCH', $permissao)
                            <li>
                                <a href="{{ route('produtos', ['tipo' => 'termopatch']) }}" wire:navigate class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Termopatchs</a>
                            </li>
                            @endcan

                            <li>
                                <a href="#" wire:navigate class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sintéticos</a>
                            </li>
                            </ul>
                            {{-- <div class="py-1">
                            <a href="#" wire:navigate class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Outros</a>
                            </div> --}}
                        </div>
                        @endcan
                </div>
                <!--MENU DROPDOWN FIM-->

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @can('MENU-CARRINHO', $permissao)
                    <x-nav-link href="{{ route('carrinho_compra') }}"  wire:navigate :active="request()->routeIs('carrinho')">
                        {{ __('Carrinho') }}
                    </x-nav-link>
                    @endcan
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @can('MENU-PEDIDO', $permissao)
                    <x-nav-link  href="{{ route('pedidos') }}"  wire:navigate :active="request()->routeIs('pedidos')">
                        {{ __('Pedidos') }}
                    </x-nav-link>
                    @endcan
                </div>


                <!--MENU DROPDOWN  CADASTROS-->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @can('MENU-CADASTRO', $permissao)
                    <x-nav-link id="dropdownNavbarLinkCadastros" data-dropdown-toggle="dropdownNavbarCadastros" {{-- href="{{ route('dashboard') }}" --}} :active="request()->routeIs('transfers')" class="cursor-pointer">
                        {{ __('Cadastros') }}
                        <svg class="w-2.5 h-2.5 ms-2.5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </x-nav-link>               
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbarCadastros" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                             <li>
                                <a href="{{ route('cadastro_filtros') }}"  wire:navigate class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Filtros</a>
                            </li>
                            <li>
                                <a href="{{ route('cadastro_transfer') }}"  wire:navigate class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Produtos</a>
                            </li>
                            {{--
                            <li>
                                <a href="{{ route('cadastro_termopatch') }}"  wire:navigate class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Termopatch</a>
                            </li>--}}
                            <li>
                                <a href="{{ route('cadastro_marcas') }}"  wire:navigate class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Marcas</a>
                            </li>                             
                        </div>
                    @endcan
                </div>
                <!--MENU DROPDOWN CADASTROS FIM-->







            <!--MENU DROPDOWN Gerenciar usuários-->
            <div class="hidden sm:-my-px sm:ms-10 sm:flex">
            @can('MENU-GERENCIAR-USER', $permissao)
            <x-nav-link id="dropdownNavbarLinkbloqueio" data-dropdown-toggle="dropdownNavbarbloqueio"  {{-- href="{{ route('dashboard') }}" --}} :active="request()->routeIs('transfers')" class="cursor-pointer">
                {{ __('Gerenciar usuários') }}
                <svg class="w-2.5 h-2.5 ms-2.5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </x-nav-link>               
                <!-- Dropdown menu -->
                <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level-users">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                   
            
                      <li>
                          {{-- <button id="dropdownNavbarLinkbloqueio" data-dropdown-toggle="dropdownNavbarbloqueio" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            Gerenciar bloqueios <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button> --}}
                          <!-- Dropdown menu -->
                          <div id="dropdownNavbarbloqueio" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
                                @can('SUBMENU-TOP-CLIENTE', $permissao)
                                <li>
                                  <a href="{{ route('top_cliente') }}"  wire:navigate class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Top Clientes</a>
                                </li>
                                @endcan
            
            
                                <li aria-labelledby="dropdownNavbarLinkbloqueio">
                                  <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Bloqueios<svg class="w-2.5 h-2.5 -rotate-90 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg></button>
                                  <div id="doubleDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                      <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton">
                                        @can('SUBMENU-BLOQUEIO-REFERENCIA', $permissao)
                                        <li>
                                          <a href="{{ route('bloquear_referencia') }}"  wire:navigate class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Bloquear produto</a>
                                        </li>
                                        @endcan
                                        @can('SUBMENU-LIBERAR-MARCA', $permissao)
                                        <li>
                                          <a  href="{{ route('liberar_marca') }}"  wire:navigate  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Liberar marca</a>
                                        </li>
                                        @endcan
                                      </ul>
                                  </div>
                                </li>

                                @can('SUBMENU-LIBERAR-CLIENTE', $permissao)
                                <li>
                                    <a href="{{ route('liberar_cliente') }}"  wire:navigate class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Liberar cliente</a>
                                </li>
                                @endcan

                                

                                @can('SUBMENU-PERMISSAO-SISTEMA', $permissao)
                                <li>
                                    <a href="{{ route('permissao_sistema') }}"  wire:navigate class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Permissão sistema</a>
                                </li>
                                @endcan

                                <hr class="border-gray-500 dark:border-gray-500 mx-3">

                                @can('SUBMENU-REGISTRAR-USER', $permissao)
                                <li>
                                    <a href="{{ route('registrar_user') }}"  wire:navigate class="block px-4 py-2 text-green-500 dark:text-green-400 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Registrar usuário</a>
                                </li>
                                @endcan

                                @can('LIST-USER', $permissao)
                                <li>
                                  <a href="{{ route('list_user') }}" wire:navigate class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Lista de usuário(s)</a>
                                </li>
                                @endcan
            
                                @can('SUBMENU-BLOQUEIO-USER', $permissao)
                                <li>
                                  <a href="{{ route('bloqueio_user') }}" wire:navigate class="block px-4 py-2 text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bloqueio usuário</a>
                                </li>
                                @endcan

                                @can('LOG-USER', $permissao)
                                <li>
                                  <a href="{{ route('logs_user') }}" wire:navigate class="block px-4 py-2 text-yellow-600 dark:text-yellow-400 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logs usuário</a>
                                </li>
                                @endcan

                                @can('LOG-USER', $permissao)
                                <li>
                                  <a href="{{ route('pagamentos') }}" wire:navigate class="flex gap-x-2 px-4 py-2 text-blue-600 dark:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-5 h-5 text-blue-800 dark:text-blue-400 dark:hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12 14a3 3 0 0 1 3-3h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4a3 3 0 0 1-3-3Zm3-1a1 1 0 1 0 0 2h4v-2h-4Z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M12.293 3.293a1 1 0 0 1 1.414 0L16.414 6h-2.828l-1.293-1.293a1 1 0 0 1 0-1.414ZM12.414 6 9.707 3.293a1 1 0 0 0-1.414 0L5.586 6h6.828ZM4.586 7l-.056.055A2 2 0 0 0 3 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2h-4a5 5 0 0 1 0-10h4a2 2 0 0 0-1.53-1.945L17.414 7H4.586Z" clip-rule="evenodd"/>
                                      </svg>
                                    Pagamentos</a>
                                </li>
                                @endcan
            
                              </ul>
              
                          </div>
                      </li>
            
            
                    </ul>
                  </div>
                  @endcan
                </div>
                <!--MENU DROPDOWN FIM Gerenciar usuários -->

                

            </div>



            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            {{-- <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                            </button> --}}

                            <x-dropdown-link id="theme-toggle" type="button" class="cursor-pointer flex">
                                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                                <h1 id="theme-toggle-light-text" class="hidden ml-2"> Tema light</h1>
                                <h1 id="theme-toggle-dark-text" class="hidden ml-2"> Tema dark</h1>
                            </x-dropdown-link>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">

                <button  data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation"{{--  @click="open = ! open" --}} class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>



@include('components.sidebar-menu')


    <!-- Responsive Navigation Menu -->
    {{-- <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div> --}}
</nav>

<script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>

{{-- <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>

<script>
var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

var themeToggleDarkIcon2 = document.getElementById('theme-toggle-dark-icon2');
var themeToggleLightIcon2 = document.getElementById('theme-toggle-light-icon2');

//TEXTO
var themeToggleDarkText = document.getElementById('theme-toggle-dark-text');
var themeToggleLightText = document.getElementById('theme-toggle-light-text');


// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden'); 
    themeToggleLightIcon2.classList.remove('hidden');
    themeToggleLightText.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden'); 
    themeToggleDarkIcon2.classList.remove('hidden');
    themeToggleDarkText.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');
var themeToggleBtn2 = document.getElementById('theme-toggle2');

themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    themeToggleDarkText.classList.toggle('hidden');
    themeToggleLightText.classList.toggle('hidden');


    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

    // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
    
});



themeToggleBtn2.addEventListener('click', function() {


themeToggleDarkIcon2.classList.toggle('hidden');
themeToggleLightIcon2.classList.toggle('hidden');


// if set via local storage previously
if (localStorage.getItem('color-theme')) {
    if (localStorage.getItem('color-theme') === 'light') {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
    } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
    }

// if NOT set via local storage previously
} else {
    if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
    } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
    }
}

});
</script> --}}