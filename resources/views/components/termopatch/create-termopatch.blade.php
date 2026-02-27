<form wire:submit.prevent="salvarProdutos" class="max-w-full  p-1 mx-auto rounded-lg bg-white dark:bg-slate-700">

        <!--BARRA CADASTRO-->
        <div class="w-full py-1 md:flex items-center sticky top-0 justify-between  gap-x-2  bg-gray-300 dark:bg-gray-800 rounded-lg px-3">
    
            <div class="md:flex items-baseline gap-x-2">
    

                <div class="w-80">
                    <x-select label="Marca*" placeholder="Selecione uma marca" wire:model="selectedMarca" class="uppercase">
                        @foreach ($marcaList as $marca)
                            <x-select.option label="{{ $marca->referencia . ' / ' . $marca->descricao }}"
                                value="{{ $marca->id }}" />
                        @endforeach
                    </x-select>
                </div>
    
            </div>
    
            <div class="md:w-96">
                <form class="">
                    <label for="file-input" class="dark:text-gray-400 text-sm">Adicione imagens. ( Limite de 50 imagens por vez ).</label>
                    <input wire:model="imagens" type="file" name="file-input" id="file-input" multiple title="Max. 40 imagens por vez"
                        class="cursor-pointer block w-full border border-gray-200 shadow-sm 
                    rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 
                    disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700
                     dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                       file:border-0 bg-gray-50 file:me-4
                      file:py-3 file:px-4
                      dark:file:bg-gray-700 dark:file:text-gray-400">
                </form>
            </div>
    
            @error('imagens')
                <span class="error text-sm text-red-600 dark:text-red-300">{{ $message }}</span>
            @enderror
        </div>
        <!--FIM BARRA CADASTRO-->
    
    
    
        <!--INICIO GRID-->
        <div x-data="{ openModal: false, imgModal: '' }" class="grid grid-cols-12 overflow-y-auto h-55v soft-scrollbar gap-x-2 gap-y-1 mt-1">
    
            <div wire:loading wire:target="imagens" class="col-span-full flex mt-2  p-1 rounded-lg">
                <span class="loading loading-spinner text-warning"></span>
                <span class="text-green-600 dark:text-green-400"> Carregando imagens...</span>
            </div>
    
            <!-- Lista de imagens selecionadas -->
            @if (!empty($imagens))
    
                @foreach ($imagens as $index => $imagem)
                    <div class="col-span-4 {{-- h-80 --}} flex items-center p-2 bg-gray-100 dark:bg-slate-700 rounded-lg border-2 border-dotted border-slate-400 dark:border-slate-500">
    
                        <div class="w-56 max-h-56 rounded-lg">
                            <img 
                            @click="openModal = true; 
                                imgModal = '{{ $imagem->temporaryUrl() }}'";
                            
                                class="cursor-pointer p-1 rounded-lg w-full" src="{{ $imagem->temporaryUrl() }}"
                                alt="imagem do produto" />
                            <input wire:model="referencias.{{ $index }}" type="text" id="referencia"
                                name="referencia"
                                class="text-center uppercase w-full rounded-md bg-yellow-50 dark:bg-gray-800 block flex-1 border border-gray-400 dark:border-gray-700 bg-transparent py-1 pl-1 text-gray-900 dark:text-yellow-500 placeholder:text-gray-400 dark:placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                placeholder="{{ pathinfo($imagem->getClientOriginalName(), PATHINFO_FILENAME) }}">
                        </div>
    
                        <div class="w-full h-56 flex justify-between flex-col px-3">
    
                            {{-- <div class="flex gap-x2 w-full"> --}}
                                   
                                {{-- <x-native-select min-items-for-search="5" label="Filtro 1 *" wire:model="filtro1.{{$index}}" class="soft-scrollbar uppercase">
                                    <option selected  label="Selecione um filtro" value="" />
                                    @foreach ($filtroList as $filter)
                                        <option wire:key="{{$filter->id}}" label="{{ $filter->filtro }}" value="{{ $filter->filtro }}" />
                                    @endforeach
                                </x-native-select> --}}

                                <div>

                                {{-- <div class="w-full">
                                    <x-select  label="Encontre o usuário que deseja bloquear a referência" placeholder="Selecione um usuário"
                                        wire:model.live="selectedUser" empty-message="Cliente não encontrado">
                                        @foreach ($userList as $users)
                                            <x-select.user-option 
                                            wire:key="{{ $users->id }}"
                                            src="{{ $users->profile_photo_path ? asset('storage/' . $users->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                                            
                                            label="{{ $users->name }}" 
                                            value="{{ $users->id }}" 
                                            description="{{ $users->email }}"/>                       
                                        @endforeach
                                    </x-select>          
                                    
                                </div> --}}
                                <x-input-wire   label="Cliente" icon="users" placeholder="Nome do cliente" wire:model="nomeCliente.{{$index}}"/>

                                <x-input-wire   label="Filtro 1 * ( obrigatório )" icon="variable" placeholder="Ex.: flor, cachorro..." wire:model="filtro1.{{$index}}"/>
 
                                <x-input-wire   label="Medidas: * ( obrigatório )" icon="adjustments" placeholder="Ex.: 44x44, 35x35..." wire:model="medidas.{{$index}}"/>
                               
                            </div>
                                {{-- <x-native-select min-items-for-search="5" label="Filtro 2 ( opcional )" wire:model="filtro2.{{$index}}" class="soft-scrollbar uppercase">
                                    <option selected  label="Selecione um filtro" value="" />
                                    @foreach ($filtroList as $filter)
                                        <option wire:key="{{$filter->id}}" label="{{ $filter->filtro }}" value="{{ $filter->filtro }}" />
                                    @endforeach
                                </x-native-select> --}}

                           {{--  </div> --}}
    
                            {{--<div class="w-full text-left">
                                          
                                 <x-native-select min-items-for-search="5" label="Filtro 2 ( opcional )" wire:model="filtro2.{{$index}}" class="soft-scrollbar uppercase">
                                    <option selected  label="Selecione um filtro" value="" />
                                    @foreach ($filtros_transfer as $filter)
                                        <option wire:key="{{$filter->id}}" label="{{ $filter->filtro }}" value="{{ $filter->filtro }}" />
                                    @endforeach
                                </x-native-select> 
                             
                            </div>--}}

                            {{-- <div class="w-full space-y-1 mb-1"> --}}
                                {{-- <x-input-wire  wire:model="medida.{{ $index }}" icon="variable" placeholder="30x30" /> --}}
                                {{-- <x-input-wire  wire:model="observacao.{{$index}}"  icon="chat" placeholder="Observação sobre o produto" /> --}}
                                {{-- <x-textarea-wire wire:model="observacao.{{ $index }}" label="Observação" placeholder="Observação sobre o produto" /> --}}
                            {{-- </div> --}}
    
                            <x-button-wire wire:click="removerImagem({{ $index }})" wire:loading.attr="disabled"
                                icon="trash" spinner negative label="Remover item" />
    
                        </div>
    
                    </div>
                @endforeach
                
               {{--  <div class="w-full">
                    <!-- Modal Alpinejs -->
                        <div x-show="openModal" @click.away="openModal = false" class="fixed inset-0 flex items-center justify-center z-50">
                            <div @click.away="openModal = false" class="w-1/3 border-4 border-gray-200 dark:border-gray-700 bg-white p-4 rounded-lg shadow absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                <img :src="imgModal" alt="Imagem do modal" />                  
                            </div>
                        </div>
                    <!-- Modal Alpinejs fim-->
                </div> --}}
    
            @endif
        </div>
        <!--FIM GRID-->

        <div class="w-full h-12 flex justify-start mt-3 px-1">
            <x-button-wire wire:click="salvarProdutos" wire:loading.attr="disabled" icon="check" spinner positive
                label="Salvar Produtos" />
        </div>
    
    </form>