<div>
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
    }" @scroll.window="handleScroll()" class="p-1 md:p-5 {{-- bg-green-400 m-3 --}} ">



        <!-- Header inicio -->
        <div {{-- x-show="showHeader" --}} class="fixed top-16 left-0 w-full  md:px-5 z-10">
            <div name="header" class="bg-gray-300 dark:bg-gray-800 shadow ">
                <div class="flex place-items-end justify-between py-2 px-2 sm:px-6 lg:px-2">
                    <h2 class="flex  gap-x-2 font-semibold text-xl text-orange-500 dark:text-orange-500 leading-tight">
                        <svg class="w-5 h-5 text-orange-500 dark:text-orange-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 2h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m6 0a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1m6 0v3H6V2M5 5h8m-8 5h8m-8 4h8" />
                        </svg>
                        {{ __('Pedidos') }}
                    </h2>
                    <h1 class="text-gray-400 text-end font-bold">Pedidos: <span
                            class="text-orange-500">{{ $totalPedidos }}</span> </h1>
                </div>
            </div>

            <!-- Filtros Pedidos - Inicio -->
            <div class="md:flex gap-x-2 space-y-2 md:space-y-0 p-2 bg-gray-200 dark:bg-slate-950 rounded-md mb-2">


                <div class="md:hidden">
                    @include('components.pedidos.sm.filtro_pedido_sm')
                </div>

                <div class="hidden md:flex gap-x-2 space-y-2 md:space-y-0 md:w-full">
                    @include('components.pedidos.md.filtro_pedido_md')
                </div>

            </div>
            <!-- Filtros Pedidos - Fim -->

        </div>
        <!-- Header fim -->



        <!-- Botão Flutuante de Voltar ao Topo -->
        <button x-show="showButton" @click="window.scrollTo({ top: 0, behavior: 'smooth' })" title="Voltar ao topo"
            class="animate-bounce fixed bottom-20 md:bottom-4 right-4 z-50 bg-blue-500 text-white p-3 rounded-full m-0 shadow-lg hover:bg-blue-600 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24"
                data-name="Layer 1" class="text-white">
                <path
                    d="M17.71,11.29l-5-5a1,1,0,0,0-.33-.21,1,1,0,0,0-.76,0,1,1,0,0,0-.33.21l-5,5a1,1,0,0,0,1.42,1.42L11,9.41V17a1,1,0,0,0,2,0V9.41l3.29,3.3a1,1,0,0,0,1.42,0A1,1,0,0,0,17.71,11.29Z"
                    fill="white" />
            </svg>
        </button>

        <div
            class="w-full mt-36 md:mt-28 {{-- mb-5 --}} {{-- md:w-11/12 --}} {{-- px-2 p-2 --}} mx-auto   lg:px-3 lg:py-2 bg-gray-300 dark:bg-slate-800  rounded-lg">




            <div wire:poll.30s
                class="overflow-y-auto overflow-x-auto {{-- max-h-[33rem] md:max-h-[42rem] --}} w-full soft-scrollbar rounded-lg ">

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-3 hidden md:table-cell">
                                {{-- <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div> --}}
                                <i class="fa-solid fa-mobile-screen-button" title="Pedidos feitos pelo aplicativo"></i>
                            </th>
                            <th scope="col" class="px-3 py-3 text-center">
                                #
                            </th>
                            <th scope="col" class="px-3 py-3 text-nowrap text-center">
                                Nº Modelo
                            </th>
                            @can('ALLPEDIDO', $permissao)
                                <th scope="col" class="px-3 py-3">
                                    Cliente
                                </th>
                            @endcan

                            @can('PREFEITURA', $permissao)
                            <th scope="col" class="px-3 py-3 text-center">
                                Prefeitura
                            </th>
                            @else
                            <th scope="col" class="px-3 py-3 text-center">
                                Grupo
                            </th>
                            @endcan

                            <th scope="col" class="px-3 py-3 text-center">
                                Status
                            </th>
                            <th scope="col" class="px-3 py-3 text-center">
                                Total Itens
                            </th>
                            <th scope="col" class="px-3 py-3 text-center">
                                Qnde Pares
                            </th>
                            @can('TESTE', $permissao)
                                <th scope="col" class="px-1 py-3 text-center">
                                    Previsão Entrega
                                </th>
                            @endcan

                            <th scope="col" class="md:table-cell px-1 py-3 text-center">
                                Data cadastro
                            </th>

                            @can('ENTREGAR-PEDIDO', $permissao)
                                <th scope="col" class="px-1 py-3 text-center">
                                    Status
                                </th>
                            @endcan

                            @can('DEL-PEDIDO', $permissao)
                                <th scope="col" class="px-1 py-3 ">
                                    Ação
                                </th>
                            @endcan

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pedidoList as $pedido)

                            <tr wire:key="{{ $pedido->id }}"
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800  border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <td class="px-3 hidden md:table-cell">
                                    {{--<div class="flex items-center">
                                        <input id="checkbox-table-search-1" type="checkbox"
                                            class="w-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>--}}
                                    
                                    <div class="{{ $pedido->aplicativo ? '' : 'hidden' }}">
                                        <i class="fa-solid fa-mobile-screen-button text-green-600 animate-bounce" title="Feito pelo aplicativo"></i>
                                    </div>
                                    
                                </td>
                                <td class="px-3 py-2 cursor-pointer text-center"
                                    wire:click="modalShow({{ $pedido->id }})">
                                    <h1 class="font-bold text-blue-600 dark:text-blue-400">
                                        {{ str_pad($pedido->id, 4, '0', STR_PAD_LEFT) }}</h1>
                                </td>
                                <td class="px-3 py-2 cursor-pointer text-center"
                                    wire:click="modalShow({{ $pedido->id }})">
                                    <h1 class="font-bold text-green-600 dark:text-green-400">
                                        {{ $pedido->pedido_modelo }}
                                    </h1>
                                </td>

                                @can('ALLPEDIDO', $permissao)
                                    <th wire:click="modalShow({{ $pedido->id }})" scope="row"
                                        class="cursor-pointer flex items-center justify-start text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex py-2 w-60 md:w-full">
                                            <img class="w-8 h-8 rounded-full"
                                                src="{{ $pedido->user->profile_photo_path ? asset('storage/' . $pedido->user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                                                alt="Sem foto">
                                            <div class="ps-3 cursor-pointer">
                                                <div
                                                    class="uppercase truncate w-40 md:w-full text-sm md:text-base font-semibold text-cyan-600 dark:text-cyan-400">
                                                    {{ $pedido->user->name }}
                                                </div>
                                                <div
                                                    class="truncate w-40 md:w-full text-xs md:font-normal dark:text-gray-400 no-underline" style="text-decoration: none !important;">
                                                    {{ $pedido->user->email }}</div>
                                            </div>
                                        </div>
                                    </th>
                                @endcan

                                <td wire:click="modalShow({{ $pedido->id }})" class="px-3 py-2">
                                    <div
                                        class="flex items-center justify-center uppercase  text-gray-600 dark:text-lime-300">
                                        @if(empty($pedido->prefeitura) && $pedido->grupo == '---')
                                            <span class="text-xs md:text-base text-blue-600 dark:text-blue-500">TERMOPATCH</span>
                                        @elseif($pedido->prefeitura)
                                            <span class="text-xs md:text-base text-red-600 dark:text-red-500">{{ $pedido->prefeitura }}</span>
                                        @elseif($pedido->grupo)
                                            {{ $pedido->grupo }}
                                        @endif
                                    </div>
                                </td>


                                <td wire:click="modalShow({{ $pedido->id }})"
                                    class="px-6 py-2 text-center uppercase cursor-pointer">
                                    @if ($pedido->status == 'Entregue')
                                        <h1 class="flex gap-x-2 ">
                                            <svg class="w-5 h-5 text-green-600 dark:text-green-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m5 12 4.7 4.5 9.3-9" />
                                            </svg>
                                            <span
                                                class="text-xs md:text-base font-bold text-green-600 dark:text-green-400">Entregue</span>
                                        </h1>
                                    @else
                                        @if ($pedido->status == 'Entregue')
                                            <span
                                                class="text-xs md:text-base text-red-600 dark:text-red-500">{{ $pedido->status }}</span>
                                        @else
                                            @if ($pedido->status == 'solicitando cancelamento')
                                                <span
                                                    class="text-xs md:text-base text-orange-600 dark:text-yellow-400">
                                                    {{ $pedido->status }}...
                                                </span>
                                            @elseif($pedido->status == 'Cancelado')
                                                <span class="text-xs md:text-base text-red-600 dark:text-red-400">
                                                    {{ $pedido->status }}
                                                </span>
                                            @else()
                                                @if ($pedido->status == 'cadastrado')
                                                    <span
                                                        class="text-xs md:text-base text-gray-600 dark:text-gray-400">
                                                        Aberto
                                                    </span>
                                                @elseif($pedido->status == 'parcialmente entregue')
                                                    <span
                                                        class="text-xs md:text-base truncate text-orange-500 dark:text-orange-400">{{ $pedido->status }}</span>
                                                @else
                                                    <span
                                                        class="text-xs md:text-base truncate">{{ $pedido->status }}</span>
                                                @endif
                                            @endif
                                        @endif


                                    @endif
                                </td>
                                <td class="px-3 py-2">
                                    <div class="flex items-center justify-center">
                                        {{ $pedido->itens->count() }}
                                    </div>
                                </td>
                                <td class="px-3 py-2">
                                    @cannot('OCUTAR-QNDE-ITEM-PEDIDO', $permissao)
                                        <div class="flex items-center justify-center ">
                                            {{ $pedido->itens->sum('quantidade') }}
                                        </div>
                                    @endcan
                                </td>

                                @can('TESTE', $permissao)
                                    <td class="px-1 py-2 text-center uppercase text-xs text-positive-500">
                                        {{ $pedido->previsao_entrega ? (new DateTime($pedido->previsao_entrega))->format('d/m/Y') : 'Data não disponível' }}
                                    </td>
                                @endcan


                                <!--Caso esteja no mobile apareca uma das rows -->
                                <td class="hidden md:table-cell px-1 py-2 text-center uppercase text-xs">
                                    {{ $pedido->created_at->format('d/m/Y : H:i') }}
                                </td>
                                <td class="md:hidden px-1 py-2 text-center uppercase text-xs">
                                    {{ $pedido->created_at->format('d/m/Y') }}
                                </td>

                                @can('ENTREGAR-PEDIDO', $permissao)
                                    <td class="px-2 py-2 text-center">
                                        <div class="flex items-center justify-between">
                                            <a wire:click="showEntregaParcialmentePedido({{ $pedido->id }})"
                                                title="Entregar parcialmente" href="#"
                                                class=" font-medium text-red-600 dark:text-red-500 hover:underline">
                                                <svg class="w-6 h-6 text-cyan-600 dark:text-cyan-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M18 14a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 1 0 0-2h-2v-2Z"
                                                        clip-rule="evenodd" />
                                                    <path fill-rule="evenodd"
                                                        d="M15.026 21.534A9.994 9.994 0 0 1 12 22C6.477 22 2 17.523 2 12S6.477 2 12 2c2.51 0 4.802.924 6.558 2.45l-7.635 7.636L7.707 8.87a1 1 0 0 0-1.414 1.414l3.923 3.923a1 1 0 0 0 1.414 0l8.3-8.3A9.956 9.956 0 0 1 22 12a9.994 9.994 0 0 1-.466 3.026A2.49 2.49 0 0 0 20 14.5h-.5V14a2.5 2.5 0 0 0-5 0v.5H14a2.5 2.5 0 0 0 0 5h.5v.5c0 .578.196 1.11.526 1.534Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>

                                            <a wire:click="showEntregarPedido({{ $pedido->id }})"
                                                title="Entregar o pedido" href="#"
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                                <svg class="w-6 h-6 text-green-600 dark:text-green-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                @endcan

                                @can('DEL-PEDIDO', $permissao)
                                    <td class="px-1 py-2">
                                        <a wire:click="delPedido({{ $pedido->id }})" href="#"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Deletar</a>
                                    @endcan
                                </td>

                            </tr>



                        @empty
                            <div class="w-full h-10">
                                <h1 class="text-red-500">Nenhum pedido encontrado.</h1>
                            </div>
                        @endforelse

                    </tbody>


                </table>

                <!--Serve pra paginate auto usando alpineJs - INICIO -->
                <div class="p-0.5 text-center text-xs " id="jeremias" x-data="{
                    jeremias() {
                        const observer = new IntersectionObserver((pedidoList) => {
                            pedidoList.forEach((pedido) => {
                                if (pedido.isIntersecting) {
                                    @this.loadMore()
                                }
                
                            })
                        })
                        observer.observe(this.$el)
                    }
                }"
                    x-init="jeremias">
                    @if ($pedidoList->hasMorePages())
                        <h1 class="text-green-500 dark:text-green-400">Carregando mais registros...</h1>
                    @else
                        <h1 class="text-yellow-600 dark:text-yellow-300">Não existem mais registros para carregar</h1>
                    @endif
                </div>
                <!--Serve pra paginate auto usando alpineJs - FIM -->




                <!--MODAL COM OS ITENS DO PEDIDO-->
                @if ($myModal)
                    <x-modal name="simpleModal" wire:model="myModal" maxWidth="8xl">
                        <x-notifications z-index="z-50" />

                        <div class="md:p-2 border-4 md:border-8 border-gray-200 dark:border-slate-700">

                            <div class="soft-scrollbar overflow-y-auto md:max-h-85v">


                                <!-- Itens do pedido aqui -->
                                <div class="md:hidden">
                                    @include('components.pedidos.sm.pedido_sm')
                                </div>

                                <div class="hidden md:block">
                                    @include('components.pedidos.md.pedido_md')
                                </div>

                                <!-- Itens do pedido fim -->
                            </div>

                            <div class="md:flex justify-between mt-2">
                                <div class="w-full md:flex justify-between mt-3">
                                    @can('EDIT-PEDIDO', $permissao)
                                        <x-button-wire wire:click="updatePedido" info label="Salvar alterações"
                                            class=" w-full md:w-auto" />
                                            
                                            <x-button-wire label="Imprimir Pedido" icon="printer" wire:click="imprimirOrder({{ $idpedido }})" />

                                        <button class="text-white bg-indigo-700 px-2 py-1 rounded-md hover:bg-indigo-800"
                                            wire:click="generatePdf({{ $idpedido }})" wire:loading.attr="disabled">
                                            <span wire:loading.remove>Gerar PDF</span>
                                            <div wire:loading>Gerando relatório...</div>
                                        </button>
                                    @else
                                        <!--Solicitar cancelamento do pedido somente se o usuário logado for proprietario do pedido-->
                                        @if ($userpedido == $userLogado)
                                            <x-button-wire wire:click="cancelarPedidoDialog" red
                                                label="Solicitar cançelamento do pedido" class="w-full md:w-auto" />
                                        @endif
                                    @endcan
                                </div>
                                <!--Solicitar cancelamento do pedido -->

                                <x-dialog id="custom" title="Cancelamento de pedido"
                                    description="A solicitação pode levar até 24h para ser processada.">
                                    <x-input-wire label="Qual o motivo do cancelamento?"
                                        placeholder="Descreva o motivo" {{-- x-model="name" --}}
                                        wire:model="motivocancelar" />
                                </x-dialog>

                            </div>
                        </div>

                    </x-modal>
                @endif
                <!--FIM MODAL ITENS PEDIDO -->
            </div>

        </div>
    </div>
