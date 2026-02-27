<div>
    {{-- <x-notifications z-index="z-50" />
        <x-dialog z-index="z-50" blur="md" align="center" /> --}}
    
    
    
    <div class="">

        <div class="grid grid-cols-12 gap-x-1">
          
            <!--Div cabeçalho inicio -->
            <div class="col-span-full flex justify-between p-2 mb-2 rounded-md bg-gray-950">

                 <!--Div pedido inicio -->
                <div class="w-full md:w-auto flex justify-between">
                    

                    @can('EDIT-PEDIDO', $permissao)
                        <div class="md:hidden">
                            <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Pedido nº:  <span class="font-bold dark:text-green-400">{{ str_pad($idpedido, 4, '0', STR_PAD_LEFT)  }}</span> </h1>
                            <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Modelo nº:  <span class="font-bold dark:text-blue-400">{{ $pedido_modelo }}</span> </h1>
                        </div>
                        <div class="hidden md:block">
                            <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Pedido nº:  <span class="font-bold dark:text-green-400">{{ str_pad($idpedido, 4, '0', STR_PAD_LEFT)  }}</span> </h1>
                            <div class="flex gap-x-2 items-center rounded-md md:w-60">                   
                                <strong class="flex font-bold dark:text-gray-300 text-nowrap text-sm md:text-base">Modelo nº:</strong>
                                {{-- <x-input-wire wire:model="pedido_modelo" placeholder="0000" tabindex="2"/> --}}
                                <input wire:model="pedido_modelo" placeholder="0000" tabindex="2" type="text" class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                            </div> 
                        </div>                                       
                    @else
                   {{--  <span class="text-gray-500"> / </span>
                    <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Modelo nº:  <span class="font-bold dark:text-blue-400">{{ $pedido_modelo }}</span> </h1> --}}
                    
                    <div class="{{-- md:hidden --}}">
                        <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Pedido nº:  <span class="font-bold dark:text-green-400">{{ str_pad($idpedido, 4, '0', STR_PAD_LEFT)  }}</span> </h1>
                        <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Modelo nº:  <span class="font-bold dark:text-blue-400">{{ $pedido_modelo }}</span> </h1>
                    </div>
                    @endcan

                    
                    <div class="md:hidden">
                        <x-button-wire label="Fechar" icon="x-circle" warning wire:click="$toggle('myModal')" />                           
                    </div>

   

                </div>
                <!--Div pedido fim -->

                <!--Div user inicio -->
                <div class="hidden md:flex gap-x-2">
                    <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Jese image">
                    <div class="ps-3 cursor-pointer" x-on:click="$openModal('simpleModal')">
                        <div class="text-base font-semibold dark:text-gray-300">{{ $username }}</div>
                        <div class="font-normal text-gray-500">{{ $useremail }}</div>
                    </div>  
                </div>
                <!--Div user fim -->

            </div>
            <!--Div cabeçalho fim -->

            
            <!--Div info inicio -->
            <div class="col-span-full">


                <div class="flex flex-col space-y-3 mb-3">

                    <div class="w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2" >
                        <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Total de itens: 
                            <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> {{ $itens_qnde }}</h1>
                        </strong>
                        <hr class="border border-slate-300 dark:border-slate-600 border-dashed my-2">
                        <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Qnde total de pares: 
                            <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> {{ $pares_qnde }}</h1>
                        </strong>
                    </div>
                            


                    @can('EDIT-PEDIDO', $permissao)
                        
                        

                        <div class="hidden md:block space-y-2 items-center w-full ">

                            <div class="hidden md:flex w-80 rounded-md ">
                                <x-input-wire wire:model="marca" label="Marca:" placeholder="****" /> 
                            </div>
                                                        
                            <div class="w-full">
                                {{-- <x-textarea-wire label="Observações" placeholder="Observação do pedido" wire:model="observacao" class="w-96"/> --}}
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Observação</label>                            
                                <textarea wire:model="observacao"  rows="4" class="max-h-20 overflow-y-auto soft-scrollbar block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-blue-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Observação do pedido..."></textarea>
                            </div>
                        </div>
                            
                    @endcan

                    <div class=" flex md:hidden gap-x-2 w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md  p-2">
                        <h1 class="text-gray-600 dark:text-gray-400 text-sm md:text-base">Marca:</h1>
                        <span class="text-blue-600 dark:text-blue-400 text-sm md:text-base" >{{$marca}}</span>
                    </div>

                    <div class="w-full md:hidden max-h-40 overflow-y-auto soft-scrollbar border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md  p-2">
                        <h1 class="text-gray-600 dark:text-gray-400 text-sm md:text-base">Observação:</h1>
                        <span class="text-yellow-600 dark:text-yellow-300 text-sm md:text-base" >{{$observacao}}</span>
                    </div>
    
                </div>

            </div>
            <!--Div info fim -->

         

            <div class="col-span-full grid grid-cols-12 md:flex md:flex-wrap gap-1 md:gap-1.5 w-full border-4 md:border-8 border-slate-900 bg-slate-500  max-h-96 soft-scrollbar overflow-y-auto rounded-md p-1">
                @foreach ($itenspedidoList as $item)
                <div class="col-span-4 md:w-38  bg-gray-50  rounded-md border-8 border-slate-700 shadow-md">
                    <img
                    @click="openModal = true; 
                    imgModal = '{{ $item->imagem_cliente ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produtos->imagem}") }}'; 
                    referenciaModal = '{{ $item->produto->referencia }}'";
                    class="w-20 min-h-24 max-h-24 md:w-24 md:min-h-32 md:max-h-32 rounded-md mx-auto cursor-pointer" src="{{ $item->imagem_cliente ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produtos->imagem}") }} " alt="transfer">  
                

                    <!--Input quantidade inicio -->
                    <div class="hidden md:block rounded-b-sm p-1 mt-1 bg-slate-700">
                    @can('EDIT-PEDIDO', $permissao)
                    <!--usando alpinejs contador inclement input-->
                    <div x-data="{ quantity: @entangle('quantities.' . $item->produto->id) }" class="flex justify-center  md:gap-x-1">
                        {{-- <x-button-wire @click="quantity = Math.max(0, quantity - 1)" id="subqnde" sm light secondary icon="minus-sm" /> --}}

                        <button @click="quantity = Math.max(0, quantity - 1)" id="subqnde" type="button" class="px-2 py-1 text-sm font-medium text-center inline-flex items-center text-white bg-gray-400 rounded-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/>
                            </svg>
                        </button>

                        <div class="w-16 text-center">
                            <input
                                x-model="quantity"
                                @input="quantity = quantity.replace(/[^0-9]/g, '')"
                                class="block w-16 p-1 md:p-2 text-center text-blue-300 border border-slate-600 rounded-lg bg-slate-700 sm:text-xs focus:ring-gray-500 focus:border-gray-500 dark:bg-slate-700 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-slate-500 dark:focus:border-slate-500"
                                placeholder="000"
                                required>
                        </div>
                        {{-- <x-button-wire @click="quantity = quantity + 1" id="addqnde" sm light secondary icon="plus-sm"/> --}}
                        <button @click="quantity = quantity + 1" id="addqnde" type="button" class="px-2 py-1 text-sm font-medium text-center inline-flex items-center text-white bg-gray-400 rounded-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                              </svg>
                        </button>                        
                    </div>
                    @else
                        <h1 class="text-green-600 dark:text-green-400 text-center">{{ $item->quantidade}}</h1>
                    @endcan
                    </div>

                    <div class="md:hidden text-center bg-gray-600 rounded-b-md">
                        <h1 class=" text-green-600 dark:text-green-400 text-center">{{ $item->quantidade}}</h1>
                    </div>
                    
                    <!--Input quantidade fim -->
                
                </div>
                @endforeach
            </div>



        </div>

    </div>

    {{-- <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
        
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
                        <img 
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
    </table> --}}
    
    
    
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