{{-- <div>
    <h1 class="text-yellow-500 ">Aqui está listando todos as estampas que já foram solicitada em algum pedido</h1>

    <div class="p-2">
        <x-input-wire wire:model="searchItensUsados" wire:keydown.enter="consultarItensPedido" icon="search" placeholder="pesquise a estampa..."/>
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
                                Referência.
                                <a wire:click="sortBy('referencia')" href="#" class="cursor-pointer"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-0 py-3">
                            <div class="flex items-center">
                                Pedido ID
                                <a href="#" class="cursor-pointer"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                            </div>
                        </th>

                        <th scope="col" class="px-0 py-3">
                            <div class="flex items-center">
                                Cliente
                                <a href="#" class="cursor-pointer"></a>
                            </div>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($transfersUsedPedidos as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">                                          
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                          
                            <td scope="row" class="px-2 py-4 font-medium text-xs md:text-sm uppercase text-cyan-900 whitespace-nowrap dark:text-cyan-400">
                                {{ $item->produto->referencia }}
                            </td>
                            <th scope="row" class="px-0 py-4 font-medium text-xs md:text-sm uppercase text-gray-900 whitespace-nowrap dark:text-gray-400">
                                {{ $item->pedido_id }}
                            </th>

                            <th scope="row" class="px-0 py-4 font-medium text-xs md:text-sm uppercase text-gray-900 whitespace-nowrap dark:text-gray-400">
                                {{ $item->usuarios->name }}
                            </th>
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
        
    </div>

</div> --}}

<div>
    <h1 class="text-yellow-500">Listagem de estampas solicitadas em pedidos</h1>

    <div class="p-2">
        <x-input-wire wire:model.live="searchItensUsados" wire:keydown.enter="consultarItensPedido" icon="search" placeholder="Pesquise a estampa..."/>

        @if(count($transfersUsedPedidos) > 0)
            <div class="mt-2 max-h-96 md:max-h-50v relative overflow-x-auto overflow-y-auto soft-scrollbar shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-3">Referência</th>
                            <th scope="col" class="px-2 py-3">Pedido ID</th>
                            <th scope="col" class="px-2 py-3">Cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transfersUsedPedidos as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-2 py-4 font-medium text-xs md:text-sm uppercase text-cyan-900 whitespace-nowrap dark:text-cyan-400">
                                    {{ $item->produto->referencia }}
                                </td>
                                <td class="px-2 py-4 font-medium text-xs md:text-sm uppercase text-gray-900 whitespace-nowrap dark:text-gray-400">
                                    {{ $item->pedido_id }}
                                </td>
                                <td class="px-2 py-4 font-medium text-xs md:text-sm uppercase text-gray-900 whitespace-nowrap dark:text-gray-400">
                                    {{ $item->usuarios->name }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="mt-4 text-red-600 dark:text-red-400">Nenhum item encontrado.</p>
        @endif
    </div>
</div>