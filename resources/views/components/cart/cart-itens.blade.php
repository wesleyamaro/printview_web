<div class="mb-2 p-2 rounded-md bg-gray-200 dark:bg-slate-900">

    <!-- Camada 1 - inicio-->
    <div class="flex justify-between">
        <div class="flex justify-between gap-x-2">
            <div class="">                              
                <span class="text-sm md:text-base font-bold text-gray-600 dark:text-gray-400">
                    Itens: {{$produtos_cart->count()}}
                </span>
            </div>
        </div>

        {{-- <div class="">
            <div class="flex justify-between">
                <x-checkbox-wire label="Add correia" wire:click="$toggle('correia')" value="right-label" />
                <x-checkbox-wire label="Qnde Igual" wire:model="model1" value="right-label" />
            </div>
        </div> --}}

        <div>
            <x-button-wire wire:click="questiondeleteAllCart" wire:loading.attr="disabled" negative xs icon="trash" label="Limpar carrinho" spinner />
        </div>

    </div>
    <!-- Camada 1 - fim-->

    <!-- Camada 2 - inicio-->
    <div x-data="{ isOpen: false, valorAplicar: '' }" class="mt-3">
        <button @click="isOpen = !isOpen"  type="button" class="w-full px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
            Atualizar quantidade de todos
        </button>
        <div x-show="isOpen" class="popover" id="popover" @click.away="isOpen = false">    
            <div class="mb-3 mt-5">
                <x-input-wire id="valoritens" wire:model="valoritens" oninput="this.value = this.value.replace(/[^0-9]/g, '')"  label="Qnde a ser aplicado a todos os itens do carrinho" placeholder="0000" class="text-center" />
            </div>            
            <div class="flex justify-between gap-x-4">
                <button onclick="aplicarQuantidade()" wire:click="updateItemCart"  class="bg-blue-500 text-white px-4 py-2 rounded" type="button">Aplicar quantidade</button>
                <button @click="isOpen = false" class="bg-yellow-500 text-white px-4 py-2 rounded" type="button">Fechar</button>   
            </div>         
        </div>
    </div>
    <!-- Camada 2 - fim-->

</div>

@if (session()->has('error'))
    <div class="alert bg-red-600 text-white mb-2">
        {{ session('error') }}
    </div>
@endif

