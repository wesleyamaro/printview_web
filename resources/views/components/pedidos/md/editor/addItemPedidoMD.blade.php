   
     <div class="bg-orange-600 rounded-lg p-3">
        <h1 class="text-white">Adicione produtos ao pedido atual.</h1>
    </div>

     <!--Div cabeçalho inicio -->
     <div class="col-span-full flex justify-between p-2 mb-2 rounded-md bg-gray-300 dark:bg-gray-950">
        <div>
            <form wire:submit="searchEstampas" class="flex gap-x-3">
                <x-input-wire wire:model="searchEstampa" icon="search" placeholder="Pesquisar estampa"/>
                <x-button-wire type="submit" light positive label="Pesquisar" />
            </form>      
        </div>
   <!--Div cabeçalho fim -->
   </div>

   <div x-data="{ showModal: false }" class="flex flex-wrap mt-10 dark:bg-slate-800 p-5 rounded-md">
    @forelse ($estampas as $item)

        <div class="w-40 bg-gray-300 dark:bg-slate-700 rounded-md p-3 flex flex-col justify-center text-center shadow-2xl">
            <div class="font-bold  text-center text-blue-600 dark:text-emerald-400 mb-1">
                <h1>{{ $item->referencia }}</h1>
            </div>
            <div class="rounded-t-lg bg-white flex justify-center">
                <img @click="showModal = true" 
                
                 src="{{ $item->imagem ? asset('storage/' . $item->imagem) : 'https://cdn1.staticpanvel.com.br/produtos/15/produto-sem-imagem.jpg' }}"  alt="Produto sem foto. Avise-nos!" class=" md:h-36 rounded-t-lg cursor-pointer" oncontextmenu="return false;" />
            </div>
            
            <div class="flex w-full">
                <x-button-wire wire:click="addProdutoPedido({{ $item->id }})" wire:loading.attr="disabled" wire:key="{{ $item->id }}" light cyan label="Adicionar ao pedido" class="w-full"/>
            </div>
        </div>        
   


    <!-- Alpine.js Modal -->
    <div x-show="showModal" @click.away="showModal = false" class="z-50 fixed inset-0 overflow-y-auto" style="display: none;">
                  
        <div class="flex items-start justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div @click.away="showModal = false" x-show="showModal" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full p-2" style="width: 100%;">
                <div class="p-2 bg-gray-200 rounded-lg">
                    <h1 class="text-center font-bold text-green-600">{{ $item->referencia }}</h1>
                </div>
                <div>
                    <img src="{{ url("storage/{$item->imagem}") }}" alt="" class="mx-auto md:h-700p rounded-lg" oncontextmenu="return false;">
                </div>   
            </div>        
        </div>
    </div>
    <!--Alpine.js Modal - Fim -->

    @empty
        <h1 class="text-red-600 dark:text-red-400">Nenhuma produto encotrado.</h1>
    @endforelse
</div>