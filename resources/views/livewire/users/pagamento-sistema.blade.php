<div>
    
    <div class="w-full md:w-10/12 m-auto mt-5 p-1 md:p-5 rounded-md dark:bg-slate-800">

        <div class="flex gap-x-2 items-end  justify-between p-1 md:p-2 dark:bg-slate-700 rounded-md my-2 w-auto">

            <div class="w-full md:w-auto">
                <x-input-wire wire:model.live="search" icon="search" placeholder="pesquise pagamento..." />
            </div>
            <div>
                @can('ADMIN', $permissao)
                    <x-button-wire label="Cadastrar Boleto" positive wire:click="showCreateModal" />
                @endcan
            </div>
        </div>


        <div wire:poll.30s class="overflow-y-auto overflow-x-auto max-h-[33rem] md:max-h-[42rem] soft-scrollbar rounded-lg">
 
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-3 text-center">
                            #
                        </th>

                        <th scope="col" class="px-2 py-3 text-center">
                            Vencimento
                        </th>
                        
                        <th scope="col" class="md:table-cell px-1 py-3 text-center">
                            Status
                        </th>                    

                        <th scope="col" class="px-3 py-3 text-center">
                            Desconto
                        </th>
                        <th scope="col" class="md:table-cell px-1 py-3 text-center">
                            Valor
                        </th>

                        <th scope="col" class="md:table-cell px-1 py-3 text-center">
                            Observação
                         </th>

                        <th scope="col" class="md:table-cell px-1 py-3 text-center">
                            Ação
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pagamentoList as $item)                 
                    
                        <tr wire:key="{{$item->id}}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800  border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">

                            <td class="px-3 py-2 cursor-pointer text-center" wire:click="modalShow({{ $item->id }})">                           
                                <h1 class="font-bold text-blue-600 dark:text-blue-400 text-xs md:text-sm">{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</h1>
                            </td>
 
                            <td class="px-2 py-2">
                                <div class="flex items-center justify-center text-xs md:text-sm">
                                    {{ \Carbon\Carbon::parse($item->vencimento)->format('d/m/Y') }}
                                </div>
                            </td>

                            
                            <td class="px-3 py-2">
                                <div class="flex items-center justify-center ">
                                    
                                    @switch($item->status)
                                        @case('pago')
                                            <h1 class="text-green-500 dark:text-green-400 capitalize text-xs md:text-sm">{{$item->status}}</h1>
                                            @break
                                        @case('aberto')
                                            <h1 class="text-gray-500 dark:text-blue-400 capitalize text-xs md:text-sm">{{$item->status}}</h1>
                                            @break
                                        @case('vencido')
                                            <h1 class="text-red-500 dark:text-red-400 capitalize animate-pulse text-xs md:text-sm">{{$item->status}}</h1>
                                            @break
                                        @default
                                            
                                    @endswitch
                                </div>
                            </td>

                            

                            <td class="px-3 py-2">
                                <div class="flex items-center justify-center text-xs md:text-sm">
                                    {{ $item->desconto }}
                                </div>
                            </td>

                            <td class="px-3 py-2">
                                <div class="flex items-center justify-center text-xs md:text-sm">
                                    {{ $item->valor }}
                                </div>
                            </td>

                            <td class="px-3 py-2">
                                <div class="flex items-center justify-center capitalize text-xs md:text-sm">
                                    {{ $item->observacao }}
                                </div>
                            </td>

                             @can('ADMIN', $permissao)
                            <td class="px-3 py-2">
                                <div class="flex items-center justify-center text-xs md:text-sm">
                                    <x-button-wire negative icon="trash" flat rounded  wire:click="ShowDeletePagamento({{$item->id}})"/>
                                </div>
                            </td>
                            @endcan

                        </tr>

                        

                    @empty
                        <div class="w-full h-10">
                            <h1 class="text-red-500 text-xs md:text-sm">Nenhum pedido encontrado.</h1>
                        </div>
                    @endforelse
                    
                </tbody>
                

            </table>
    
         <!--Serve pra paginate auto usando alpineJs - INICIO -->
            <div class="p-0.5 text-center text-xs " id="jeremias" x-data="{
                jeremias(){
                    const observer = new IntersectionObserver((pagamentoList) => {
                        pagamentoList.forEach((pedido) => {
                            if(pedido.isIntersecting){
                                @this.loadMore()
                            }
                            
                        })
                    })
                    observer.observe(this.$el)
                }
            }" x-init="jeremias">
            @if ($pagamentoList->hasMorePages()) 
                <h1 class="text-green-500 dark:text-green-400 text-xs md:text-sm">Carregando mais registros...</h1>
            @else
                <h1 class="text-yellow-600 dark:text-yellow-300 text-xs md:text-sm">Não existem mais registros para carregar</h1>
            @endif
        </div>


        

        <x-modal-wire name="createPagamentoModal" wire:model="createPagamentoModal">
            <x-card-wire title="Cadastrar Boleto">

                <form wire:submit.prevent="createPagamento">
                    <div class="flex gap-x-2">

                        <div class="w-60">
                            <x-datetime-picker
                                id="default-picker"
                                label="Data vencimento"
                                placeholder="Data"
                                display-format="DD/MM/YYYY"
                                wire:model="vencimento"
                            />
                        </div>

                        <div class="w-40">
                            <x-inputs.currency wire:model.live="desconto"
                                label="Desconto"
                                prefix="R$"
                                placeholder="00"
                                thousands="."
                                precision="4"
                                decimal=","
                            />
                        </div>

                        <div class="w-40">
                            <x-inputs.currency wire:model="valor" wire:model="valor"
                                label="Valor"
                                prefix="R$"
                                placeholder="00"
                                thousands="."
                                precision="4"
                                decimal=","
                            />
                        </div>

                        
                    </div>

                    <div class="w-full">
                        <x-textarea-wire label="Observação" placeholder="Observação do boleto" wire:model="observacao"/>
                    </div>

                    <p>
                        Cadastro de pagamentos do sistema.
                    </p>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <x-button-wire positive label="Cadastrar" wire:click="createPagamento" class="mt-3"/>
                </form>
                
         
                {{-- <x-slot name="footer" class="flex justify-between gap-x-4 w-full">
                    <x-button-wire flat label="Cancelar" x-on:click="close" />        
                    <x-button-wire positive label="Cadastrar" wire:click="createPagamento" />
                </x-slot> --}}
            </x-card-wire>
        </x-modal-wire>

           
        
    </div>
</div>
