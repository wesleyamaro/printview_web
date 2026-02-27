<div>
    
    <x-notifications z-index="z-50" />

    <x-slot name="header">
        <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
            <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                <path d="M14 7h-1.5V4.5a4.5 4.5 0 1 0-9 0V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-5 8a1 1 0 1 1-2 0v-3a1 1 0 1 1 2 0v3Zm1.5-8h-5V4.5a2.5 2.5 0 1 1 5 0V7Z"/>
            </svg>
            {{ __('Bloquear referência(s)') }}
        </h2>
    </x-slot>

    <div class="px-2 py-5">

        <div class="w-full md:w-10/12 mx-auto sm:px-2 lg:p-3 bg-white dark:bg-slate-800 rounded-lg">

            <div class="{{-- md:flex md:items-end md:space-x-5 space-y-3 --}} bg-slate-300 dark:bg-slate-900 p-2 rounded-lg">
                

                <div class="w-full md:w-3/12">
                    <x-select  label="Encontre o usuário que deseja bloquear a referência" placeholder="Selecione um usuário"
                        wire:model.live="selectedUser" empty-message="Cliente não encontrado">
                        @foreach ($userList as $users)
                            <x-select.user-option 
                            wire:key="{{ $users->id }}"
                            src="{{ $users->profile_photo_path ? asset('storage/' . $users->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                            
                            label="{{ $users->name }}" 
                            value="{{ $users->id }}" 
                            description="{{ $users->email }}"/>                       
                        @endforeach
                    </x-select>          
                    
                </div>

                
                
            </div>

            <div class="md:flex mt-5 bg-white dark:bg-slate-800 overflow-hidden shadow-xl rounded-lg">
                
                <!--PERMISSOES DISPONIVEIS -->
                <div class="bg-blue-400 md:w-6/12 rounded-lg">
                    
                    <div class="bg-blue-800 p-2 rounded-t-lg">
                        <h1 class="text-white">Referência(s) disponívei(s)</h1>
                    </div>

                    <div class="p-2">
                        <x-input-wire wire:model.live="search" icon="search" placeholder="pesquise a referência..."/>
                        <!--div table -->
                        <div class="mt-2 max-h-96 md:max-h-50v relative overflow-x-hidden overflow-y-auto soft-scrollbar shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input wire:model.live="checkboxAllDisponivel"  id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-0 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-0 py-3">
                                            Referência
                                        </th>
                                        <th scope="col" class="px-0 py-3">
                                            Descrição
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($referenciasNaoAssociadasAoUsuario as $naoassociadas)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">                                          
                                            <td class="w-4 p-4">
                                                <div class="flex items-center">
                                                    <input wire:model.live="checkboxDisponivel" value="{{ $naoassociadas->id }}" {{-- wire:click="adicionarRegraAoUsuario({{ $naoassociadas->id }})" --}} wire:key="{{ $naoassociadas->id }}" id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            <td scope="row" class="px-0 py-4 text-gray-900 whitespace-nowrap dark:text-gray-400">
                                                {{'#'.$naoassociadas->id }}
                                            </td>
                                            <th scope="row" class="px-0 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$naoassociadas->referencia}}
                                            </th>

                                            <td scope="row" class="px-0 py-4 font-medium uppercase text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$naoassociadas->descricao}}
                                            </td>
                                        </tr>
                                    @empty
                                            <tr>
                                                <th>
                                                   <h1 class="text-red-600">Nada encotrado!</h1> 
                                                </th>
                                            </tr>
                                    @endforelse
                          
                        
                                </tbody>
                            </table>
                        </div>
                        <!--Fim div table -->
                        <div class="mt-3">
                            {{-- <x-button-wire icon="unlocked" positive label="Liberar permissão" /> --}}
                            <button wire:click="adicionarReferenciaAoUsuario" type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Liberar selecionados
                                <span class="inline-flex items-center justify-center min-w-4 w-auto h-4 ms-2 p-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                                {{-- 2 --}}{{ $totalselected }}
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <!--PERMISSOES DISPONIVEIS - FIM-->

                <div class="flex items-center justify-center  p-2">
                    <svg class="w-5 h-5 rotate-90 md:rotate-0 text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </div>

                <!--PERMISSOES LIBERADAS -->
                <div class="bg-red-400 md:w-6/12 rounded-lg">
                    
                    <div class="bg-red-800 p-2 rounded-t-lg">
                        <h1 class="text-white">Referência(s) bloqueada(s)</h1>
                    </div>

                    <div class="p-2">
                        <x-input-wire wire:model.live="searchAssociados" icon="search" placeholder="pesquise a referência..."/>

                         <!--div table -->
                         <div class="mt-2 max-h-96 md:max-h-50v relative overflow-x-hidden overflow-y-auto soft-scrollbar shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input wire:model.live="checkboxAllLiberados" id="checkbox-all-liberados" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-all-liberados" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-0 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-0 py-3">
                                            Referência
                                        </th>
                           
                                        <th scope="col" class="px-6 py-3">
                                            Descrição
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            Ação
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($referenciasAssociadasAoUsuario as $associadas)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input wire:model.live="checkboxLiberados" value="{{ $associadas->id }}" id="checkbox-table-search-2" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td scope="row" class="px-0 py-4 text-gray-900 whitespace-nowrap dark:text-gray-400">
                                            {{'#' . $associadas->id  }}
                                        </td>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $associadas->referencia }}
                                        </th>
                                        <th scope="row" class="px-6 py-4 uppercase font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $associadas->descricao }}
                                        </th>
                               
                                        <td class="flex items-center px-6 py-4">                       
                                            <a wire:click="removeReferenciaUser({{ $associadas->id }})" wire:key="{{ $associadas->id }}" class="font-medium text-red-600 dark:text-red-400 hover:underline ms-3 cursor-pointer">Remover</a>
                                        </td>
                                    </tr>

                                    @empty
                                            <tr>
                                                <th>
                                                    <h1 class="text-red-600">Nada encotrado!</h1> 
                                                </th>
                                            </tr>
                                    @endforelse
                          
                        
                                </tbody>
                            </table>
                        </div>
                        <!--Fim div table -->

                        <div class="mt-3">
                            {{-- <x-button-wire icon="unlocked" positive label="Liberar permissão" /> --}}
                            <button wire:click="removerReferenciaSelecionadas" type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                Remover selecionados
                                <span class="inline-flex items-center justify-center min-w-4 w-auto h-4 ms-2 p-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">
                                {{-- 2 --}}{{ $totalselectedLiberados }}
                                </span>
                            </button>
                        </div>

                    </div>
                </div>
                <!--PERMISSOES DISPONIVEIS - FIM-->

            </div>

        </div>

    </div>


</div>
