<div>
    <div class="py-1 px-2 md:p-5 dark:bg-slate-950">
        <h1 class="text-2xl font-bold text-orange-500 dark:text-orange-400">Pedidos - Prefeituras</h1>
    </div>
    <div class="flex gap-x-2 p-2 md:mx-5 md:mt-2 md:rounded-md md:p-5 dark:bg-slate-800">
        <div class="w-60">
            <x-input-wire wire:model.live="search" icon="search" placeholder="Município..." />
        </div>
        <div class="w-60">
            <x-select wire:model.live="gabarito" placeholder="Selecione gabarito" 
            :options="['Etiq. Língua', 'Velcro 023', 'Velcro 018', 'Papete','Gorgurão']"
        />
        </div>
    </div>
    <div class=" p-2 md:p-5 space-y-2">
        @foreach ($pedidos as $pedido)
        <div class="grid grid-cols-12 {{-- flex --}} p-2 md:p-5 dark:bg-slate-700 rounded-lg cursor-pointer">

            <div class="col-span-9 space-y-1 pr-2" wire:key="{{ $pedido->id }}" wire:click="showModal({{ $pedido->id }})">
                <h1 class="font-bold text-cyan-400 text-sm">PEDIDO #{{ $pedido->id }}</h1>
                <h1 class="font-bold dark:text-gray-300 text-sm">MUNICÍPIO: <Span class="uppercase dark:text-green-400">{{ $pedido->municipios->nome .' - '. $pedido->municipios->uf }}</Span></h1>
                <h1 class="font-bold truncate dark:text-gray-300 text-xs">GABARITOS: <Span class="font-mono uppercase dark:text-blue-400 truncate">{{ $pedido->gabaritos }}</Span></h1>
            </div>

            <div class="col-span-3 text-end">
                <h1 class="text-xs font-bold text-gray-600 dark:text-gray-300">STATUS: </h1>
                <span class="text-xs uppercase text-green-600 dark:text-green-400">{{ $pedido->status }}</span>
                <h1 class="text-xs text-gray-600 dark:text-blue-300">{{ $pedido->created_at->format('d/m/Y') }}</h1>
            </div>
            
           {{--  @if ($pedido->imagens_cliente)

                <div class="hidden md:flex gap-x-2">
                    @php
                        $imagensCliente = json_decode($pedido->imagens_cliente, true);
                        if (!is_array($imagensCliente)) {
                            $imagensCliente = [];
                        }
                    @endphp

                    @foreach ($imagensCliente as $caminhoImagem)
                        <img src="{{ asset('storage/prefeituras/imagens_pedidos/' . $caminhoImagem) }}" alt="Imagem do Pedido" class="md:w-24 rounded-md">
                    @endforeach
                </div>
            @endif --}}



        </div>
        
    @endforeach

                <!--MODAL COM OS ITENS DO PEDIDO-->
                <x-modal name="simpleModal" wire:model="myModal" maxWidth="8xl">

                    <div class="flex items-center justify-between p-2 dark:bg-slate-900 md:border-8 border-t-4 border-x-4 border-gray-200 dark:border-slate-700">
                        <h1 class="font-bold text-cyan-600 dark:text-cyan-400">PEDIDO #{{ $idpedido }}</h1>  

                        <div class="flex gap-x-1">
                            <img class="w-8 h-8 rounded-full" src="{{ $fotoUserEdit ? asset('storage/' . $fotoUserEdit) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                                            alt="Sem foto">
                                            <div>
                            <h1 class="text-sm font-bold text-gray-600 dark:text-gray-400 capitalize truncate">{{ $usernameEdit }}</h1>
                            <h1 class="text-xs text-gray-600 dark:text-gray-400 capitalize truncate ">{{ $emailEdit }}</h1>
                        </div>
                        </div>
                        
                    </div>
    
                    <div class="p-2 md:p-5 border-4 md:border-8 border-gray-200 dark:border-slate-700">
                        
                        <div class="mb-5">
                           
                            <h1 class="font-bold text-gray-500 dark:text-gray-400">MUNICÍPIO: <Span class=" uppercase dark:text-green-400">{{ $municipioEdit }}</Span></h1>    
                            <h1 class="font-bold text-gray-500 dark:text-gray-400">GABARITOS: <Span class=" uppercase dark:text-blue-400">{{ $gabaritoEdit }}</Span></h1>
                            <hr class="my-2 border-gray-400 dark:border-gray-600 border-dashed">
                            <h1 class="font-bold text-gray-500 dark:text-gray-400">OBSERVAÇÃO: </h1>           
                            <Span class=" uppercase dark:text-green-400">{{ $observacaoEdit }}</Span>
                            <hr class="my-2 border-gray-400 dark:border-gray-600 border-dashed">
                            
                        </div>
                        <div class="grid grid-cols-12 md:flex justify-between mt-2">
    
                             @if ($itemspedidoList)
    
                                <div class="col-span-4 md:col-span-2 flex gap-x-2">
                                    @php
                                        $imagensCliente = json_decode($itemspedidoList->imagens_cliente, true);
                                        if (!is_array($imagensCliente)) {
                                            $imagensCliente = [];
                                        }
                                    @endphp
    
                                    @foreach ($imagensCliente as $caminhoImagem)
                                        <img src="{{ asset('storage/prefeituras/imagens_pedidos/' . $caminhoImagem) }}" alt="Imagem do Pedido" class="md:w-24 rounded-md">
                                    @endforeach
                                </div>
                            @endif
                            
    
                        </div>
                    </div>
    
                </x-modal>
                <!--FIM MODAL ITENS PEDIDO -->

    </div>
</div>
