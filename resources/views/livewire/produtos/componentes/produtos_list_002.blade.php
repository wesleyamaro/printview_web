<div x-data="{
    value: 12,
    showHeader: true, // Controle para exibir/esconder o cabeçalho
    showButton: false, // Controle para exibir o botão de voltar ao topo
    lastScrollTop: 0, // Para armazenar a última posição do scroll
    handleScroll() {
        const currentScroll = window.scrollY;

        // Se o usuário rolar para cima
        if (currentScroll < this.lastScrollTop) {
            this.showHeader = true;
            if (currentScroll > 300) {
                this.showButton = true;
            } else {
                this.showButton = false;
            }
        } else { // Se o usuário rolar para baixo
            this.showHeader = false;
            this.showButton = false;
        }

        this.lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Previne o scroll negativo
    }
}" @scroll.window="handleScroll()">

    {{-- <x-notifications z-index="z-50" /> --}}

    <!-- Cabeçalho -->
    <div x-show="showHeader"
        class="fixed top-16 left-0 w-full p-2 md:p-3 bg-yellow-100 dark:bg-slate-700 shadow-lg z-20 transition-all ease-in-out">
        <div class="flex items-center justify-between">
            <!--Cabecalho - start -->
            <div
                class="  w-full flex items-center justify-between  gap-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">

                <div class="hidden md:flex gap-x-2 ">
                    <svg class="w-5 h-5 text-orange-300 dark:text-orange-300 " viewBox="0 0 29 27"
                        xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2">
                        <path
                            d="M23.623 20.812s.39-1.627.874-3.038c.758-2.21 2.898-5.41 3.639-7.755.439-1.357.677-2.857.252-4.102-.443-1.294-.915-2.429-1.876-3.709C25.534.906 24.209.164 22.628.011c-1.125-.109-2.048.608-2.659 1.416-1.022 1.351-1.404 3.031-1.823 4.66-.597 2.314-.519 4.002-.232 5.589.151 2.132-.369 3.41-.946 4.944-1.16 3.08-2.087 5.366-1.867 6.474.39 1.315 1.086 2.151 2.365 2.6 1.483.52 2.656.723 3.58.184 1.021-.597 1.583-1.483 1.884-2.538l.693-2.528zM4.988 20.812s-.39-1.627-.874-3.038c-.758-2.21-2.898-5.41-3.64-7.755C.036 8.662-.202 7.162.223 5.917c.442-1.294.915-2.429 1.875-3.709C3.076.906 4.401.164 5.983.011 7.108-.098 8.03.619 8.641 1.427c1.022 1.351 1.404 3.031 1.824 4.66.596 2.314.519 4.002.231 5.589-.15 2.132.369 3.41.947 4.944 1.16 3.08 2.086 5.366 1.867 6.474-.391 1.315-1.087 2.151-2.365 2.6-1.483.52-2.656.723-3.58.184-1.022-.597-1.583-1.483-1.884-2.538l-.693-2.528z"
                            style="fill:rgb(208 56 1)" />
                    </svg>
                    {{ __('Produtos') }}

                </div>

                <x-button-wire x-on:click="$openModal('simpleModal')" icon="adjustments" lime
                    label="Clique aqui para filtrar as estampas" class="w-full md:w-auto" />

                <div class="flex items-center justify-between gap-x-2">

                    <!--Start range -->
                    <div class="hidden md:flex items-center gap-x-2">
                        <input wire:model="ordem" id="steps-range" type="range" min="3" max="12"
                            value="12" step="3" title="Altere a ordem do pedido na fila."
                            class="w-full h-2  rounded-lg appearance-none cursor-pointer bg-gray-300 dark:bg-gray-800"
                            x-bind:value="value" x-on:input="value = $event.target.value">
                        <span x-text="value" class="text-blue-600 dark:text-white">5</span>
                    </div>
                    <!--End range -->

                    <!-- Cart -->
                    <div class="hidden ml-4 md:flow-root mr-2">
                        <a href="{{ route('carrinho_compra') }}" class="group -m-2 flex items-center p-2">
                            <svg class="h-6 w-6 flex-shrink-0 text-blue-500 group-hover:text-blue-400" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            <span
                                class="ml-2 text-sm font-medium text-gray-400 group-hover:text-gray-400">{{ $quantidadeCart }}</span>
                            <span class="sr-only">items in cart, view bag</span>
                        </a>
                    </div>

                    <div class="flow-root md:hidden mr-2">
                        <a data-drawer-target="menu-cart" data-drawer-show="menu-cart" href="#"
                            class="group -m-2 flex items-center p-2">
                            <svg class="h-6 w-6 flex-shrink-0 text-green-500 group-hover:text-green-400" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            <span
                                class="ml-2 text-sm font-medium text-gray-400 group-hover:text-gray-400">{{ $quantidadeCart }}</span>
                            <span class="sr-only">items in cart, view bag</span>
                        </a>
                    </div>

                </div>
            </div>
            <!-- Cabecalho - end -->
        </div>
    </div>

    <!-- Botão Flutuante de Voltar ao Topo -->
    <button x-show="showButton" @click="window.scrollTo({ top: 0, behavior: 'smooth' })" title="Voltar ao topo"
        class="animate-bounce fixed bottom-20 md:bottom-4 right-4 z-50 bg-blue-500 text-white p-3 rounded-full m-0 shadow-lg hover:bg-blue-600 transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24" data-name="Layer 1"
            class="text-white">
            <path
                d="M17.71,11.29l-5-5a1,1,0,0,0-.33-.21,1,1,0,0,0-.76,0,1,1,0,0,0-.33.21l-5,5a1,1,0,0,0,1.42,1.42L11,9.41V17a1,1,0,0,0,2,0V9.41l3.29,3.3a1,1,0,0,0,1.42,0A1,1,0,0,0,17.71,11.29Z"
                fill="white" />
        </svg>
    </button>


    <div x-data="{
        showModal: false,
        imageUrl: '',
        currentIndex: 0,
        images: [],
        references: [],
        medida: '',
        productIds: [],
        reference: '',
        productId: null,
        updateProductDetails() {
            this.reference = this.references[this.currentIndex];
            this.productId = this.productIds[this.currentIndex];
        }
    }" x-init="$watch('currentIndex', () => updateProductDetails())" class="mt-14 p-4">

        @include('components.menu-cart')

        <!-- Product List -->
        <div class="grid grid-cols-3 lg:grid-cols-12 content-start items-start gap-2 overflow-hidden"
            :class="{
                'grid-cols-3': value == 3,
                'grid-cols-6': value == 6,
                'grid-cols-9': value == 9,
                'grid-cols-3 md:grid-cols-4 lg:grid-cols-12': value ==
                    12
            }">
            @forelse ($produtoList as $index => $transfer)
                @if (!in_array($transfer->id, $carrinho))
                    <!-- Card Start -->
                    <div
                        class="rounded-lg dark:bg-slate-700 p-1 shadow-lg bg-white flex flex-col justify-center relative">
                        <!-- Product Image -->
                        <div class="rounded-t-lg p-2 bg-white relative">
                            <img @click="
                                showModal = true;
                                imageUrl = '{{ $transfer->imagem ? asset('storage/' . $transfer->imagem) : 'https://cdn1.staticpanvel.com.br/produtos/15/produto-sem-imagem.jpg' }}';
                                currentIndex = {{ $index }};
                                medida = @js($transfer->medida ?? '00x00');
                                images = @js($produtoList->map(fn($produto) => asset('storage/' . $produto->imagem ?? 'https://cdn1.staticpanvel.com.br/produtos/15/produto-sem-imagem.jpg')));
                                references = @js($produtoList->map(fn($produto) => $produto->referencia));
                                productIds = @js($produtoList->map(fn($produto) => $produto->id));
                                updateProductDetails();
                            "
                                src="{{ $transfer->imagem ? asset('storage/' . $transfer->imagem) : 'https://cdn1.staticpanvel.com.br/produtos/15/produto-sem-imagem.jpg' }}"
                                alt="Produto sem foto. Avise-nos!"
                                class="rounded-t-lg cursor-pointer w-full object-cover transition-transform duration-300 group-hover:scale-110" oncontextmenu="return false;" />

                            <!-- Botão Adicionar ao Carrinho sobre a imagem -->
                            <button wire:click="addCarrinho({{ $transfer->id }})" wire:loading.attr="disabled"
                                type="button"
                                class="absolute bottom-2 right-2 inline-flex items-center rounded-full border-2 bg-green-700 p-1.5 text-center text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg class="h-5 w-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 21">
                                    <path
                                        d="M15 14H7.78l-.5-2H16a1 1 0 0 0 .962-.726l.473-1.655A2.968 2.968 0 0 1 16 10a3 3 0 0 1-3-3 3 3 0 0 1-3-3 2.97 2.97 0 0 1 .184-1H4.77L4.175.745A1 1 0 0 0 3.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 10 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3Zm-8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm8 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                </svg>
                            </button>
                        </div>

                        <!-- Referência -->
                        <div class="text-center">
                            <div class="flex justify-center w-full clear-left text-center py-1 md:py-2">
                                <span
                                    class="font-bold text-sm md:text-base text-gray-600 dark:text-gray-300">{{ $transfer->referencia }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- Card End -->
                @endif
            @empty
                {{-- <p class="text-center col-span-full">Nenhum produto encontrado.</p> --}}
               <div class="col-span-full text-center p-1 flex flex-col items-center justify-center">
                <img src="{{ asset('img/product-not-found.png') }}" alt="" srcset="" class="w-32 md:w-60">
               </div>
            @endforelse

            <div class="col-span-full text-center p-1 flex flex-col items-center justify-center" id="jeremias"
                x-data="{
                    jeremias() {
                        const observer = new IntersectionObserver((produtos) => {
                            produtos.forEach((transfer) => {
                                if (transfer.isIntersecting) {
                                    @this.loadMore()
                                }
                
                            })
                        })
                        observer.observe(this.$el)
                    }
                }" x-init="jeremias">

                <div class="{{ $produtoList->isNotEmpty() ? '' : 'hidden' }} col-span-full text-center p-1 flex flex-col items-center justify-center">
                    <h1 class=" text-green-600 dark:text-green-400">Carregando mais itens...</h1>
                <img src="/img/animation-loading2.gif" alt="" srcset="" class="w-32">
                </div>


            </div>

            <!-- Image Zoom Modal -->
            <div x-show="showModal" x-cloak tabindex="0"
                class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75"
                @keydown.escape.window="showModal = false"
                @keydown.left="currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1"
                @keydown.right="currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0"
                @click="showModal = false">

                <div class="relative bg-white rounded-lg shadow-lg overflow-hidden" @click.stop>

                    <!-- Botão de navegação anterior -->
                    <button
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4  cursor-pointer group focus:outline-none"
                        @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1">
                        <span
                            class="w-10 h-10 rounded-full flex items-center justify-center bg-gray-300/30 group-hover:bg-white/50">
                            <svg class="w-4 h-4" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                        </span>
                    </button>

                    <!-- Imagem do Produto -->
                    <div class="flex justify-between items-center p-2">
                        <img :src="images[currentIndex]" alt="Product Image" class="max-w-full max-h-screen" />
                    </div>

                    <!-- Botão de navegação próximo -->
                    <button @click="currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none">
                        <span
                            class="w-10 h-10 rounded-full flex items-center justify-center bg-gray-300/30 group-hover:bg-white/50">
                            <svg class="w-4 h-4" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 9l4-4-4-4" />
                            </svg>
                        </span>
                    </button>

                    <div class="px-2 py-1 {{ $tipo == 'transfer' ? 'hidden' : '' }}">
                        <span>Medidas:</span>
                        <span x-text="medida" class="text-xs font-bold text-gray-600 dark:text-gray-600 px-2 py-1 rounded-full"></span>
                    </div>

                    <div class="p-3 w-full">
                        <button wire:loading.attr="disabled" wire:loading.class.remove="bg-green-600"
                            class="w-full justify-center text-white bg-green-600 hover:bg-green-800 rounded-lg px-5 py-2.5"
                            @click="$wire.addCarrinho(productId).then(() => showModal = false)">
                            Adicionar ao carrinho
                        </button>
                    </div>

                </div>
            </div>
        </div>



        <!--Modal Filtros - Start -->
        <x-modal-wire x-on:post-created="..." id="simpleModal" blur="sm" name="simpleModal" align="center">
            <x-card-wire>

                <form wire:submit.prevent="buscarEstampa">

                    <div class="flex h-50v flex-col justify-between items-stretch p-2">

                        <div class="space-y-3">
                            <div class="flex p-2 gap-x-2 w-full rounded-lg tex bg-gray-300 dark:bg-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-gray-600 dark:text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                </svg>
                                <h1 class="font-bold text-gray-600 dark:text-gray-400">Pesquise estampas por
                                    filtros
                                </h1>
                            </div>

                            @can('MULTIFILTER', $permissao)
                                <div class="w-full">
                                    <x-select wire:model="search" label="Filtros"
                                        placeholder="Busque estampa… Ex: flor, cachorro…" multiselect :options="$filtroList"
                                        option-value="filtro" option-label="filtro" />
                                </div>
                            @else
                                <div class="w-full">
                                    <x-select autocomplete="false" tabindex="-1"
                                        placeholder="Busque estampa… Ex: flor, cachorro…" wire:model="search"
                                        class="uppercase">
                                        @foreach ($filtroList as $filter)
                                            <x-select.option label="{{ $filter->filtro }}" wire:key="{{ $filter->id }}"
                                                value="{{ $filter->filtro }}" />
                                        @endforeach
                                    </x-select>

                                </div>
                            @endcan

                            <!--Pesquisar por codigo -->
                            <div class="w-full">
                                <x-input-wire wire:model="searchRef" tabindex="-1" icon="search"
                                    placeholder="Cód. da estampa ( separe por vírgula )" />
                            </div>


                            <div class="md:flex space-y-3  md:space-y-0 md:space-x-3">

                                <div class="w-full md:w-60 ">
                                    <x-select tabindex="-1" placeholder="Selecione o gênero" wire:model="genero">
                                        <x-select.option label="Feminino" value="feminino" />
                                        <x-select.option label="Infantil" value="infantil" />
                                        <x-select.option label="Masculino" value="masculino" />
                                    </x-select>
                                </div>

                                <div class="flex gap-x-2 w-full">
                                    <div class="w-full">
                                        <x-select tabindex="-1" placeholder="Selecione a marca"
                                            wire:model="selectedMarca" class="uppercase">
                                            @foreach ($marcaList as $marca)
                                                <x-select.option label="{{ $marca->descricao }}"
                                                    wire:key="{{ $marca->id }}" value="{{ $marca->id }}" />
                                            @endforeach
                                        </x-select>
                                    </div>

                                    <div class="w-40">
                                        <x-native-select wire:model="order" class="uppercase" :options="['DESC', 'ASC']" />
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div wire:loading wire:target="buscarEstampa" class="flex flex-col items-center m-auto w-full text-center">
                            <div class="mt-3">
                                <h1 class="dark:text-green-400">Aguarde! Procurando estampa(s)...</h1>
                            </div>
                            <div class="flex items-center justify-center">
                                <img src="/img/animation-loading2.gif" alt="" srcset="" class="w-32">
                            </div>
                           
                        </div>
                        <div class="flex space-x-3 py-3">
                            <x-button-wire type="submit" x-on:click="close" icon="search" rounded teal label="Pesquisar"
                                class="w-full" />
                            <x-button-wire x-on:click="close" wire:click="resetFilters" icon="x" rounded
                                warning label="Limpar filtros" class="w-full" />
                        </div>
                    </div>
                </form>

            </x-card-wire>
        </x-modal-wire>
        <!--Modal Filtros - End -->

    </div>
</div>
