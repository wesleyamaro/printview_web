<!-- Download all images -->
<div x-data="{
    open: false,
    imageSrc: '',
    images: @entangle('imageItens'),
    currentIndex: 0,
    downloadAllImages() {
        this.images.forEach((imageURL, index) => {
            setTimeout(() => {
                const fileName = imageURL.split('/').pop() || `imagem_${index + 1}.jpg`;

                const link = document.createElement('a');
                link.href = imageURL;
                link.download = fileName;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }, index * 200); // Aguarda 200ms entre cada download
        });
    },
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
}"
    class="grid grid-cols-12 gap-2 place-items-start grid-flow-row auto-rows-max h-[40rem] soft-scrollbar overflow-y-auto border-4 md:border-4 border-gray-200 dark:border-slate-900 bg-white dark:bg-slate-900  rounded-md p-1"
    @keydown.window="handleKeyDown">


    {{-- <div class="w-full flex justify-center">
        <!-- Botão de Download de Imagens -->
        <button @click="downloadAllImages"
            class="top-7 absolute px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Baixar todas as imagens do pedido
        </button>
    </div> --}}

    @foreach ($itenspedidoList as $index => $item)
        <div
            class="relative md:col-span-3 xl:col-span-2 bg-white dark:bg-slate-800 rounded-md border border-gray-200 dark:border-slate-700 shadow-md">
            <div class="rounded-md">
                <div class="p-0.5 bg-gray-300 dark:bg-slate-700 rounded-t-md">
                    <h1 class="text-gray-600 dark:text-green-400 text-center font-bold">{{ $item->produto->referencia }}</h1>
                </div>
                <img @click="open = true; imageSrc = '{{ $item->imagem_cliente ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produtos->imagem}") }}'; currentIndex = {{ $index }}"
                    class="w-24  max-h-28 rounded-md mx-auto cursor-pointer object-contain"
                    src="{{ $item->imagem_cliente ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produtos->imagem}") }}"
                    alt="Imagem">
            </div>

            <!--Input quantidade inicio -->
            <div class="p-1 mt-1 text-center">

                <div x-data="{ quantity: @entangle('quantities.' . $item->produto->id) }" class="flex justify-center  md:gap-x-1">

                    {{-- <button @click="quantity = Math.max(0, quantity - 1)" id="subqnde" type="button"
                        class="px-1 py-1 text-sm font-medium text-center inline-flex items-center text-white bg-gray-100 rounded-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14" />
                        </svg>
                    </button> --}}

                    <div class="w-full mt-2 text-center">
                        <input x-model="quantity" @input="quantity = quantity.replace(/[^0-9]/g, '')"
                            class="block w-full p-1 text-center text-blue-600 border border-gray-200 rounded-lg bg-gray-50 sm:text-xs focus:ring-slate-500 focus:border-slate-500 dark:bg-slate-700 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-slate-500 dark:focus:border-slate-500"
                            placeholder="000" required>
                    </div>
                    {{-- <button @click="quantity = quantity + 1" id="addqnde" type="button"
                        class="px-1 py-1 text-sm font-medium text-center inline-flex items-center text-white bg-gray-100 rounded-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14m-7 7V5" />
                        </svg>
                    </button> --}}
                </div>

                <div class="text-center mt-2 {{ isset($item->medida) && !empty($item->medida) ? '' : 'hidden' }}">
                    <input {{-- x-model="quantity" @input="quantity = quantity.replace(/[^0-9]/g, '')" --}}
                        class="block p-1 md:p-2 text-center text-blue-600 border border-slate-300 rounded-lg bg-gray-100 sm:text-xs focus:ring-slate-500 focus:border-slate-500 dark:bg-slate-700 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-slate-500 dark:focus:border-slate-500"
                        placeholder="00x00" wire:model="medida.{{ $item->produto->id }}"
                        wire:keydown.enter="updateMedida({{ $item->produto->id }})">
                </div>

                

                {{-- <a href="#" title="Remover item do pedido" wire:click="delItem({{ $item->id }})"
                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Remover</a> --}}

            </div>
            <!--Input quantidade end -->

            <div class="absolute top-0 right-0 z-20 p-1">
                <i class="fa-solid fa-trash-can text-red-600 cursor-pointer w-4 h-4" wire:click="delItem({{ $item->id }})"></i>
            </div>

        </div>
    @endforeach

    <!-- Modal de Imagem -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
        <div @click.away="open = false" class="bg-white w-full max-w-2xl mx-auto p-4 rounded-md relative">

            <div class="flex justify-center relative w-full m-auto overflow-hidden rounded-lg">
                <img :src="imageSrc" class="w-auto h-[32rem]">
                <div class=" w-full h-full absolute flex items-end justify-end">
                    <img src="img/keyboard.png" alt="" srcset="" class="w-20">
                </div>
            </div>

            <!-- Slider controls -->
            <div class="flex items-center justify-between m-auto bg-red-300 top-1">
                <button
                    @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1; imageSrc = images[currentIndex]"
                    type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-gray-600 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button
                    @click="currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0; imageSrc = images[currentIndex]"
                    type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-300/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-gray-600 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

        </div>
    </div>
</div>
