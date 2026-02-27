<div>
    <div class="bg-gray-100 dark:bg-gray-900 min-h-screen font-inter">
         <!-- Header do Carrinho -->
         <div class="bg-white dark:bg-gray-800 p-2 md:p-4 rounded-lg shadow-sm mb-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">


                    <div class="bg-blue-100 dark:bg-blue-900 p-2 rounded-lg flex items-center gap-2 w-full md:w-60">
                        <i class="fa-solid fa-cart-shopping text-blue-600 dark:text-blue-400"></i>
                        <h1 class="text-xl font-bold text-gray-800 dark:text-gray-200">Seu Carrinho</h1>
                    </div>

                    <div class="flex items-center justify-between gap-2 w-full">
                    <div class="w-5 hidden md:block"></div>
                    <div class="w-36 md:w-60">
                       
                        <div class="px-2 py-2 bg-gray-200 dark:bg-gray-700 rounded-lg flex justify-between">
                            <span class="text-sm md:text-lg font-medium text-gray-600 dark:text-gray-400">
                                Itens: {{$produtos_cart->count()}}
                            </span>
                            <span class="text-sm md:text-lg font-medium text-gray-600 dark:text-gray-400">
                                Total: {{$produtos_cart->sum('quantidade')}}
                            </span>
                        </div>

                    </div>

                    <button wire:click="questiondeleteAllCart" wire:loading.attr="disabled" 
                        class="flex items-center gap-2 px-2 md:px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Limpar carrinho
                    </button>

                </div>

                
            </div>

            <div x-data="{ isOpen: false }" class="mt-4">
                <button @click="isOpen = !isOpen" type="button" class="w-full px-4 py-2.5 text-sm font-semibold text-center text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:ring-indigo-700 transition-colors duration-150 shadow-md">
                    Atualizar Quantidade de Todos os Itens
                </button>
                <div x-show="isOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="mt-3 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-lg" @click.away="isOpen = false">
                    <div class="mb-4">
                        <x-input-wire id="valoritens" wire:model="valoritens" oninput="this.value = this.value.replace(/[^0-9]/g, '')" label="Quantidade a ser aplicada a todos os itens" placeholder="Ex: 10" class="text-center" />
                    </div>
                    <div class="flex flex-col sm:flex-row justify-end gap-3">
                        <button @click="isOpen = false; aplicarQuantidade()" wire:click="updateItemCart" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded-lg shadow-md transition-colors duration-150 text-sm" type="button">Aplicar Quantidade</button>
                        <button @click="isOpen = false" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-4 py-2 rounded-lg shadow-md transition-colors duration-150 text-sm" type="button">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    
        @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6 shadow-md" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @endif
    
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg p-2 md:p-6">

            @if ($produtos_cart->isEmpty())
                <p class="text-center text-gray-500 dark:text-gray-400 py-8">Seu carrinho está vazio.</p>
            @else
                <div class="space-y-6">
                    @foreach ($produtos_cart as $item)
                    <div wire:key="item-{{ $item->id }}" x-data="{}" class="relative bg-gray-50 dark:bg-gray-700/50 p-2 md:p-4 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl">
                        <div class="absolute top-3 right-3">
                            <button class="text-red-500 hover:text-red-700 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-700/30 p-1.5 sm:p-2 rounded-full transition-colors duration-150" wire:click="showConfirmeRemoveItem({{ $item->produto->id }},{{$item->id}})" title="Remover item">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v11a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm8 14H3V6h12v10Zm-7-1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 1 1 2 0v5Zm4 0a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V9a1 1 0 0 1 2 0v5Z"/>
                                </svg>
                            </button>
                        </div>
    
                        <div class="flex flex-row items-center gap-3">
                            <div class="w-24 h-24 md:w-28 md:h-28 flex-shrink-0 bg-gray-200 dark:bg-gray-600 rounded-lg overflow-hidden flex items-center justify-center p-1">
                                <img @click="openModal = true;
                                    imgModal = '{{ !empty($item->imagem_cliente) ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produto->imagem}") }}';
                                    referenciaModal = '{{ $item->produto->referencia }}';"
                                    class="max-w-full max-h-full object-contain cursor-pointer rounded-md"
                                    src="{{ !empty($item->imagem_cliente) ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produto->imagem}") }}"
                                    alt="Imagem {{ $item->produto->referencia }}"
                                    onerror="this.onerror=null; this.src='https://placehold.co/100x100/cccccc/ffffff?text=ImagemIndisponivel';" />
                            </div>
    
                            <div class="flex-grow flex flex-col gap-2 text-center sm:text-left w-full sm:w-auto">
                                <h3 class="truncate text-gray-700 dark:text-gray-200 text-base md:text-lg font-semibold uppercase pr-8 sm:pr-10"> {{ $item->produto->referencia }}
                                </h3>
    
                                <form class="mx-0">
                                    <div class="relative flex items-center max-w-[10rem] justify-center sm:justify-start">
                                        <button wire:click="addsubqnde({{ $item->produto->id }})" type="button" class="bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-300 font-bold p-2 h-10 rounded-l-lg transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                            </svg>
                                        </button>
                                        <input name="quantidade" id="quantidade{{ $item->produto->id }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" type="text" wire:model.live="quantidade.{{ $item->produto->id }}" wire:keydown="atualizarQuantidade({{ $item->produto->id }})" class="bg-white dark:bg-gray-700 border-y border-gray-300 dark:border-gray-500 h-10 w-18 md:w-28 text-center text-blue-600 dark:text-blue-400 {{-- text-gray-900 dark:text-white --}} text-sm focus:ring-blue-500 focus:border-blue-500 block py-1.5" placeholder="0" required>
                                        <button wire:click="addsumqnde({{ $item->produto->id }})" type="button" class="bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-300 font-bold p-2 h-10 rounded-r-lg transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
    
                                {{-- @can('CORREIA-PEDIDO', $permissao) --}}
                                <div class="mt-2 w-full max-w-xs mx-auto sm:mx-0">
                                    @if($item->produto->tipo != 'termopatch')
                                        @cannot('PREFEITURA', $permissao)
                                            <input wire:model.lazy="correiacor.{{ $item->produto->id }}" wire:key="cor_{{ $item->produto->id }}" type="text" placeholder="Qual cor correia?" oninput="this.value = this.value.replace(/[0-9]/g, '')" class="capitalize text-xs block w-full p-2 text-blue-600 dark:text-blue-400 border border-gray-300 rounded-lg bg-white sm:text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                        @else
                                            <input wire:model.lazy="prefeitura_produto.{{ $item->produto->id }}" wire:key="prefeitura_produto{{ $item->produto->id }}" type="text" placeholder="Ex. Etiq. Lingua, velcro, termopatch" {{-- oninput="this.value = this.value.replace(/[0-9]/g, '')" --}} class="capitalize text-xs block w-full p-2 text-blue-600 dark:text-blue-400 border border-gray-300 rounded-lg bg-white sm:text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                        @endcannot
                                    @else
                                         <input wire:model.lazy="medida.{{ $item->produto->id }}" wire:key="medida_{{ $item->produto->id }}" type="text" placeholder="Medida Ex: 35x35" class="capitalize text-xs block w-full p-2 text-blue-600 dark:text-blue-400 border border-gray-300 rounded-lg bg-white sm:text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                    @endcan
                                </div>
                                {{-- @endcan --}}
                            </div>
    
                            </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    
        <div x-data="{ openModal: false, imgModal: '', referenciaModal: '' }" x-show="openModal" @keydown.escape.window="openModal = false" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="openModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity dark:bg-gray-900 dark:bg-opacity-80" @click="openModal = false"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div x-show="openModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full p-4">
                    <div>
                        <div class="mx-auto flex items-center justify-center h-auto max-h-[70vh] w-auto bg-gray-100 dark:bg-gray-700 rounded-lg overflow-hidden">
                            <img :src="imgModal" alt="Imagem do Produto Ampliada" class="object-contain max-h-[70vh] max-w-full rounded-lg" oncontextmenu="return false;">
                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100" id="modal-title" x-text="referenciaModal">
                                Referência do Produto
                            </h3>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6">
                        <button @click="openModal = false" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm dark:bg-indigo-500 dark:hover:bg-indigo-600">
                            Fechar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
    
        <div class="mt-8 bg-white dark:bg-gray-800 shadow-xl rounded-lg p-2 md:p-6">
            <h2 class="text-xl md:text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Informações do Pedido</h2>
            <div class="grid grid-cols-1 gap-6">

         
                {{-- @dd($produtos_cart->first()->produto->tipo); --}}
             
                @cannot('PREFEITURA', $permissao)
                {{-- @if($produtos_cart->isNotEmpty() && optional($produtos_cart->first()->produto)->tipo != 'termopatch') --}}
                @if($tipoProduto != 'termopatch')
                <div class="p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg shadow-sm">
                    <x-input-wire wire:model.live="marca" label="Marca*" placeholder="Em qual marca este pedido será feito?" />
                </div>
                @endif
                @endcannot
    
                @cannot('PREFEITURA', $permissao)
                {{-- @if($produtos_cart->isNotEmpty() && optional($produtos_cart->first()->produto)->tipo != 'termopatch') --}}
                @if($tipoProduto != 'termopatch')
                <div class="p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg shadow-sm">
                    <x-select label="Grupo*" wire:model.live="grupo" placeholder="Selecione o grupo do pedido" :options="['bebê', 'feminino', 'infantil', 'juvenil', 'masculino']" class="capitalize" />
                </div>
                @endif
                @endcannot
    
                @cannot('PREFEITURA', $permissao)
                {{-- @if($produtos_cart->isNotEmpty() && optional($produtos_cart->first()->produto)->tipo != 'termopatch') --}}
                @if($tipoProduto != 'termopatch')
                <div class="p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg shadow-sm">
                    <x-textarea-wire wire:model.live="grade" label="Grade*" placeholder="Qual a grade do pedido? Ex: 33/34:20, 35/36:40, 37/38:10, 39/40:20" {{-- class="h-24 min-h-[6rem]" --}} />
                </div>
                @endif
                @endcannot



                @can('PREFEITURA', $permissao)
                <div class="p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg shadow-sm">
                    <x-input-wire wire:model.live="prefeitura" label="Prefeitura*" placeholder="Qual prefeitura o pedido será feito?" />
                </div>
                @endcan
                                
                
                <div class="p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg shadow-sm">
                    <x-textarea-wire wire:model.live="observacao" label="Observação (Opcional)" rows="10" placeholder="Alguma observação sobre o seu pedido?"  />
                </div>
                
    
                <div class="p-2 md:p-4 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg">
                    <form wire:submit="salvarImagens" enctype="multipart/form-data">
                        <label class="block mb-3 p-3 rounded-lg text-sm font-medium text-amber-700 dark:text-amber-300 bg-amber-100 dark:bg-amber-800/60" for="dropzone-file">
                            Não encontrou a estampa desejada? Envie sua ideia e nós a desenvolvemos para você!
                        </label>
    
                        <div wire:loading wire:target="imagens" class="text-green-600 dark:text-green-400 flex flex-col items-center justify-center w-full my-4">
                            <img src="{{ asset('img/animations/animation-1709438932456.gif') }}" alt="Carregando..." class="w-24 h-24 mx-auto" > <h1 class="mt-2 text-center font-medium">Aguarde! Enviando suas imagens...</h1>
                        </div>
                        
                        <div class="flex items-center justify-center w-full" wire:loading.remove wire:target="imagens">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full py-8 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-500 dark:hover:border-gray-400 transition-colors duration-150">
                                <div class="flex flex-col items-center justify-center text-center">
                                    <svg class="w-10 h-10 mb-3 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Clique para carregar</span> ou arraste e solte</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 1024x840px)</p>
                                </div>
                               {{--  @can('MULTIPLE-UPLOAD', $permissao) --}}
                                <input wire:model="imagens" id="dropzone-file" type="file" class="hidden" multiple />
                               {{--  @elsecan('MENU-CARRINHO', $permissao)
                                <input wire:model.live="imagem" id="dropzone-file" type="file" class="hidden" />
                                @endcan --}}
                            </label>
                        </div>
                    </form>
                    <div class="flex justify-center w-full mt-2">
                        @error('imagens') <span class="bg-red-100 border border-red-400 text-red-700 px-3 py-1.5 rounded-md text-xs w-full text-center">{{ $message }}</span> @enderror
                        @error('imagem') <span class="bg-red-100 border border-red-400 text-red-700 px-3 py-1.5 rounded-md text-xs w-full text-center">{{ $message }}</span> @enderror
                    </div>
                </div>
    
                @if(!$imagens && !$imagem) 
                <div class="mt-6 mb-40">
                     <x-button-wire wire:click="showConfirmPedido" wire:loading.attr="disabled" color="teal" icon="check" label="Confirmar Pedido" spinner class="w-full py-3 text-base font-semibold" />
                </div>
                @endif
            </div>
        </div>
    
    </div> 
    
    <script>
        // Ensure this script is placed after Alpine.js is loaded if it's not already managed by Livewire.
        // The x-data for the modal is now self-contained in the modal's HTML.
        // The x-data for the "update all quantities" popover is also self-contained.
    
        function aplicarQuantidade() {
            // This function is called via @click, which also triggers wire:click.
            // Livewire should handle the update based on the bound model 'valoritens'.
            // The JavaScript manipulation of input values might conflict with Livewire's reactivity
            // if 'valoritens' is not the sole source of truth for Livewire.
            // Consider if this JS is still needed or if Livewire handles it all.
            // For now, keeping it as it was, but be mindful of Livewire's data binding.
    
            var valorItens = document.getElementById('valoritens').value;
            var inputsQuantidade = document.querySelectorAll('input[name="quantidade"]');
            inputsQuantidade.forEach(function(input) {
                // Check if the input is managed by Livewire. If so, directly setting .value
                // might be overridden or cause issues. It's often better to let Livewire update the DOM.
                // However, if this is for immediate visual feedback before Livewire syncs, it might be acceptable.
                if (input.getAttribute('wire:model.live')) {
                    // For Livewire inputs, it's better to dispatch an input event if you must set value via JS
                    // input.value = valorItens;
                    // input.dispatchEvent(new Event('input'));
                    // Or, ideally, the wire:click="updateItemCart" on the button handles this logic server-side.
                } else {
                    input.value = valorItens;
                }
            });
    
            // The popover closing is handled by @click="isOpen = false"
        }
    
        // The fecharModal and fecharPopover functions might not be needed if Alpine's @click.away
        // and direct state changes (isOpen = false) are used effectively.
        // I've removed them for now as the Alpine directives should handle this.
        // If you have specific use cases for them, they can be re-added.
    </script>
    
    
</div>