<div {{-- x-data="{ isOpen: false, referenciaPopeuve: '', imgPopeuve: '' }" --}} class="px-1 md:px-0 bg-gray-50 dark:bg-gray-800 md:p-2 rounded-lg ">
  
    
    @foreach ($produtos_cart as $item)
    <div x-data="{ isOpen: false }" class="flex items-center justify-between py-2 gap-x-3 text-center border-dashed border-b-2 border-gray-300 dark:border-gray-600">
        <div class="w-3/12 text-center">
            <img @click="openModal = true; 
            imgModal = '{{ !empty($item->imagem_cliente) ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produto->imagem}") }}'; 
            referenciaModal = '{{ $item->produto->referencia }}'";
            class="cursor-pointer w-10 rounded-lg m-auto" 
            src="{{ !empty($item->imagem_cliente) ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produto->imagem}") }}"          
            class="cursor-pointer w-10 rounded-lg m-auto" src="{{ !empty($item->imagem_cliente) ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produto->imagem}") }}" alt="imagem"/>
            <h1 class="truncate text-gray-600 dark:text-gray-100 text-xs md:text-sm text-center w-full uppercase">{{ $item->produto->referencia }}</h1>
        </div>


 
        



            {{-- <button   @click="isOpen = !isOpen"  class="mx-8 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                <svg class="w-5 h-5 text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 17-4-4-4 4m8-6-4-4-4 4"/>
                </svg>
            </button>

            <div x-show="isOpen" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 dark:bg-slate-900 border-4 border-slate-500 w-9/12 px-8 py-5 rounded-md shadow-lg backdrop-blur-md z-50">
                
                <div>
                    <img src="{{ !empty($item->imagem_cliente) ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produto->imagem}") }}" alt="Imagem do modal" class="mx-auto w-20 h-20 rounded-lg" oncontextmenu="return false;">                       
                    <span class="text-blue-400 text-sm">{{ $item->produto->referencia }}</span>
                </div>

                <div>
                    <x-native-select
                        label="Select Status"
                        placeholder="Select one status"
                        :options="['Active', 'Pending', 'Stuck', 'Done']"
                    />
                </div>

                <button @click="isOpen = false" class="mt-4 bg-red-500 text-white px-4 py-2 w-full rounded">Fechar</button>
            </div> --}}

           
        


        {{-- <div class="block w-6/12 text-center items-center">
             <div class="flex gap-x-2 w-40 m-auto">
                <x-button-wire wire:click="addsubqnde({{ $item->produto->id }})" sm dark  icon="minus-sm" />
                <div class="w-20 text-center">
                    <x-input-wire name="quantidade" id="quantidade{{ $item->produto->id }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" id="addCount" wire:model.live="quantidade.{{ $item->produto->id }}" wire:keydown="atualizarQuantidade({{ $item->produto->id }})"  placeholder="0000" class="text-center"/>
                </div>                        
                <x-button-wire wire:click="addsumqnde({{ $item->produto->id }})" sm dark  icon="plus-sm" />
             </div>
        </div> --}}

        <div class="block md:w-6/12 sm:w-full text-center items-center">
            
            <form class="max-w-xs mx-auto">
                <div class="relative flex items-center max-w-[8rem]">
                    <button wire:click="addsubqnde({{ $item->produto->id }})" type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-1.5 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                        </svg>
                    </button>

                    <input name="quantidade" id="quantidade{{ $item->produto->id }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')"  type="text" wire:model.live="quantidade.{{ $item->produto->id }}" wire:keydown="atualizarQuantidade({{ $item->produto->id }})" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 w-14 h-8 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-blue-300 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="000" required>
                    
                    <button wire:click="addsumqnde({{ $item->produto->id }})" type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-1.5 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                </div>
                
            </form>

        </div>


        @can('CORREIA-PEDIDO', $permissao)
        <div class="w-64 md:w-full">
    
             {{-- <select wire:model.live="correiacor.{{ $item->produto->id }}" wire:key="{{ $item->produto->id }}"  class=" block w-full p-1 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-blue-300 dark:focus:ring-slate-500 dark:focus:border-slate-500">
             <option  selected>{{ !empty($item->correiacor) ? $item->correiacor : 'Cor correia' }}</option>
             <option value="{{ $item->produto->id }}-Amarelo">Amarelo</option>
             <option value="{{ $item->produto->id }}-Azul">Azul</option>
             <option value="{{ $item->produto->id }}-Branco">Branco</option>
             <option value="{{ $item->produto->id }}-Dourado">Dourado</option>
             <option value="{{ $item->produto->id }}-Preto">Preto</option>
             <option value="{{ $item->produto->id }}-Prata">Prata</option>
             <option value="{{ $item->produto->id }}-Pink">Pink</option>
             <option value="{{ $item->produto->id }}-Rosa">Rosa</option>
             <option value="{{ $item->produto->id }}-Rosa">Roxa</option>
             <option value="{{ $item->produto->id }}-Transparente">Transparente</option>
             <option value="{{ $item->produto->id }}-Vermelho">Vermelho</option>
             <option value="{{ $item->produto->id }}-Verde">Verde</option>
             </select> --}}
             <input wire:model.live="correiacor.{{ $item->produto->id }}" wire:key="{{ $item->produto->id }}"  type="text" id="small-input" placeholder="Qual cor correia?"  oninput="this.value = this.value.replace(/[0-9]/g, '')" class="capitalize text-xs block w-full p-1.5 text-blue-600 dark:text-blue-400 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-gray-500 dark:focus:border-gray-500">
             
         </div>
         @endcan
        

        

        <div class="w-3/12 text-center flex items-end justify-center">
            <a class="text-red-500 cursor-pointer" wire:click="showConfirmeRemoveItem({{ $item->produto->id }},{{$item->id}})">
                <svg class="w-4 h-4 text-red-500 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                </svg>
            </a>
        </div>


    </div>
@endforeach
{{--  </div> --}} 




<script>
    function aplicarQuantidade() {
        // Obtenha o valor digitado no input com id="valoritens"
        var valorItens = document.getElementById('valoritens').value;

        // Itera sobre os inputs com name="quantidade" e atualiza seus valores
        var inputsQuantidade = document.querySelectorAll('[name="quantidade"]');
        inputsQuantidade.forEach(function(input) {
            input.value = valorItens;
        });

        // Fecha o popover
        fecharPopover();

    }
    function fecharModal() {
        // Emite um evento personalizado para fechar o modal
        document.dispatchEvent(new CustomEvent('fechar-modal'));
    }

    function fecharPopover() {
        
        document.dispatchEvent(new CustomEvent('fechar-modal'));
         // Acessa a variável isOpen associada ao componente Alpine.js
         var componente = document.querySelector('[x-data="{ isOpen: false }"]');
        
        // Modifica o valor da propriedade isOpen para false
        if (componente) {
            componente.__x.$data.isOpen = false;
        }
    }
</script>






<!-- Alpine.js Modal -->
 <div x-show="openModal" @click.away="openModal = false" class="z-50 fixed inset-0 overflow-y-auto" style="display: none;">     
    <div class="flex items-start justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-slate-600 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div @click.away="openModal = false" x-show="openModal" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full p-2" style="width: 100%;">
            <div class="m-auto max-h-50v w-10/12">
                <img :src="imgModal" alt="Imagem do modal" class="mx-auto w-full max-h-80 md:max-h-96 md:w-80 md:h-700p rounded-lg" oncontextmenu="return false;">
            </div>
            <div class="text-center bg-gray-300 p-2 rounded-sm">
                <h1 x-text="referenciaModal" class="font-semibold">0000</h1>
            </div>
        </div>
    </div>
</div>

</div>