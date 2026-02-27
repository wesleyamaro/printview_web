<div>
    

    <x-slot name="header">
        <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
            <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                <path d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z"/>
              </svg>
            {{ __('Marcas') }}
        </h2>
    </x-slot>

    <div class="px-2 py-5">

        <div class="w-full md:w-10/12 mx-auto sm:px-2 lg:p-3 bg-white dark:bg-slate-800 rounded-lg">

            <div class="md:flex md:items-end md:space-x-5 space-y-3 bg-slate-300 dark:bg-slate-900 p-2 rounded-lg">
                
                <div class="w-full ">                        
                   <form wire:submit="save" class="md:flex md:items-end gap-x-2 space-y-2 md:space-y-0">
                    <div class="md:flex items-end gap-x-2 space-y-2 md:space-y-0">
                        <x-input-wire  wire:model="novaReferencia"  label="Referência" placeholder="000000" maxlength="8" class="w-auto md:w-32 lg:w-[8rem] "/>
                        <x-input-wire wire:model="descricao" autofocus index="1" label="Descrição*" placeholder="Qual será a marca?" maxlength="30" class="w-auto md:w-52 lg:w-[15rem] uppercase"/>
                        <x-input-wire wire:model="observacao" label="Observação" placeholder="Observação" maxlength="50" class="w-full md:w-64 lg:w-[28rem] uppercase"/>
                        <x-checkbox-wire id="right-label" label="Marca cliente" wire:model="isCliente"  />
                    </div>
                        @if($edit)
                        <x-button-wire wire:click="update" info label="Alterar" class="h-9" class="w-full lg:w-auto" />
                        <x-button-wire wire:click="cancelar" warning label="Cancelar" class="h-9" class="w-full lg:w-auto" />
                        @else                    
                        <x-button-wire positive label="Adicionar" class="h-9" type="submit" class="w-full lg:w-auto" />
                        @endif
                       
                    </form>
                </div>


                <div>          
                    <x-notifications z-index="z-50" />
                </div>

                
            </div>
            <div class="p-2 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                  <span class="font-medium">Atenção ao excluir uma marca, pois todos os produtos associados a ela serão excluídos.
                </div>

            <div class="md:flex mt-3 bg-white dark:bg-slate-800 overflow-hidden shadow-xl rounded-lg">
                
                
                
                <!--PERMISSOES DISPONIVEIS -->
                <div class="bg-slate-200 dark:bg-slate-600 w-full rounded-lg">
                    
                    <div class="bg-slate-400 dark:bg-slate-950 p-2 rounded-t-lg">
                        <h1 class="text-gray-600 dark:text-gray-400">Marcas disponíveis</h1>
                    </div>

                    <div class="p-2">
                        <x-input-wire wire:model.live="search" icon="search" placeholder="pesquise a marca..."/>
                        <!--div table -->
                        <div class="mt-2 max-h-96 md:max-h-50v relative overflow-x-auto overflow-y-auto soft-scrollbar shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input wire:model.live="checkboxAllDisponivel"  id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        
                                        <th scope="col" class="px-2 py-3">
                                            <div class="flex items-center ">
                                                Ref.
                                                <a wire:click="sortBy('referencia')" href="#" class="cursor-pointer"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                                </svg></a>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-0 py-3">
                                            <div class="flex items-center">
                                                Descricão
                                                <a wire:click="sortBy('descricao')" href="#" class="cursor-pointer"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                                </svg></a>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-2 py-3 hidden lg:table-cell">
                                            Observação
                                        </th>
                                        
                                        <th scope="col" class="px-2 py-3 hidden lg:table-cell text-center">
                                            Marca cliente
                                        </th>

                                        <th scope="col" class="px-2 py-3 text-center">
                                            Ação
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($marcaList as $marca)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">                                          
                                            <td class="w-4 p-4">
                                                <div class="flex items-center">
                                                    <input wire:model.live="checkboxDisponivel" value="{{ $marca->id }}"  wire:key="{{ $marca->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                          
                                            <td scope="row" class="px-2 py-4 font-medium text-xs md:text-sm uppercase text-gray-900 whitespace-nowrap dark:text-gray-400">
                                                {{ str_pad($marca->referencia, 4, '0', STR_PAD_LEFT) }}
                                            </td>
                                            <th scope="row" class="px-0 py-4 font-medium text-xs md:text-sm uppercase text-gray-900 whitespace-nowrap dark:text-gray-400">
                                                {{$marca->descricao}}
                                            </th>

                                            <th scope="row" class="hidden lg:table-cell px-0 py-4 font-medium text-xs md:text-sm uppercase text-gray-900 whitespace-nowrap dark:text-gray-400">
                                                {{$marca->observacao}}
                                            </th>
                                            
                                            <th scope="row" class="hidden lg:table-cell px-0 py-4 text-center font-medium text-xs md:text-sm uppercase {{ $marca->is_client ? 'text-blue-600 dark:text-blue-400' : 'text-gray-900' }} whitespace-nowrap dark:text-gray-400">
                                                {{ $marca->isCliente ? 'Sim' : 'Não' }}
                                            </th>
                
                                            <td class="flex items-center justify-center px-2 py-4">
                                                {{-- <x-button-wire wire:click="editMarca({{$marca->id}})" wire:key="{{ $marca->id }}" label="Cancel" right-icon="trash" outline hover="warning" focus:solid.gray /> --}}
                                                @can('EDIT-MARCA', $permissao)
                                                    <a wire:click="editMarca({{$marca->id}})" wire:key="{{ $marca->id }}" type="button" class="font-medium text-blue-600 dark:text-blue-400 hover:underline ms-3 cursor-pointer">Editar</a>                       
                                                @endcan

                                                @can('DEL-MARCA', $permissao)
                                                <a wire:click="confirmSimple({{ $marca->id }},{{$marca->referencia}})" {{-- wire:click="remove({{ $marca->id }})" --}} wire:key="{{ $marca->id }}" class="font-medium text-red-600 dark:text-red-400 hover:underline ms-3 cursor-pointer">Remover</a>
                                                @endcan
                                            </td>
                                            
                                        </tr>
                                    @empty
                                            <tr>
                                             
                                                <th>
                                                   <h1 class="text-red-600 dark:text-red-400">Nada encotrado!</h1>                                                    
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
                             @can('DEL-MARCA', $permissao)
                            <button  wire:click="removeSelected" type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                Remover selecionado(s)
                                <span class="inline-flex items-center justify-center  h-4 ms-2 p-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">
                                {{ $totalselected }}
                                </span>
                            </button>
                            @endcan
                            
                            <div>
                                <h1 class="dark:text-green-400">Total registros: {{ $marcaList->count() }}</h1>
                            </div>

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
