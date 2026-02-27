<div class="">

    <div class="p-2 md:p-5 rounded-lg bg-slate-300 dark:bg-slate-700">
        <div class="md:flex space-y-2 md:space-y-0 items-center justify-between py-2 mb-2">
            <form class="md:flex space-y-2 md:space-y-0">

                <div class="relative md:flex gap-x-2 gap-y-2 space-y-1 md:space-y-0">

                    <div class="w-60">
                        <x-input-wire wire:model.live="search" icon="search"
                            placeholder="Pesquise por referência ou filtros..."/>
                    </div>

                    <div class="w-60">
                        <x-select placeholder="Selecione o gênero..." wire:model.live="search_genero">
                            <x-select.option label="Feminino" value="feminino" />
                            <x-select.option label="Masculino" value="masculino" />
                            <x-select.option label="Infantil" value="infantil" />
                        </x-select>
                    </div>
                    
                    <div class="w-52">
                        <x-select placeholder="Selecione o produto..." wire:model.live="search_produto">
                            <x-select.option label="Transfer" value="transfer" />
                            <x-select.option label="Termopatch" value="termopatch" />
                            <x-select.option label="APAGAR" value="transfers" />
                        </x-select>
                    </div>

                    <div class="md:w-96">
                        
                        <x-select placeholder="Selecione a marca..." wire:model.live="searchMarca" class="uppercase">
                            @foreach ($marcaList as $marca)
                                <x-select.option wire:key="{{$marca->id}}" label="{{$marca->referencia.' / '.$marca->descricao}}" value="{{$marca->id}}" />
                            @endforeach
                        </x-select> 

                    </div>
                    
                </div>
                
                <div class="md:w-52"> 
                <x-button-wire wire:click="resetFilters" spinner icon="adjustments" md amber label="Limpar filtros"
                        class="md:ml-2" />
                </div>

            </form>

            <div class="md:w-96 text-right">
                <h1 class="text-gray-600 dark:text-gray-300">Total de estampas: <span class="dark:text-green-400">
                        {{ $allTransfer->count() }} </span> </h1>
            </div>
        </div>

        <div x-data="{ openModal: false, imgModal: '', filtros: '' }" class="relative overflow-y-auto soft-scrollbar shadow-md sm:rounded-lg  max-h-55v">
            <table class="w-full text-left text-gray-500 dark:text-gray-400 rounded-xl">
                <!-- head -->
                <thead class="sticky top-0 uppercase text-white bg-slate-400 dark:bg-blue-700 text-center">
                    <tr>
                        <th>id</th>
                        <th>Imagem</th>
                        <th>

                            <div class="flex items-center">
                                Referência
                                <a wire:click="sortBy('referencia')" href="#">
                                    <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </a>
                            </div>

                        </th>
                        <th>Produto</th>
                        <th>Medida</th>
                        <th>Gênero</th>
                        <th>Marca</th>
                        <th>Filtros</th>
                        <th>Usuário</th>
                        <th>Cadastro</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @forelse ($transfers as $transfer)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900">
                            <td class="uppercase text-center">{{ '#' . $transfer->id }}</td>
                            <td class="text-center">
                                <img {{-- wire:click="openModal('{{ url("storage/{$transfer->imagem}") }}')" --}}
                                @click="openModal = true; 
                                imgModal = '{{ url("storage/{$transfer->imagem}") }}'; 
                                filtros = '{{ $transfer->filtros }}'";
                                    class="cursor-pointer p-1 rounded-lg min-h-20 max-h-20"
                                    src="{{ url("storage/{$transfer->imagem}") }}" alt="imagem do produto" />
                            </td>
                            <td class="uppercase text-center">{{ $transfer->referencia }}</td>
                             <td class="uppercase text-center {{ $transfer->tipo == 'termopatch' ? 'text-blue-600' : ''}}">{{ $transfer->tipo }}</td>
                             <td class="uppercase text-center">{{ $transfer->medida ?? '-' }}</td>
                            <td class="uppercase text-center">{{ $transfer->genero }}</td>
                            <td class="uppercase text-center">
                                {{ $transfer->marca->referencia . ' / ' . $transfer->marca->descricao }}</td>
                            <td class="uppercase text-center">{{ $transfer->filtros }}</td>
                            <td class="uppercase text-center">{{ $transfer->user->name }}</td>
                            <td class="uppercase text-center">{{ $transfer->created_at->format('d/m/Y H:i') }}</td>
                            <td class="text-center">
                                <div class="flex justify-center items-center gap-x-5">

                                    @can('EDIT-TRANSFER', $permissao)
                                        <a class="text-red-600 cursor-pointer"
                                            wire:click="editTransfer({{ $transfer->id }})">
                                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                <path
                                                    d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                                <path
                                                    d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                            </svg>
                                        </a>
                                    @endcan

                                    @can('DEL-TRANSFER', $permissao)
                                        <a class="text-red-600 cursor-pointer"
                                            wire:click="confirmDeleteTransfer({{ $transfer->id }})">
                                            <svg class="w-6 h-6 text-red-600 dark:text-red-600" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                            </svg>
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                <h1 class="text-2xl text-red-600 dark:text-red-400">Nenhum registro encontrado.</h1>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <!--Modal Alpinejs-->
            <div x-show="openModal" @click.away="openModal = false" class="fixed inset-0 flex items-center justify-center z-50">
                <div @click.away="openModal = false" class="bg-white p-4 rounded shadow">
                    <img :src="imgModal" alt="Imagem do modal" />
                    <h1 x-text="filtros" class="text-sm text-blue-600"></h1>
                </div>
            </div>
             <!--Modal Alpinejs fim-->

            <div class="bg-yellow-300 p-0.5" id="jeremias" x-data="{
                jeremias() {
                    const observer = new IntersectionObserver((transfers) => {
                        transfers.forEach((transfer) => {
                            if (transfer.isIntersecting) {
                                @this.loadMore()
                            }
            
                        })
                    })
                    observer.observe(this.$el)
                }
            }" x-init="jeremias"></div>

        </div>

    </div>

    <div class="flex justify-between mt-2 ">
        <div wire:loading class="dark:text-green-400">Carregando mais items...</div>

        @if ($transfers->hasMorePages())
            <button wire:loading.remove wire:click="loadMore" class="text-blue-600 dark:text-blue-400">Carregar
                mais</button>
        @else
            <h1 class="dark:text-orange-500">Não há mais itens para carregar.</h1>
        @endif
        


        <h1 class="font-bold dark:text-gray-400">Total de registros: <span
                class="dark:text-green-400">{{ $transfers->count() }}</span></h1>
    </div>



   {{--  @if ($createNewTransferModal)
        @include('components.transfer.createTransferModal')
    @endif

    @if ($filtroTransferModal)
        @include('components.transfer.filtroTransferModal')
    @endif


    @if ($myModalimg)
        @include('components.transfer.imgTransferModal')
    @endif


     --}}
     
     @if ($editTransferModal)
        @include('components.cadastros.transfers.editTransferModal')
    @endif


</div>