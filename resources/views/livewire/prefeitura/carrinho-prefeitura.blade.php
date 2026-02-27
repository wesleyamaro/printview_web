<div>

    <div class="dark:bg-slate-800 p-2">
        <div class="p-2 dark:bg-slate-950">
            <h1 class="text-orange-400">Cadastrar pedido - Prefeitura</h1>
        </div>

        <!--DIV GRID - Inicio -->
        <div class="grid grid-cols-12 gap-x-2 mt-3 space-y-2 md:space-y-0 p-2">

            <div class="col-span-full md:col-span-3 grid grid-cols-12 md:grid-cols-3 gap-x-2">
                <div class="col-span-4 md:col-span-1">
                    <x-select autocomplete="off" z-index="z-50" label="UF"
                        placeholder="Escolha UF" wire:model.live="selectedUf"
                        empty-message="UF não encontrado" class="uppercase">
                        @foreach ($ufList as $ufs)
                            <x-select.option wire:key="{{ $ufs->id }}" label="{{ $ufs->uf }}" value="{{ $ufs->uf }}" />
                        @endforeach
                    </x-select>
                </div>
                <div class="col-span-8 md:col-span-2">
                    <x-select autocomplete="off" z-index="z-50" label="Escolha o município"
                        placeholder="Selecione o municipio" wire:model="selectedMunicipio"
                        empty-message="Selecione o UF primeiro - municipío não encotrado" >
                        @foreach ($municipioList as $municipio)
                            <x-select.option class="capitalize" wire:key="{{ $municipio->id }}" label="{{ $municipio->nome . '-' .$municipio->uf }}"
                                value="{{ $municipio->id }}" />
                        @endforeach
                    </x-select>
                </div>
            </div>

            <div class="col-span-full md:col-span-4">
                <x-select wire:model.live="gabaritos" label="Selecione gabarito" placeholder="Selecione os gabaritos" multiselect
                :options="['Etiq. Língua', 'Velcro 023', 'Velcro 018', 'Papete','Gorgurão']"
            />
            </div>

        <div class="col-span-full md:col-span-full">
            <x-textarea-wire wire:model="observacao" label="Observação" placeholder="Observação do pedido" />
        </div>

        <!--Componente enviar imagem - Inicio -->
        <div class="col-span-full md:col-span-full">
        <label for="" class="text-gray-600 dark:text-gray-400 text-sm md:text-base">Adicione a imagem ( Possui imagem? adicione ao pedido)</label>
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-20 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-800 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-700">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-1 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Clique para carregar</span> ou arraste e solte</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG ou JPG (MAX. 1024x840px)</p>
                    </div>

                    {{-- @can('MULTIPLE-UPLOAD', $permissao) --}}
                    <input wire:model="imagens" id="dropzone-file" type="file" class="hidden" multiple />
                    {{-- @elsecan('MENU-CARRINHO', $permissao)                       
                        <input  wire:model.live="imagem" id="dropzone-file" type="file" class="hidden" />
                    @endcan --}}
                </label>
            </div> 
        </div>
        <!--Componente enviar imagem - Fim -->

        <!--IMG UPLOAD - Inicio -->
        {{-- <div class="col-span-full md:col-span-7 max-h-96 overflow-y-auto flex flex-wrap md:gap-x-2 border-2 border-gray-600 border-dashed mt-5 rounded-md p-3"> --}}
            <div class="col-span-full md:col-span-12  grid grid-cols-12 max-h-60 md:max-h-[40vh] overflow-y-auto soft-scrollbar gap-x-2 border-2 border-gray-600 border-dashed mt-5 rounded-md p-3">
            @if (!empty($imagens))

            @foreach ($imagens as $index => $imagem)
                <div class="block col-span-4 md:col-span-2 text-center p-1 bg-gray-100 dark:bg-slate-700 rounded-lg border-2 border-dotted border-slate-400 dark:border-slate-500">

                    <div class="rounded-lg">
                        <img @click="openModal = true; 
                            imgModal = '{{ $imagem->temporaryUrl() }}'";
                            class="cursor-pointer p-1 mx-auto rounded-lg min-h-28 max-h-32 md:min-h-32  w-full md:w-auto md:h-40" src="{{ $imagem->temporaryUrl() }}" alt="imagem do produto" />
                    </div>

                    <div class="">
                        <x-button-wire wire:click="removerImagem({{ $index }})" wire:loading.attr="disabled"
                            icon="trash" spinner negative label="Remover" />
                    </div>

                </div>
            @endforeach
            
            <div class="w-full">
                <!-- Modal Alpinejs -->
                   {{--  <div x-show="openModal" @click.away="openModal = false" class="fixed inset-0 flex items-center justify-center z-50">
                        <div @click.away="openModal = false" class="w-1/3 border-4 border-gray-200 dark:border-gray-700 bg-white p-4 rounded-lg shadow absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <img :src="imgModal" alt="Imagem do modal" />                  
                        </div>
                    </div> --}}
                <!-- Modal Alpinejs fim-->
            </div>

        @endif




        </div>
        <!--IMG UPLOAD - Fim -->

        <div class="col-span-full py-2">
            <x-button-wire wire:click="confirmarPedido" label="Confirmar pedido" positive class="w-full"/>
        </div>

        </div>
        <!--DIV GRID - fim -->


    </div>
</div>
