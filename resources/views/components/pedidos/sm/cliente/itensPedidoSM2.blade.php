    <div x-data="{ 
        open: false, 
        imageSrc: '', 
        images: @entangle('imageItens'), 
        currentIndex: 0,
        handleKeyDown(event) {
            if (!this.open) return;
            if (event.key === 'ArrowLeft') {
                this.currentIndex = (this.currentIndex > 0) ? this.currentIndex - 1 : this.images.length - 1;
                this.imageSrc = this.images[this.currentIndex];
            } else if (event.key === 'ArrowRight') {
                this.currentIndex = (this.currentIndex < this.images.length - 1) ? this.currentIndex + 1 : 0;
                this.imageSrc = this.images[this.currentIndex];
            } else if (event.key === 'Escape') {
                this.open = false;
            }
        }
    }" class="grid grid-cols-6 gap-1 w-full" {{-- class="flex flex-wrap gap-2 w-full border-4 md:border-8 border-gray-300 dark:border-slate-900 bg-white dark:bg-slate-900  max-h-96 soft-scrollbar overflow-y-auto rounded-md p-1" --}} @keydown.window="handleKeyDown">
    
    @foreach ($itenspedidoList as $index => $item)
    <div class="col-span-2 w-auto bg-gray-50 rounded-md border-4 border-gray-100 dark:border-slate-700 shadow-md">
        <div class="min-h-28 max-h-28 md:max-h-36 rounded-md flex flex-col justify-center">
                <div class="w-full p-0.5 bg-gray-200 dark:bg-slate-700">
                    <h1 class="text-orange-600 dark:text-gray-300 text-center text-xs">{{ $item->produto->referencia }}
                    </h1>
                </div>
            <img @click="open = true; imageSrc = '{{ $item->imagem_cliente ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produtos->imagem}") }}'; currentIndex = {{ $index }}"
                 class="w-20 min-h-24 max-h-24 rounded-md mx-auto cursor-pointer"
                 src="{{ $item->imagem_cliente ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produtos->imagem}") }}"
                 alt="Imagem">
        </div>
        <div class="p-1 mt-1 {{-- bg-gray-200 dark:bg-slate-700 --}} border-t-2 border-gray-300 dark:border-slate-600 text-center">
            <h1 class="text-green-600 dark:text-green-400 text-center font-semibold">{{ $item->quantidade }}</h1>
            <h1 class="text-cyan-600 dark:text-cyan-400 text-center text-xs font-mono {{ isset($item->medida) && !empty($item->medida) ? '' : 'hidden' }}">{{ $item->medida }}</h1>
            @can('PREFEITURA', $permissao)
                <h1 class="text-orange-600 dark:text-gray-300 text-center text-xs capitalize">{{ $item->prefeitura_produto ?? 'Nenhuma prefeitura definida' }}
                </h1>
            @endcan
        </div>
    </div>
    @endforeach
    
    <!-- Modal de Imagem -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
        <div @click.away="open = false" class="bg-white w-full max-w-2xl mx-auto p-4 rounded-md relative">
    
            <div class="flex justify-center relative w-full m-auto overflow-hidden rounded-lg">
                <img :src="imageSrc" class="w-auto h-96">
            </div>
            
            <!-- Slider controls -->
            <div class="flex items-center justify-between m-auto bg-red-300 top-1">
                <button @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1; imageSrc = images[currentIndex]" type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-gray-600 dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button @click="currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0; imageSrc = images[currentIndex]" type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-gray-600 dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
            
        </div>
    </div>
    </div>