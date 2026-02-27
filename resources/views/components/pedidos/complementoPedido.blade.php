<!--inicio -->

{{-- <div class="col-span-full md:col-span-6 md:px-2 flex flex-col justify-between rounded-md  md:space-y-0 bg-gray-100 dark:bg-slate-900">
       --}}                  
    <div class="flex flex-col justify-between h-full ">
        
            <!--grupo 1 inicio -->
            <div class="space-y-3 mb-3">

                <div class="border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2" >
                    <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Total de itens: 
                        <h1 class="text-blue-600 dark:text-blue-400 text-sm md:text-base"> {{ $itens_qnde }}</h1>
                    </strong>
                    <hr class="border border-slate-300 dark:border-slate-600 border-dashed my-2">
                    <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Qnde total de pares: 
                        <h1 class="text-blue-600 dark:text-blue-400 text-sm md:text-base"> {{ $pares_qnde }}</h1>
                    </strong>
                </div>
                        
                @can('EDIT-PEDIDO', $permissao)
                    <div class="border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md  p-2">
                        <h1 class="text-gray-600 dark:text-gray-400">Marca:</h1>
                        <x-input-wire wire:model="marca" placeholder="****" /> 
                    </div>
                    <div class="h-full">
                        <x-textarea-wire label="Observações" placeholder="Observação do pedido" wire:model="observacao" class="h-full"/>
                    </div>
                    @else
                    <div class="border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md  p-2">
                        <h1 class="text-gray-600 dark:text-gray-400 text-sm md:text-base">Marca:</h1>
                        <span class="text-blue-600 dark:text-blue-400 text-sm md:text-base" >{{$marca}}</span>
                    </div> 
                    <div class="border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md  p-2">
                        <h1 class="text-gray-600 dark:text-gray-400 text-sm md:text-base">Observação:</h1>
                        <span class="text-yellow-600 dark:text-yellow-300 text-sm md:text-base" >{{$observacao}}</span>
                    </div>                       
                @endcan

        </div>
            <!--grupo 1 fim -->

            <!--grupo 2 inicio-->
            <div class="md:flex items-end justify-between space-y-3">
                @can('EDIT-STATUS-PEDIDO', $permissao)
                <div class="flex items-end gap-x-2 w-full md:w-60">
                    <x-select autocomplete="off" label="Altere o status pedido" wire:model="statuspedido" placeholder="Selecione o status" :options="['Aberto', 'Produção', 'Cancelado', 'Concluido' , 'Finalizado']"/>                                    
                    <x-button-wire wire:click="alterarStatus" emerald  label="Alterar" />
                </div>
                @endcan

                <div class="text-center px-2">
                    <h1 tabindex="1" class="focus:outline-none font-bold text-gray-500 dark:text-gray-300 text-sm md:text-base">Data criação:  <span class="font-bold dark:text-green-400 text-sm md:text-base">{{ $data_created }}</span> </h1>               
                </div>
            </div>
            <!--grupo 2 fim-->

    </div>

{{-- </div> --}}

<!--Fim -->