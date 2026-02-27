<div>
    

    <x-slot name="header">
        <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
            <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M15.077.019a4.658 4.658 0 0 0-4.083 4.714V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-1.006V4.68a2.624 2.624 0 0 1 2.271-2.67 2.5 2.5 0 0 1 2.729 2.49V8a1 1 0 0 0 2 0V4.5A4.505 4.505 0 0 0 15.077.019ZM9 15.167a1 1 0 1 1-2 0v-3a1 1 0 1 1 2 0v3Z"/>
            </svg>
            {{ __('Liberar marca(s)') }}
        </h2>
    </x-slot>

    <div class="px-2 py-5">

        <div class="w-full md:w-10/12 mx-auto sm:px-2 lg:p-3 bg-white dark:bg-slate-800 rounded-lg">

            <div class="md:flex md:items-end md:space-x-5 space-y-3 bg-slate-300 dark:bg-slate-900 p-2 rounded-lg">
                
                <div class="w-full md:w-3/12">
                    <x-select z-index="z-50" label="Encontre o usuário que deseja liberar a marca" placeholder="Selecione um usuário"
                        wire:model.live="selectedUser" empty-message="Cliente não encontrado">
                        @foreach ($userList as $user)
                            <x-select.user-option 
                            wire:key="{{ $user->id }}"
                            src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                            
                            label="{{ $user->name }}" 
                            value="{{ $user->id }}" 
                            description="{{ $user->email }}"/>                       
                        @endforeach
                    </x-select>
                </div>

                <div>          
                    <x-notifications z-index="z-50" />
                </div>

                
                
            </div>

            <div class="md:flex mt-5 bg-white dark:bg-slate-800 overflow-hidden shadow-xl rounded-lg">
                
                <!--PERMISSOES DISPONIVEIS -->
                <div class="bg-blue-400 md:w-6/12 rounded-lg">
                    
                    <div class="bg-blue-800 p-2 rounded-t-lg">
                        <h1 class="text-white">Marcas disponíveis</h1>
                    </div>

                    <div class="p-2">
                        <x-input-wire wire:model.live="search" icon="search" placeholder="pesquise a marca..."/>
                        <!--div table -->
                        <div class="mt-2 max-h-96 md:max-h-50v relative {{-- overflow-x-hidden --}} overflow-y-auto soft-scrollbar shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input wire:model.live="checkboxAllDisponivel"  id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-0 py-3 hidden lg:table-cell">
                                            #
                                        </th>
                                        <th scope="col" class="px-0 py-3">                                           
                                            <div class="flex items-center">
                                                Referência
                                                <a wire:click="sortBy('referencia')" href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                                </svg></a>
                                            </div>
                                        </th>
                           
                                        <th scope="col" class="px-2 py-3">                                            
                                            <div class="flex items-center">
                                                Descrição
                                                <a wire:click="sortBy('descricao')" href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                                </svg></a>
                                            </div>
                                        </th>
                                        
                                        <th scope="col" class="px-2 py-3 text-center">
                                            Cliente                                            
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($marcasNaoAssociadasAoUsuario as $naoassociadas)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">                                          
                                            <td class="w-4 p-4">
                                                <div class="flex items-center">
                                                    <input wire:model.live="checkboxDisponivel" value="{{ $naoassociadas->id }}" {{-- wire:click="adicionarRegraAoUsuario({{ $naoassociadas->id }})" --}} wire:key="{{ $naoassociadas->id }}" id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            <td scope="row" class="hidden lg:table-cell px-1 py-4 text-gray-900 whitespace-nowrap dark:text-gray-400">
                                                {{'#'.$naoassociadas->id }}
                                            </td>
                                            <th scope="row" class="px-1 py-4 font-medium text-xs md:text-sm text-center md:text-start text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ str_pad($naoassociadas->referencia, 4, '0', STR_PAD_LEFT) }}
                                            </th>

                                            <td scope="row" class="px-2 py-4 font-medium text-xs md:text-sm uppercase text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$naoassociadas->descricao}}
                                            </td>
                                            
                                            <td scope="row" class="px-2 py-4 font-medium text-center text-xs md:text-sm uppercase text-gray-900 whitespace-nowrap dark:text-white">
                                                @switch($naoassociadas->isCliente)
                                                    @case(0)
                                                        <h1 class="text-green-600 text-center">Não</h1>
                                                        @break
                                                    @case(1)
                                                        <h1 class="text-red-500 text-center">Marca cliente</h1>
                                                        @break
                                                    @default
                                                        
                                                @endswitch
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
                          {{--   <div class="bg-yellow-400 p-0.5" id="jeremias" x-data="{
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
                          </div> --}}

                        </div>
                        <!--Fim div table -->
                        <div class="flex justify-between py-2 mt-2">                            
                            <button wire:click="adicionarMarcaAoUsuario" type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Liberar selecionados
                                <span class="inline-flex items-center justify-center min-w-4 w-auto h-4 ms-2 p-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                                {{ $totalselected }}
                                </span>
                            </button>

                            {{-- <div class="p-0">
                                @if (!$hasMorePages)
                                    <h1 class="text-blue-700 dark:text-yellow-400">Não há mais items para carregar.</h1>
                                @endif
                            </div> --}}
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
                <div class="bg-green-400 md:w-6/12 rounded-lg">
                    
                    <div class="bg-green-800 p-2 rounded-t-lg">
                        <h1 class="text-white">Marcas liberadas</h1>
                    </div>

                    <div class="p-2">
                        <x-input-wire wire:model.live="searchAssociados" icon="search" placeholder="pesquise a marca..."/>

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
                                            <div class="flex items-center">
                                                Referência
                                                <a wire:click="sortBy('referencia')" href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                                </svg></a>
                                            </div>
                                        </th>
                           
                                        <th scope="col" class="px-6 py-3">                                            
                                            <div class="flex items-center">
                                                Descrição
                                                <a wire:click="sortBy('descricao')" href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                                </svg></a>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            Ação
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($marcasAssociadasAoUsuario as $associadas)
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
                                            {{ str_pad($associadas->referencia, 4, '0', STR_PAD_LEFT) }}
                                        </th>
                                        <th scope="row" class="px-6 py-4 uppercase font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $associadas->descricao }}
                                        </th>
                               
                                        <td class="flex items-center px-6 py-4">                       
                                            <a wire:click="removeMarcaUser({{ $associadas->id }})" wire:key="{{ $associadas->id }}" class="font-medium text-red-600 dark:text-red-400 hover:underline ms-3 cursor-pointer">Remover</a>
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

                        <div class="flex justify-between p-2 mt-2">
                            
                            <button wire:click="removerMarcaSelecionadas" type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                Remover selecionados
                                <span class="inline-flex items-center justify-center min-w-4 w-auto h-4 ms-2 p-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">
                                {{ $totalselectedLiberados }}
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
