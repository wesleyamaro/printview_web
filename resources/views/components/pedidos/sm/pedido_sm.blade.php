<!-- cabeçalho pedido inicio -->
<div>
    @can('EDIT-PEDIDO', $permissao)
        @include('components.pedidos.sm.editor.cabecalhoPedidoSM') <!-- EDITOR -->
    @else
        @include('components.pedidos.sm.cliente.cabecalhoPedidoSM') <!-- CLIENTE -->
    @endcan
</div>
<!-- cabeçalho pedido fim -->





  <div x-data="{ tab: 'first' }">
    <!--TAB - INICIO-->
    <div class="flex">
        <button :class="{ 'active': tab === 'first', 'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600'
        : tab === 'first', 'border-b-2 border-gray-300 dark:border-slate-600'
        : tab !== 'first' }" @click="tab = 'first'" 
        class="text-gray-600 dark:text-gray-400 py-1 px-3 rounded-t-lg text-sm md:text-base">
            Itens do pedido
        </button>

        <button :class="{ 'active': tab === 'second', 'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600'
        : tab === 'second', 'border-b-2 border-gray-300 dark:border-slate-600'
        : tab !== 'second' }" @click="tab = 'second'" 
        class="text-gray-600 dark:text-gray-400 py-1 px-3 rounded-t-md text-sm md:text-base">
            Informações do pedido
        </button>

        @can('CORREIA-PEDIDO', $permissao)
        <button :class="{ 'active': tab === 'terceiro', 'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600'
        : tab === 'terceiro', 'border-b-2 border-gray-300 dark:border-slate-600'
        : tab !== 'terceiro' }" @click="tab = 'terceiro'" 
        class="text-gray-600 dark:text-gray-400 py-1 px-3 rounded-t-md text-sm md:text-base">
            Correia(s) do pedido
        </button>
        @endcan

    </div>
    <!--TAB - FIM-->
    
    <!--TABS - INICIO-->
    <div class="bg-gray-200 dark:bg-slate-800 p-1 rounded-b-lg">
        <div x-show="tab === 'first'" >
            <div class="mt-2 min-h-65v max-h-65v soft-scrollbar overflow-y-auto">
                
                
                 <!-- itens pedido inicio -->
                 <div>
                    @can('EDIT-PEDIDO', $permissao)
                        @include('components.pedidos.sm.editor.itensPedidoSM') <!-- EDITOR -->
                    @else
                        @include('components.pedidos.sm.cliente.itensPedidoSM2') <!-- CLIENTE -->
                    @endcan
                </div>
                <!-- itens pedido fim -->


            </div>
        </div>
    
        <div x-show="tab === 'second'">
            <div class="mt-2 min-h-65v max-h-65v soft-scrollbar overflow-y-auto">
                
                
                <!-- complemento pedido inicio -->
                <div>  
                    @can('EDIT-PEDIDO', $permissao)
                        @include('components.pedidos.sm.editor.complementoPedidoSM') <!-- EDITOR -->
                    @else
                        @include('components.pedidos.sm.cliente.complementoPedidoSM') <!-- CLIENTE -->
                    @endcan
                </div>
                <!-- complemento pedido fim -->

            </div>
        </div>


        <div x-show="tab === 'terceiro'">
            <div class="mt-2 min-h-65v max-h-65v soft-scrollbar overflow-y-auto">
                
                
                <!-- complemento pedido inicio -->
                <div>  
                    @can('EDIT-PEDIDO', $permissao)
                        @include('components.pedidos.sm.editor.correiaPedidoSM') <!-- EDITOR -->
                    @else
                        @include('components.pedidos.sm.cliente.correiaPedidoSM') <!-- CLIENTE -->
                    @endcan
                </div>
                <!-- complemento pedido fim -->

            </div>
        </div>

    </div>
    <!--TABS - FIM-->

</div>