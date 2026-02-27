
<div x-data="{ openModal: false, imgModal: '', referenciaModal: '' }" class="grid grid-cols-12 gap-1 {{-- flex flex-wrap gap-1 --}} w-full border-4 md:border-8 border-slate-900 bg-slate-400 dark:bg-slate-900  {{-- max-h-96 soft-scrollbar overflow-y-auto--}} rounded-md p-1">
    
    @foreach ($itenspedidoList as $item)
    <div class="col-span-4 w-auto bg-gray-50  rounded-md border-8 border-gray-100 dark:border-slate-700 shadow-md">
        <img
        @click="openModal = true; 
        imgModal = '{{ $item->imagem_cliente ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produtos->imagem}") }}'; 
        referenciaModal = '{{ $item->produto->referencia }}'";
        class="w-24 min-h-28 max-h-28 rounded-md mx-auto cursor-pointer" src="{{ $item->imagem_cliente ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produtos->imagem}") }} " alt="transfer">  
    

        <!--Input quantidade inicio -->
        <div class="p-1 mt-1 bg-gray-200 dark:bg-slate-700 rounded-sm">
            <h1 class="text-green-600 dark:text-green-400 text-center">{{ $item->quantidade}}</h1>
        </div>
        <!--Input quantidade fim -->
    </div>
    @endforeach


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