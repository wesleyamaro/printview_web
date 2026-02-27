<div>
<x-notifications z-index="z-50" />
    <x-dialog z-index="z-50" blur="md" align="center" />


<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
    <thead class="sticky top-0 z-50 text-xs text-gray-700 uppercase bg-gray-300 dark:bg-slate-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="p-4 hidden md:table-cell">
                <div class="flex items-center">
                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                </div>
            </th>
            <th scope="col" class="px-2 py-3">
                <span class="md:hidden">Ref.</span> <span class="hidden md:flex">Referência</span>
            </th>

            <th scope="col" class="px-3 py-3 w-auto text-center">
                Imagem
            </th>
            <th scope="col" class="px-3 py-3 w-full text-center">
                Qnde(s)
            </th>
            @can('EDIT-PEDIDO', $permissao)
            <th scope="col" class="px-3 py-3 text-center">
                Ação
            </th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @forelse ($itenspedidoList as $item)                 
        
            <tr class="bg-white border-b dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-slate-950">
                <td class="w-4 p-4 hidden md:table-cell">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                
                <td class="px-2 py-2">                           
                    <h1 class="font-bold dark:text-green-400">{{ $item->produto->referencia }}</h1>
                </td>

                <th scope="row" class="px-3 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                    <img {{-- x-on:click="$openModal('simpleModal')" --}}
                    @click="openModal = true; 
                    imgModal = '{{ $item->imagem_cliente ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produtos->imagem}") }}'; 
                    referenciaModal = '{{ $item->produto->referencia }}'";
                    class="w-20 h-auto rounded-sm mx-auto cursor-pointer" src="{{ $item->imagem_cliente ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produtos->imagem}") }} " alt="Jese image">  
                </th>

                <td class="px-3 py-2 text-center">
                    @can('EDIT-PEDIDO', $permissao)

                    <!--usando alpinejs contador inclement input-->
                    <div x-data="{ quantity: @entangle('quantities.' . $item->produto->id) }" class="flex gap-x-2">
                        <x-button-wire @click="quantity = Math.max(0, quantity - 1)" id="subqnde" sm dark icon="minus-sm" />
                        <div class="w-20 text-center">
                            <input
                                x-model="quantity"
                                @input="quantity = quantity.replace(/[^0-9]/g, '')"
                                class="text-center bg-gray-50 border border-gray-300 text-green-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 md:p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-green-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="000"
                                required
                            >
                        </div>
                        <x-button-wire @click="quantity = quantity + 1" id="addqnde" sm dark icon="plus-sm"/>
                    </div>
                    
                    
                    

                    @else
                    <h1 class="text-green-600 dark:text-green-400">{{ $item->quantidade}}</h1>
                    @endcan
                </td>

                @can('EDIT-PEDIDO', $permissao)
                <td class="px-3 py-2 text-center">
                    <a href="#" title="Remover item do pedido" wire:click="delItem({{$item->id}})" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remover</a>
                </td>
                @endcan
            </tr>

        @empty
            <div class="col-span-full">
                <h1 class="text-red-500">Nenhum pedido encontrado.</h1>
            </div>
        @endforelse
        
    </tbody>
</table>



<!-- Alpine.js Modal -->
<div x-show="openModal" @click.away="openModal = false" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-slate-600 opacity-75"></div>
    </div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div @click.away="openModal = false" x-show="openModal" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full p-2">
        <div class="m-auto">
            <img :src="imgModal" alt="Imagem do modal" class="mx-auto w-full max-h-80 md:max-h-96 md:w-80 rounded-lg" oncontextmenu="return false;">
        </div>
        <div class="text-center bg-gray-300 p-2 rounded-sm">
            <h1 x-text="referenciaModal" class="font-semibold">0000</h1>
        </div>
    </div>
</div>
<!--Alpine.js Modal - Fim -->


</div>