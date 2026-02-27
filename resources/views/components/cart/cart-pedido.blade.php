<div class="flex flex-col md:mb-2 gap-y-1">


    <div class="p-1 border-dashed border-2 border-gray-300 dark:border-gray-600 rounded-lg">
        <x-input-wire wire:model.live="marca" label="Marca*" placeholder="Esse pedido será feito em qual marca?*" />
        
    </div>

    <div class="p-1 w-full border-dashed border-2 border-gray-300 dark:border-gray-600 rounded-lg">
        <x-select label="Grupo*" wire:model.live="grupo" placeholder="Selecione o grupo" :options="['bebê', 'feminino', 'infantil', 'juvenil', 'masculino']"
            class="capitalize" />
    </div>

    <div class="p-1 w-full border-dashed border-2 border-gray-300 dark:border-gray-600 rounded-lg">
        <x-textarea-wire wire:model.live="grade" label="Grade*" placeholder="Qual a grade do pedido? Ex.: 33/34:20 35/36: 40 ou 2-4-4-2
" class="h-16"/>
    </div>

    <div class="p-1 w-full border-dashed border-2 border-gray-300 dark:border-gray-600 rounded-lg">
        <x-textarea-wire wire:model.live="observacao" label="Observação" placeholder="Gostaria de adicionar alguma observação sobre o seu pedido?" class="h-16"/>
    </div>


    <div class="p-1 border-dashed border-2 border-gray-300 dark:border-gray-600 rounded-lg">

        <form wire:submit="salvarImagens" enctype="multipart/form-data">
            <label class="block mb-1 p-2 rounded-lg text-sm md:text-base font-medium text-orange-600 dark:text-orange-600 bg-yellow-100" for="file_input">
                Não encontrou a estampa desejada? Envie sua ideia e nós a desenvolvemos para você.
            </label>

            <div class="text-green-400 flex justify-center w-full" wire:loading wire:target="imagens">
                {{-- <span class="loading loading-spinner mt-2 "></span> Enviando...</span> --}}
                <div class="p-2">
                    {{--<img src="https://printview.shop/img/animations/animation-1709438932456.gif" alt="" class="w-32 mx-auto">--}}
                    <img src="{{ asset('img/animations/animation-1709438932456.gif') }}"alt="" class="w-32 mx-auto" >

                    <h1 class="text-green-600 dark:text-green-400 mt-2 text-center">Aguarde! Enviando suas imagens...</h1>
                </div>
                
            </div>
            
            {{-- <label for="" class="text-gray-600 dark:text-gray-400 text-sm md:text-base">Adicione a imagem </label> --}}
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full {{-- h-32 --}} border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-800 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-700">
                    <div class="flex flex-col items-center justify-center pt-2 pb-2">
                        <svg class="w-8 h-8 mb-1 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-1 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Clique para carregar</span> ou arraste e solte</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG ou JPG (MAX. 1024x840px)</p>
                    </div>

                    @can('MULTIPLE-UPLOAD', $permissao)
                    <input wire:model="imagens" id="dropzone-file" type="file" class="hidden" multiple />
                    @elsecan('MENU-CARRINHO', $permissao)                       
                        <input  wire:model.live="imagem" id="dropzone-file" type="file" class="hidden" />
                    @endcan

                </label>
            </div> 

            

        </form>
        <div class="flex justify-center w-full">
            @error('imagens') <span class="error bg-red-600 p-1 rounded-md w-full mx-auto mt-2 text-sm text-white">{{ $message }}</span> @enderror
        </div>     
        

        </div>


        @if(!$imagens)
        <div class="mb-2">
            <x-button-wire wire:click="showConfirmPedido" wire:loading.attr="disabled" teal icon="check" label="Confirmar Pedido" spinner  class="w-full mt-3"/>
        </div>
            
        @endif
</div>