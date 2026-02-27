  <!--Div info inicio -->
  <div class="col-span-full">


      <div class="flex flex-col space-y-3 mb-3">

          <div
              class="flex justify-between w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Total de itens:
                  <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> {{ $itens_qnde }}</h1>
              </strong>
              {{-- <hr class="border border-slate-300 dark:border-slate-600 border-dashed my-2"> --}}
              <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Qnde total de pares:
                  @cannot('OCUTAR-QNDE-ITEM-PEDIDO', $permissao)
                      <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> {{ $pares_qnde }}</h1>
                  @endcan
              </strong>
          </div>

          {{--  <div class="flex gap-x-2 justify-between bg-yellow-300  w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2" >
               
                <div class=" bg-violet-400">
                    <strong class="dark:text-gray-400 text-sm md:text-base">Marca: 
                    <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> {{ $marca }}</h1>
                </div>

                @if ($status == 'solicitando cancelamento') 
                    <div class="w-32 bg-blue-400">
                        <strong class="dark:text-gray-400 text-sm md:text-base">Status: 
                        <h1 class="animate-bounce text-orange-600 dark:text-yellow-400 text-sm md:text-base"> {{ $status }}</h1>
                    </div>
                @else
                    <div class="w-32 bg-red-400">
                        <strong class=" dark:text-gray-400 text-sm md:text-base">Status: 
                        <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> {{ $status }}</h1>
                    </div>                    
                @endif

                <div class="bg-cyan-300">
                    <strong class=" dark:text-gray-400 text-sm md:text-base">Observações: 
                    <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> {{ $observacao }}</h1>
                </div>
 
        </div> --}}
          

          @if ($status == 'solicitando cancelamento')
                  <div class="flex gap-x-2 border-2 border-dotted border-slate-300 dark:border-slate-600 p-2 rounded-md w-full">
                      <strong class="dark:text-gray-400 text-sm md:text-base">Status:</strong>
                      <h1 class="animate-bounce text-orange-600 dark:text-yellow-400 text-sm md:text-base capitalize">
                          {{ $status }}</h1>
                  </div>
              @else
                  <div class="flex gap-x-2 border-2 border-dotted border-slate-300 dark:border-slate-600 p-2 rounded-md w-full">
                      <strong class="dark:text-gray-400 text-sm md:text-base">Status:</strong>
                      <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize">{{ $status }}
                      </h1>
                  </div>
              @endif


           
            @canany(['PREFEITURA', 'TESTE'], $permissao)
            <div class="flex gap-x-2 w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
                <strong class="dark:text-gray-400 text-sm md:text-base">Prefeitura:</strong>
                <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize">{{ $prefeitura }}
                </h1>
            </div>
            @endcanany
         

          @cannot('PREFEITURA', $permissao)
          <div class="flex gap-x-2  w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              <strong class="dark:text-gray-400 text-sm md:text-base">Marca:</strong>
              <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize">{{ $marca }}
              </h1>
          </div>  
          @endcannot

          @cannot('PREFEITURA', $permissao)
          <div class="flex gap-x-2 border-2 border-dotted border-slate-300 dark:border-slate-600 p-2 rounded-md w-full">
            <strong class="dark:text-gray-400 text-sm md:text-base">Grupo:</strong>
            <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize">{{ $grupo }}
            </h1>
          </div>
         

        <div class="flex gap-x-2 border-2 border-dotted border-slate-300 dark:border-slate-600 p-2 rounded-md w-full">
            <strong class="dark:text-gray-400 text-sm md:text-base">Grade:</strong>
            <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize">{{ $grade }}
            </h1>
        </div>
        @endcannot

          <div class="flex gap-x-2 border-2 border-dotted border-slate-300 dark:border-slate-600 p-2 rounded-md w-full">
              <h1 class="text-gray-600 dark:text-gray-400 "> Motivo do cancelamento:</h1>
              <h1 class="text-orange-600 dark:text-orange-400 text-sm md:text-base capitalize">
                  {{ $motivo_cancelamento }}</h1>
          </div>




          <div class="gap-x-2 border-2 border-dotted border-slate-300 dark:border-slate-600 p-2 rounded-md w-full">
              <strong class="dark:text-gray-400 text-sm md:text-base">Observações:</strong>
              <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize">{{ $observacao }}</h1>
          </div>
          
          <div class="py-5 w-full">
            <x-button-wire label="Imprimir Pedido" icon="printer" wire:click="imprimirOrder({{ $idpedido }})" class="w-full" />
          </div>

          <button class="text-white bg-blue-700 rounded-md" wire:click="generatePdf({{ $idpedido }})"
              wire:loading.attr="disabled">
              <span wire:loading.remove>Imprimir pedido</span>
              <div wire:loading>Gerando relatório...</div>
          </button>


      </div>

  </div>
  <!--Div info fim -->
