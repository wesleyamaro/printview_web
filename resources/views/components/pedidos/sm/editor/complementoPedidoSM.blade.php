  <!--Div info inicio -->
  <div class="col-span-full">


    <div class="flex flex-col space-y-3 mb-3">

        <div class="w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2" >
            <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Total de itens: 
                <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> {{ $itens_qnde }}</h1>
            </strong>
            <hr class="border border-slate-300 dark:border-slate-600 border-dashed my-2">
            <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Qnde total de pares: 
                <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> {{ $pares_qnde }}</h1>
            </strong>
        </div>

        <div class="w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2" >
  
            
            <div class="w-full rounded-md ">
                <x-input-wire wire:model="marca" label="Marca:" placeholder="****" /> 
            </div>

            @can('EDIT-STATUS-PEDIDO', $permissao)
                <div class="flex items-end gap-x-2 w-full">
                    <x-select autocomplete="off" label="Altere o status" wire:model="statuspedido" placeholder="Selecione o status" :options="['Aberto','cadastrado', 'Cancelado']"/>                                    
                    <x-button-wire wire:click="alterarStatus" emerald  label="Alterar" />
                </div>
            @endcan
            

            
            <div class="w-full"> 
                <x-textarea-wire label="Observações" wire:model="observacao" placeholder="Observação do pedido..." />
                {{-- <x-input-wire label="Observações" wire:model="observacao"  rows="4" class="max-h-20 overflow-y-auto soft-scrollbar block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-blue-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Observação do pedido..."/> --}}
            </div>


        </div>

         <div class="{{ $motivo_cancelamento ? '' : 'hidden' }} border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
            <h1 class="text-gray-600 dark:text-gray-400 "> Motivo solicitação cancelamento:</h1>
            <h1 class="text-orange-600 dark:text-orange-400 text-sm md:text-base"> {{ $motivo_cancelamento }}</h1>
        </div> 

    </div>

</div>
<!--Div info fim -->