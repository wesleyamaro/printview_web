<div class="block md:flex md:gap-x-3 md:items-end md:justify-between w-full">
    {{-- <div class="flex gap-x-2 justify-between">
        <div class="w-40">
            <x-input-wire wire:model.live="search" icon="search" label="Nº pedido" placeholder="Nº pedido..." />
        </div>
    </div>

    @can('ALLPEDIDO', $permissao)
        <div class="flex space-x-2">
            <div class="w-80">
                <x-select autocomplete="off" z-index="z-50" label="Pesquisar por clientes" placeholder="Selecione o cliente"
                    wire:model.live="selectedUser" empty-message="Cliente não encontrado" class="capitalize">
                    @foreach ($userList as $user)
                        <x-select.user-option wire:key="{{ $user->id }}"
                            src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                            label="{{ $user->name }}" value="{{ $user->id }}" description="{{ $user->email }}" />
                    @endforeach
                </x-select>
            </div>


        </div>
    @endcan

        <div class="w-40">
            <x-input-wire wire:model.live="filter_referencia_produto" label="Referência" placeholder="0000" />
        </div>

    
        @canany(['PREFEITURA','ALLPEDIDO'], $permissao)
        <div class="w-60">
            <x-input-wire wire:model.live="nome_prefeitura" icon="search" label="Prefeitura" placeholder="Nome prefeitura..." />
        </div>
        @endcanany

        @cannot('PREFEITURA', $permissao)
        <div class="w-60">
            <x-select label="Grupo" wire:model.live="filterGrupo" placeholder="Selecione o grupo" :options="['bebê', 'feminino', 'infantil', 'juvenil', 'masculino']"
                class="capitalize" />
        </div>
        @endcannot()
    

   
        <div class="flex gap-x-3 w-60">
            <x-datetime-picker id="display-format1" label="Período inicial" placeholder="Data Inicial"
                display-format="DD/MM/YYYY" wire:model.live="data_inicial" class="w-60" />
            <x-datetime-picker id="display-format2" label="Período final" placeholder="Data Final"
                display-format="DD/MM/YYYY" wire:model.live="data_final" class="w-60" />
        </div>


    <div class="flex w-60">
        @can('ALLPEDIDO', $permissao)
            <x-select label="Status pedido" wire:model.live="selectedStatus" placeholder="Selecione o status"
                :options="['Aberto', 'cadastrado', 'Cancelado', 'parcialmente entregue', 'Entregue']" class="capitalize" />
        @elsecan('MENU-PEDIDO', $permissao)
            <x-select label="Status pedido" wire:model.live="selectedStatus" placeholder="Selecione o status"
                :options="['Aberto', 'Cancelado', 'parcialmente entregue', 'Entregue']" />
        @endcan
    </div> --}}


    <div class="relative flex items-end gap-x-3">   

        <div class="w-40">
            <x-input-wire wire:model.live="search" icon="search" label="Nº pedido" placeholder="Nº pedido..." />
        </div>
        
        @can('ALLPEDIDO', $permissao)
                    <div class="flex space-x-2 z-20">
                        <div class="w-96">
                            <x-select autocomplete="off" z-index="z-50" label="Pesquisar por clientes" placeholder="Selecione o cliente"
                                wire:model.live="selectedUser" empty-message="Cliente não encontrado" class="capitalize">
                                @foreach ($userList as $user)
                                    <x-select.user-option wire:key="{{ $user->id }}"
                                        src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                                        label="{{ $user->name }}" value="{{ $user->id }}" description="{{ $user->email }}" />
                                @endforeach
                            </x-select>
                        </div>


                    </div>
         @endcan
         
         
         @cannot('PREFEITURA', $permissao)
                <div class="w-60">
                    <x-select label="Grupo" wire:model.live="filterGrupo" placeholder="Selecione o grupo" :options="['bebê', 'feminino', 'infantil', 'juvenil', 'masculino']"
                        class="capitalize" />
                </div>
                @endcannot()
         
         
         <div class="flex w-60">
                    @can('ALLPEDIDO', $permissao)
                        <x-select label="Status pedido" wire:model.live="selectedStatus" placeholder="Selecione o status"
                            :options="['Aberto', 'cadastrado', 'Cancelado', 'parcialmente entregue', 'Entregue']" class="capitalize" />
                    @elsecan('MENU-PEDIDO', $permissao)
                        <x-select label="Status pedido" wire:model.live="selectedStatus" placeholder="Selecione o status"
                            :options="['Aberto', 'Cancelado', 'parcialmente entregue', 'Entregue']" />
                    @endcan
                </div>

           
           {{-- <x-button-wire 
                label="Limpar filtros"
                wire:click="clearFilters"
                warning
                class="{{ !$hasFilters ? 'hidden' : 'animate-pulse' }}"
            /> --}}

            <div class="w-3 h-3 bg-yellow-300 animate-bounce rounded-full absolute -top-1 right-0 {{ !$hasFilters ? 'hidden' : '' }}"></div>
            <x-button-wire 
                label="+ Filtros de pedidos"
                x-on:click="$openModal('filterModal')"
                orange
                {{-- class="{{ $hasFilters ? 'hidden' : '' }}" --}}
            />
    </div>

    @can('IMPRIMIR-TODOS-PEDIDOS', $permissao)
        <div>
            <x-button-wire label="Imprimir" icon="printer" x-on:click="$openModal('simpleModal')" sky />
        </div>
    @endcan


    <!-- Modal para filtro de pedidos -->
    <x-modal-wire name="filterModal" class="flex justify-center items-center">
        {{-- <x-slot name="title" class="text-lg text-gray-100">Filtros de pedidos</x-slot> --}}
        {{-- <x-card-wire title="Filtros de pedidos" class="w-80"> --}}

            <div class="flex flex-col gap-y-2 p-5 {{-- w-3/6 --}} m-auto bg-gray-100 dark:bg-gray-800 border-8 border-gray-200 dark:border-gray-900 rounded-md">

                <div class="p-2 mb-5 border-b border-gray-200 dark:border-gray-700 w-full">
                    <span class="text-lg text-gray-100">Filtrar pedidos</span>
                </div>

                    <!-- Filtros start -->
                {{--    <div class="flex gap-x-2 justify-between">
                        <div class="w-40">
                            <x-input-wire wire:model.live="search" icon="search" label="Nº pedido" placeholder="Nº pedido..." />
                        </div>
                    </div>

                @can('ALLPEDIDO', $permissao)
                    <div class="flex space-x-2 z-20">
                        <div class="w-96">
                            <x-select autocomplete="off" z-index="z-50" label="Pesquisar por clientes" placeholder="Selecione o cliente"
                                wire:model.live="selectedUser" empty-message="Cliente não encontrado" class="capitalize">
                                @foreach ($userList as $user)
                                    <x-select.user-option wire:key="{{ $user->id }}"
                                        src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                                        label="{{ $user->name }}" value="{{ $user->id }}" description="{{ $user->email }}" />
                                @endforeach
                            </x-select>
                        </div>


                    </div>
                @endcan
                
                --}}

                <!-- Filtro de pedidos por referência do produto -->
                <div class="w-60 relative">
                    <div class="px-1 py-0.5 z-10 text-xs bg-green-300 animate-bounce rounded-full absolute top-3 -right-3">novo</div>
                    <x-input-wire wire:model.live="filter_referencia_produto" label="Referência" placeholder="Busque pedidos pela referência" class="w-full"/>
                </div>

            
                @canany(['PREFEITURA','ALLPEDIDO'], $permissao)
                <div class="w-60">
                    <x-input-wire wire:model.live="nome_prefeitura" icon="search" label="Prefeitura" placeholder="Nome prefeitura..." />
                </div>
                @endcanany

                {{-- @cannot('PREFEITURA', $permissao)
                <div class="w-60">
                    <x-select label="Grupo" wire:model.live="filterGrupo" placeholder="Selecione o grupo" :options="['bebê', 'feminino', 'infantil', 'juvenil', 'masculino']"
                        class="capitalize" />
                </div>
                @endcannot() --}}
            
                <!-- Filtros periodos -->
                <div class="flex gap-x-3 w-72">
                    <x-datetime-picker id="display-format1" label="Período inicial" placeholder="Data Inicial"
                        display-format="DD/MM/YYYY" wire:model.live="data_inicial" class="w-60" />
                    <x-datetime-picker id="display-format2" label="Período final" placeholder="Data Final"
                        display-format="DD/MM/YYYY" wire:model.live="data_final" class="w-60" />
                </div>
    

                {{-- <div class="flex w-60">
                    @can('ALLPEDIDO', $permissao)
                        <x-select label="Status pedido" wire:model.live="selectedStatus" placeholder="Selecione o status"
                            :options="['Aberto', 'cadastrado', 'Cancelado', 'parcialmente entregue', 'Entregue']" class="capitalize" />
                    @elsecan('MENU-PEDIDO', $permissao)
                        <x-select label="Status pedido" wire:model.live="selectedStatus" placeholder="Selecione o status"
                            :options="['Aberto', 'Cancelado', 'parcialmente entregue', 'Entregue']" />
                    @endcan
                </div> --}}


                    {{-- <div class="w-3 h-3 bg-yellow-300 animate-bounce rounded-full absolute -top-1 right-0 {{ !is_null($filter_referencia_produto)  ? '' : 'hidden' }}"></div> --}}
                
                    <div class="flex flex-col items-center justify-center gap-y-3 w-full mt-5">
                        <div wire:loading wire:target="imprimirPedidos">
                            <span class="loading loading-spinner text-green-500 dark:text-green-400">Aguarde... Buscando pedidos.</span>
                            <img src="/img/animation-loading2.gif" alt="" srcset="">
                        </div>


                        
                        <x-button-wire 
                            label="Limpar filtros"
                            wire:click="clearFilters"
                            warning
                            class="{{ !$hasFilters ? 'hidden' : 'animate-pulse' }}"
                        />

                
                    </div>

            </div>

            {{-- <x-slot name="footer" class=" gap-x-4"> --}}

                
            {{-- </x-slot> --}}
        {{-- </x-card-wire> --}}
    </x-modal-wire>



    <x-modal-wire name="simpleModal">
        <x-card-wire title="Filtrar relatório">

            <div class="p-2 bg-yellow-100 dark:bg-yellow-200 rounded-md">
                <span class="text-sm text-red-600">Deixe em branco para mostrar todos os pedidos</span>
                <span class="text-sm text-red-600">( Observacão: Pode
                    demorar para gerar o relatório )</span>
            </div>
            <div class="flex gap-x-2 space-y-0 w-auto mt-5">
                <div class="flex gap-x-3 w-9/12">
                    <x-datetime-picker id="display-format1" label="Período inicial" placeholder="Data Inicial"
                        display-format="DD/MM/YYYY" wire:model.live="filter_data_inicial" class="w-60" />
                    <x-datetime-picker id="display-format2" label="Período final" placeholder="Data Final"
                        display-format="DD/MM/YYYY" wire:model.live="filter_data_final" class="w-60" />
                </div>
            </div>

            <div class="mt-5 flex flex-col gap-4">
                <x-checkbox-wire wire:model="filter_abertos" label="Abertos (Padrão)" />
                <x-checkbox-wire wire:model="filter_cadastrados" label="Cadastrados" />
                <x-checkbox-wire wire:model="filter_parcialmente_entregues" label="Parcialmente Entregues" />
                <x-checkbox-wire wire:model="filter_entregues" label="Entregues" />
            </div>

            <x-slot name="footer" class=" gap-x-4">

                <div class="flex flex-col items-center justify-center gap-y-3 w-full">
                    <div wire:loading wire:target="imprimirPedidos">
                        <span class="loading loading-spinner text-green-500 dark:text-green-400">Aguarde... Gerando
                            relatório.</span>
                        <img src="/img/animation-loading2.gif" alt="" srcset="">
                    </div>


                    @can('IMPRIMIR-TODOS-PEDIDOS', $permissao)
                        <x-button-wire primary label="Imprimir" wire:click="imprimirPedidos" />
                    @endcan
                </div>
            </x-slot>
        </x-card-wire>
    </x-modal-wire>



</div>
