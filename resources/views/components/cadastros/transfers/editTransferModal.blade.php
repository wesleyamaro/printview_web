<x-modal wire:model="editTransferModal" maxWidth="4xl">
    <!--Oficial-->

    <div class="bg-white dark:bg-slate-800 border-4 p-2 dark:border-slate-700 rounded-lg shadow-lg">

        <div class="bg-blue-600 p-2 mb-2 rounded-lg">
            <h1 class="text-white text-2xl">Editar estampa</h1>
        </div>

        <!--Inicio Grid-->
        <div class="grid grid-cols-3 gap-4 h-35v">

            <div class="col-span-2">

                <div class="flex flex-wrap gap-2">

                    <div class="w-28">
                        <x-input-wire wire:model="referencia" tabindex="-1" label="Referência*" placeholder="Referência" />
                    </div>

                    <div class="w-40">
                        <x-select tabindex="-1" label="Gênero*" placeholder="Selecione gênero" wire:model="genero">
                            <x-select.option label="Feminino" value="feminino" />
                            <x-select.option label="Infantil" value="infantil" />
                            <x-select.option label="Masculino" value="masculino" />
                        </x-select>
                    </div>

                    <div class="w-72">
                        <x-select tabindex="-1" label="Marca*" placeholder="Selecione marca"
                            wire:model="selectedMarca">
                            @foreach ($marcaList as $marca)
                                <x-select.option label="{{ $marca->descricao }}" wire:key="{{ $marca->id }}"
                                    value="{{ $marca->id }}" />
                            @endforeach
                        </x-select>
                    </div>

                    <div class="w-60">
                        {{-- <x-select tabindex="-1" label="Produto *" placeholder="Selecione produto" wire:model="tipo">
                            <x-select.option label="Transfer" value="transfer" />
                            <x-select.option label="Termopatch" value="termopatch" />
                        </x-select> --}}
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-300">Tipo*</label>
                        <select wire:model="tipo" class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 text-gray-900 dark:text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="transfer">Transfer</option>
                            <option value="termopatch">Termopatch</option>
                        </select>
                    </div>

                    <div class="w-full">
                        <x-input-wire wire:model="filtros" tabindex="-1" label="Filtros*"
                            placeholder="Filtros separado por virgula Ex.: girassol, borboleta, listrado (Por padrão usar máximo 2 filtros)" />
                    </div>
                    
                    <div class="w-full">
                        <x-input-wire wire:model="medida" tabindex="-1" label="Medida*"
                            placeholder="00x00" />
                    </div>

                </div>

            </div>

            <div class="col-span-1">

                <div class="flex items-center justify-center w-full ">
                    <label title="Clique para carregar a imagem" for="imagem"
                        class="flex flex-col items-center justify-center w-full p-2 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-slate-800 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-800">
                        <div class="flex flex-col items-center text-center justify-center max-h-48 p-1">
                            @if ($imagem && is_object($imagem) && method_exists($imagem, 'temporaryUrl'))
                                <img src="{{ $imagem->temporaryUrl() }}" class="h-52">
                            @else
                                @if ($imagem)
                                    <img src="{{ url('storage/' . $imagem) }}" class="h-52">
                                @endif
                            @endif
                            <p class="mb-1 text-sm text-gray-500 dark:text-gray-400"><span
                                    class="text-2xs font-semibold">Clique para fazer upload</span></p>
                            <p class="text-2xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG ou GIF (MAX.
                                300x300px)</p>
                        </div>
                        <x-input wire:model="imagem" id="imagem" type="file" class="hidden" />
                        <div wire:loading wire:target="imagem">Enviando...</div>
                    </label>

                </div>

                @error('imagem')
                    <span class="error text-sm text-red-600 dark:text-red-300">{{ $message }}</span>
                @enderror

            </div>

        </div>

        <div class="col-span-full md:col-span-full mt-2">
            <div class="text-green-800  p-3 w-full bg-yellow-400 rounded-lg" wire:loading wire:target="imagem">
                Carregando imagem...</div>
        </div>


        <div class="col-span-full md:col-span-12 flex justify-between mt-5">
            <x-button-wire wire:click="saveChanges" type="button" wire:loading.attr="disabled" icon="check" spinner info
                label="Salvar Alteração" />
        </div>

        <!--FIM GRID-->

        <!-- Script JavaScript para atualizar o campo de referência -->
        <script>
            document.getElementById('imagem').addEventListener('change', function() {
                // Obtenha o nome do arquivo selecionado
                var nomeImagem = this.files[0].name;
                @this.dispatch('atualizarCampoReferencia', {
                    nomeImagem
                });

            });
        </script>



    </div>

</x-modal>
