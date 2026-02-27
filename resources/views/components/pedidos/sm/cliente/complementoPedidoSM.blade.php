  <!--Div info inicio -->
  <div class="col-span-full">


      <div class="flex flex-col space-y-1 mb-3">

          <div class="w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Total de itens:
                  <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> {{ $itens_qnde }}</h1>
              </strong>
              <hr class="border border-slate-300 dark:border-slate-600 border-dashed my-2">
              <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Qnde total de pares:
                  <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> {{ $pares_qnde }}</h1>
              </strong>
          </div>


          <div
              class="flex gap-x-2 justify-between w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              {{-- @can('PREFEITURA', $permissao) --}}
              @canany(['PREFEITURA', 'VER TODOS - PEDIDOS'], $permissao)
              <div class="gap-x-2 w-auto">
                  <strong class="dark:text-gray-400 text-sm md:text-base">Prefeitura:</strong>
                  <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize">{{ $prefeitura }}
                  </h1>
              </div>
              @else
              <div class="gap-x-2 w-auto">
                <strong class="dark:text-gray-400 text-sm md:text-base">Marca:</strong>
                <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize">{{ $marca }}
                </h1>
              </div>
              @endcanany
              
          </div>
          
          @cannot('PREFEITURA', $permissao)
          <div class="w-auto border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              <strong class="dark:text-gray-400 text-sm md:text-base">Grupo:</strong>
              <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize">{{ $grupo }}</h1>
          </div>
          

          <div class="w-auto border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
            <strong class="dark:text-gray-400 text-sm md:text-base">Grade:</strong>
            <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize">{{ $grade }}</h1>
        </div>
        @endcannot

          @if ($status == 'solicitando cancelamento')
              <div class="w-auto border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
                  <strong class="dark:text-gray-400 text-sm md:text-base">Status:</strong>
                  <h1 class="animate-bounce  text-orange-600 dark:text-yellow-300 text-sm md:text-base capitalize">
                      {{ $status }}</h1>
              </div>
          @else
              <div class="w-auto border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
                  <strong class="dark:text-gray-400 text-sm md:text-base">Status:</strong>
                  <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize">{{ $status }}
                  </h1>
              </div>
          @endif

          <div
              class="{{-- flex gap-x-2  --}}w-auto border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              <strong class="dark:text-gray-400 text-sm md:text-base">Observações:</strong>
              <div class="soft-scrollbar overflow-y-auto max-h-20">
                  <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize">{{ $observacao }}
                  </h1>
              </div>
          </div>

          <div class="border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              <h1 class="text-gray-600 dark:text-gray-400 "> Motivo solicitação cancelamento:</h1>
              <h1 class="text-orange-600 dark:text-orange-400 text-sm md:text-base capitalize">
                  {{ $motivo_cancelamento }}</h1>
          </div>

          @can('ALLPEDIDO', $permissao)
              <div class="flex gap-x-2 mt-5 py-5 px-2">
                  <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                      alt="Jese image">
                  <div class="ps-1 cursor-pointer" x-on:click="$openModal('simpleModal')">
                      <div class="text-base font-semibold dark:text-gray-300">{{ $username }}</div>
                      <div class="font-normal text-gray-500">{{ $useremail }}</div>
                  </div>
              </div>
          @endcan

          <!-- Accordion inicio -->
          {{-- <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
        <h2 id="accordion-color-heading-1">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-1" aria-expanded="true" aria-controls="accordion-color-body-1">
            <span>Motivo solicitação cancelamento</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
        </button>
        </h2>

        <div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">
        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
           
            <div class="{{ $motivo_cancelamento ? '' : 'hidden' }} border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
                <h1 class="text-gray-600 dark:text-gray-400 "> Motivo solicitação cancelamento:</h1>
                <h1 class="text-orange-600 dark:text-orange-400 text-sm md:text-base"> {{ $motivo_cancelamento }}</h1>
            </div>
            
        </div>
        </div>

    </div> --}}
          <!-- Acordion fim -->

      </div>

  </div>
  <!--Div info fim -->
