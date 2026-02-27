<div>
    

    <x-slot name="header">
        <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
            <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2"/>
            </svg>
            {{ __('Filtros para produtos') }}
        </h2>
    </x-slot>

    <div class="px-2 py-5">

        <div class="w-full md:w-10/12 mx-auto sm:px-2 lg:p-3 bg-white dark:bg-slate-800 rounded-lg">

            <div class="md:flex md:items-end md:space-x-5 space-y-3 bg-slate-300 dark:bg-slate-900 p-2 rounded-lg">
                
                <div class=" w-full md:w-4/12">                        
                   <form wire:submit="save" class="flex items-end gap-x-2">
                        <x-input-wire wire:model="filtro" icon="adjustments" label="Filtro" placeholder="Qual será o nome do filtro?" maxlength="30" class="uppercase"/>
                        
                        @if($edit)
                        <x-button-wire wire:click="update" info label="Alterar" class="h-9" class="w-full lg:w-auto" />
                        <x-button-wire wire:click="cancelar" warning label="Cancelar" class="h-9" class="w-full lg:w-auto" />
                        @else                    
                        <x-button-wire positive label="Adicionar" class="h-9" type="submit"/>
                        @endif
                        
                    </form>
                </div>


                <div>          
                    <x-notifications z-index="z-50" />
                </div>

                
            </div>

            <div class="md:flex mt-5 bg-white dark:bg-slate-800 overflow-hidden shadow-xl rounded-lg">
                
                <!--PERMISSOES DISPONIVEIS -->
                <div class="bg-slate-200 dark:bg-slate-600 w-full rounded-lg">
                    
                    <div class="bg-slate-400 dark:bg-slate-950 p-2 rounded-t-lg">
                        <h1 class="text-white">Filtros disponíveis</h1>
                    </div>

                    <div class="p-2">
                        <x-input-wire wire:model.live="search" icon="search" placeholder="pesquise o filtro..."/>
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
                                        <th scope="col" class="hidden lg:table-cell px-0 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-0 py-3">
                                            <div class="flex items-center">
                                                Filtro
                                                <a wire:click="sortBy('filtro')" href="#" class="cursor-pointer"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                                </svg></a>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-0 py-3">
                                            Ação
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($filtroList as $filtros)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">                                          
                                            <td class="w-4 p-4">
                                                <div class="flex items-center">
                                                    <input wire:model.live="checkboxDisponivel" value="{{ $filtros->id }}"  wire:key="{{ $filtros->id }}" id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            <td scope="row" class="hidden lg:table-cell px-0 py-4 text-gray-900 whitespace-nowrap dark:text-gray-400">
                                                {{'#'.$filtros->id }}
                                            </td>
                                            <th scope="row" class="px-0 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$filtros->filtro}}
                                            </th>
                                            <td class="flex items-center px-0 py-4">
                                                <a wire:click="editFiltro({{ $filtros->id }})"  wire:key="{{ $filtros->id }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline ms-3 cursor-pointer">Editar</a>                       
                                                <a wire:click="confirmSimple({{ $filtros->id }})" {{-- wire:click="remove({{ $filtros->id }})" --}} wire:key="{{ $filtros->id }}" class="font-medium text-red-600 dark:text-red-400 hover:underline ms-3 cursor-pointer">Remover</a>
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

                             <!--Paginate automatico com Alpinejs-->
                             <div class="bg-yellow-400 p-0.5" id="jeremias" x-data="{
                                jeremias() {
                                    const observer = new IntersectionObserver((marcas) => {
                                        marcas.forEach((marca) => {
                                            if (marca.isIntersecting) {
                                                @this.loadMore()
                                            }
                            
                                        })
                                    })
                                    observer.observe(this.$el)
                                }
                            }" x-init="jeremias"></div>
                          </div>

                        </div>
                        <!--Fim div table -->
                        <div class="flex justify-between p-2 mt-2">
                            {{-- <x-button-wire icon="unlocked" positive label="Liberar permissão" /> --}}
                            <button wire:click="adicionarRegraAoUsuario" type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                Remover selecionados
                                <span class="inline-flex items-center justify-center w-4 h-4 ms-2 p-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">
                                0{{-- {{ $totalselected }} --}}
                                </span>
                            </button>

                            <div class="p-0">
                                @if (!$hasMorePages)
                                    <h1 class="text-blue-700 dark:text-yellow-400">Não há mais items para carregar.</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--PERMISSOES DISPONIVEIS - FIM-->


            </div>

        </div>

    </div>


</div>
