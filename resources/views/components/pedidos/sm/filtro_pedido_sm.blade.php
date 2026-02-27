<div class="block md:flex md:gap-x-3 md:items-center md:justify-between w-full">
    <div class="flex gap-x-2 justify-between">
        <div class="w-52">
            <x-input-wire wire:model.live="search" icon="search" placeholder="Nº pedido..." />
        </div>
        <div class="w-full">
            @can('ALLPEDIDO', $permissao)
                <x-select wire:model.live="selectedStatus" placeholder="Selecione o status" :options="['Aberto', 'cadastrado', 'Cancelado', 'parcialmente entregue', 'Entregue']"
                    class="capitalize" />
            @elsecan('MENU-PEDIDO', $permissao)
                <x-select wire:model.live="selectedStatus" placeholder="Selecione o status" :options="['Aberto', 'Cancelado', 'parcialmente entregue', 'Entregue']" />
            @endcan
        </div>
    </div>


    @can('ALLPEDIDO', $permissao)
        <div class="flex gap-x-2 items-center mt-2">
            <div class="flex w-full">
                <div class="w-full">
                    <x-select autocomplete="off" z-index="z-50" placeholder="Selecione o cliente"
                        wire:model.live="selectedUser" empty-message="Cliente não encontrado" class="capitalize">
                        @foreach ($userList as $user)
                            <x-select.user-option wire:key="{{ $user->id }}"
                                src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                                label="{{ $user->name }}" value="{{ $user->id }}" description="{{ $user->email }}" />
                        @endforeach
                    </x-select>
                </div>
            </div>

        </div>
    @endcan

    <div class="flex gap-x-2 items-center mt-2 w-full">
        @can('PREFEITURA', $permissao)
        <div class="w-full">
            <x-input-wire wire:model.lazy="nome_prefeitura" icon="search" placeholder="Nome prefeitura..." class="w-full"/>
        </div>
        @else
        <x-select wire:model.live="filterGrupo" placeholder="Grupo (Padrão Todas)"
            :options="['bebê', 'feminino', 'infantil', 'juvenil', 'masculino']" class="capitalize" />
        @endcan


        @can('ALLPEDIDO', $permissao)
            <div>
                <x-button-wire label="Filtros" icon="filter" {{-- outline --}} warning hover="warning" focus:solid.gray
                    x-on:click="$openModal('createPagamentoModal')" />
            </div>
        @endcan
    </div>



    <x-modal-wire name="createPagamentoModal">
        <x-card-wire title="Filtrar por período">
            <div class="flex flex-col gap-y-2 justify-center p-3  w-full">

                <div class="w-full">
                    <x-input-wire wire:model.lazy="nome_prefeitura" icon="search" placeholder="Nome prefeitura..." class="w-full"/>
                </div>

                <div class="flex gap-x-3">
                    <x-datetime-picker id="display-format1" label="Período inicial" placeholder="Data Inicial"
                        display-format="DD/MM/YYYY" wire:model.live="data_inicial" class="w-60" />
                    <x-datetime-picker id="display-format2" label="Período final" placeholder="Data Final"
                        display-format="DD/MM/YYYY" wire:model.live="data_final" class="w-60" />
                </div>


                <!-- MODAL FILTRAR PEDIDOS E REPORT - START -->

                @can('IMPRIMIR-TODOS-PEDIDOS', $permissao)
                    <div class="mt-5 w-full">
                        <x-button-wire label="Imprimir relatório" x-on:click="$openModal('simpleModal')" primary
                            class="w-full" />
                    </div>
                @endcan


                <x-modal-wire name="simpleModal">
                    <x-card-wire title="Filtrar relatório">
                        {{-- @can('ENTREGAR-PEDIDO', $permissao)
                            <div>
                                <x-select label="Status pedido" wire:model.live="statusSelectedReport"
                                    placeholder="Selecione o status (Padrão Aberto)" :options="['Aberto', 'cadastrado', 'Cancelado', 'parcialmente entregue', 'Entregue']" />
                            </div>
                        @endcan --}}
                        <div class="p-2 bg-yellow-100 dark:bg-yellow-200 rounded-md">
                            <span class="text-sm text-red-600">Deixe em branco para mostrar todos os pedidos</span>
                            <span class="text-sm text-red-600">( Observacão: Pode
                                demorar para gerar o relatório )</span>
                        </div>
                        <div class="flex gap-x-2 space-y-0 w-auto mt-5">
                            <div class="flex gap-x-3 w-full">
                                <x-datetime-picker id="display-format1" label="Período inicial"
                                    placeholder="Data Inicial" display-format="DD/MM/YYYY"
                                    wire:model.live="filter_data_inicial" class="w-60" />
                                <x-datetime-picker id="display-format2" label="Período final" placeholder="Data Final"
                                    display-format="DD/MM/YYYY" wire:model.live="filter_data_final" class="w-60" />
                            </div>
                        </div>

                        <div class="mt-5 flex flex-col gap-4">
                            <x-checkbox-wire wire:model="filter_abertos" label="Abertos (Padrão)" />
                            <x-checkbox-wire wire:model="filter_cadastrados" label="Cadastrados" />
                            <x-checkbox-wire wire:model="filter_parcialmente_entregues"
                                label="Parcialmente Entregues" />
                            <x-checkbox-wire wire:model="filter_entregues" label="Entregues" />
                        </div>

                        <x-slot name="footer" class=" gap-x-4">

                            <div class="flex flex-col items-center justify-center gap-y-3 w-full">
                                <div wire:loading wire:target="imprimirPedidos">
                                    <span class="loading loading-spinner text-green-500 dark:text-green-400">Aguarde...
                                        Gerando
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

                <!-- MODAL FILTRAR PEDIDO E REPORT - END -->










            </div>
        </x-card-wire>
    </x-modal-wire>

    <!--MODAL MOSTRA MSG DE FALTA DE PAGAMENTO -->
   {{--  @can('PAGAMENTO', $permissao)
        <x-modal name="PagamentoModal">
            <div class="flex gap-x-2 justify-center p-3 w-full bg-yellow-100 dark:bg-yellow-400">
                <div class="flex gap-x-3 ">
                    <h1>Por gentileza, note que ainda não conseguimos registrar a confirmação do seu pagamento. no valor de:
                        <span class="font-bold">R$ </span>
                    </h1>
                </div>
            </div>
        </x-modal>
    @endcan --}}
    <!--MODAL MOSTRA MSG DE FALTA DE PAGAMENTO -->




</div>
