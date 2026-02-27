{{-- <div>

    <x-notifications z-index="z-50" />
    <x-dialog z-index="z-50" blur="md" align="center" />


    <div name="headers" class="mb-2 bg-gray-200 dark:bg-gray-800 shadow">
    <div class="md:w-10/12 mx-auto py-2 px-2 sm:px-6 lg:px-2">
          <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
            <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
              </svg>
            {{ __('Carrinho compras') }}
        </h2>
    </div>
    </div>

        <div x-data="{ openModal: false, imgModal: '', referenciaModal: '' }" id="desfoque" class="mt-1 md:mt-3 w-full md:w-10/12  mx-auto p-2  bg-white dark:bg-slate-950 rounded-md">


            <div x-data="{ tab: 'first' }">
                <!--TAB - INICIO-->
                <div class="flex">
                    <button :class="{ 'active': tab === 'first', 'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600'
                    : tab === 'first', 'border-b-2 border-gray-300 dark:border-slate-600'
                    : tab !== 'first' }" @click="tab = 'first'" 
                    class="text-gray-600 dark:text-gray-400 py-1 px-3 rounded-t-lg text-sm md:text-base">
                        Itens
                    </button>
        
                    <button :class="{ 'active': tab === 'second', 'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600'
                    : tab === 'second', 'border-b-2 border-gray-300 dark:border-slate-600'
                    : tab !== 'second' }" @click="tab = 'second'" 
                    class="text-gray-600 dark:text-gray-400 py-1 px-3 rounded-t-md text-sm md:text-base">
                        Complementos do pedido
                    </button>

              
            
          
                </div>
                <!--TAB - FIM-->
                
                <!--TABS - INICIO-->
                <div class="bg-gray-200 dark:bg-slate-800 p-2 rounded-b-lg">
                    <div x-show="tab === 'first'" >
                        <div class="mt-2 overflow-y-auto soft-scrollbar max-h-[65vh]">
                            @include('components.cart.cart-itens')
                        </div>

                        <div class="flex justify-between px-2 mt-5 rounded-md dark:bg-slate-900">
                          <span class="text-sm md:text-base font-bold text-gray-600 dark:text-gray-400">
                            Qnde de pares: <span class="text-blue-600 dark:text-blue-400">{{ $produtos_cart->sum('quantidade') }}</span> 
                          </span>

                          @can('VALOR-CART', $permissao)
                          <span class="text-sm md:text-base font-bold text-green-600 dark:text-green-400">
                            R$: {{ $valor_cart }}
                          </span>
                          @endcan

                        </div>

                    </div>
                
                    <div x-show="tab === 'second'">
                        <div class="overflow-y-auto soft-scrollbar min-h-55v max-h-[70vh]">
                            @include('components.cart.cart-pedido')
                        </div>
                    </div>

                    
        
                </div>
                <!--TABS - FIM-->
        
            </div>
         

            </div>
        
        

</div>
 --}}


 <div class="max-w-7xl px-2 m-auto  md:mb-5">
    @include('livewire.cart.cart-new')
 </div>