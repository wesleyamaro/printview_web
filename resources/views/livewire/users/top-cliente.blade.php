<div>
    
    
    {{-- <div class="flex gap-x-3 w-full md:w-10/12 mx-auto my-2 px-2 sm:px-3 lg:px-8 py-2 rounded-lg bg-gray-200 dark:bg-slate-800">
        <h2 class="font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight flex items-center gap-x-3">
            <i class="material-icons">lock</i> {{ __('Top clientes') }}
        </h2>

        <!--Notificação wireui-->
        <x-notifications position="top-right" /> 
    

        @if(session('error'))
        <div class="bg-red-600 text-white py-1 px-2 rounded-md max-w-7xl">
            {{ session('error') }}
        </div>
        @endif 
    </div> --}}
    <x-slot name="header">
        <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
            <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m11.479 1.712 2.367 4.8a.532.532 0 0 0 .4.292l5.294.769a.534.534 0 0 1 .3.91l-3.83 3.735a.534.534 0 0 0-.154.473l.9 5.272a.535.535 0 0 1-.775.563l-4.734-2.49a.536.536 0 0 0-.5 0l-4.73 2.487a.534.534 0 0 1-.775-.563l.9-5.272a.534.534 0 0 0-.154-.473L2.158 8.48a.534.534 0 0 1 .3-.911l5.294-.77a.532.532 0 0 0 .4-.292l2.367-4.8a.534.534 0 0 1 .96.004Z"/>
            </svg>
            {{ __('Top clientes') }}
        </h2>
    </x-slot>

    <!--Notificação wireui-->
    <x-notifications position="top-right" /> 


    <div class="w-full md:w-10/12 px-2 mx-auto mt-2 sm:px-2 lg:p-3 bg-gray-300 dark:bg-slate-800  rounded-lg">    
    



         <!--FIM DIV MOLDE -->
        <div class="grid grid-cols-12 gap-x-5 py-2 md:py-0 shadow-xl sm:rounded-lg">
           
            <!--COLUNA ESQ - INICIO  -->
            <div class="col-span-full md:col-span-12 p-2 dark:bg-slate-900 rounded-lg">

                <!--FILTROS -INICIO -->
                <div class="md:flex items-end gap-2 mb-2 w-full">
                  <div class="py-2 md:w-96 md:py-0">
                    <x-select  placeholder="Selecione o cliente"
                    
                        label="Clientes"
                        wire:model.live="selectedUser" empty-message="Cliente não encontrado">
                        @foreach ($userList as $user)
                            <x-select.user-option 
                            wire:key="{{ $user->id }}"
                            src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                            {{-- src="{{ asset('storage/' . $user->profile_photo_path ?? 'https://cdn-icons-png.flaticon.com/512/149/149071.png') }}" --}}
                            label="{{ $user->name }}" 
                            value="{{ $user->id }}" 
                            description="{{ $user->email }}"/>                       
                        @endforeach
                    </x-select>
                  </div>

                  <div class="flex gap-x-3 ">
                    <x-datetime-picker
                        label="Período inicial"
                        placeholder="Data Inicial"
                        display-format="DD-MM-YYYY"
                        wire:model.live="dataInicial"
                        class="soft-scrollbar md:w-auto"
                    />
                    <x-datetime-picker
                        label="Período final"
                        placeholder="Data Final"
                        display-format="DD-MM-YYYY"
                        wire:model.live="dataFinal"
                        class="soft-scrollbar md:w-auto"
                    />
                </div>
                

                <div class="flex w-full mt-2 md:mt-0">
                    @if ($dataInicial && $dataFinal)
                    <x-button-wire wire:click="generatePdf" icon="printer" teal label="Imprimir" class="w-full md:w-auto"/>
                    @endif                    
                </div>

                </div>

                <div class="shadow-md sm:rounded-lg overflow-y-auto hide-scrollbar max-h-70v md:max-h-70v">

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead
                            class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
     
                                <th scope="col" class="px-2 py-3">
                                    Cliente
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Pedidos
                                </th>
                                <th scope="col" class="px-2s py-3">
                                    Total pares
                                </th>
                                <th scope="col" class="px-2s py-3">
                                    Ultimo pedido
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- @foreach ($topClientes as $topcliente)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-8 h-8 rounded-full" src="{{ $topcliente->user->profile_photo_path ? asset('storage/' . $topcliente->user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}" alt="Foto">
                                        <div class="ps-3">
                                            <div class="text-sm md:text-base font-semibold uppercase">{{ $topcliente->user->name }}</div>
                                            <div class="text-xs md:text-sm font-normal text-gray-500">{{ $topcliente->user->email }}</div>
                                        </div>  
                                    </th>
                                    <td class="px-6 py-4 uppercase">
                                        {{ $topcliente->count_pedidos  }}
                                    </td>
                                    <td class="px-6 py-4 uppercase dark:text-green-400">
                                        {{ $topcliente->total_items  }}
                                    </td> 
                                </tr>
                            @endforeach --}}

                            @foreach ($topClientes as $topcliente)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-8 h-8 rounded-full" src="{{ $topcliente->profile_photo_path ? asset('storage/' . $topcliente->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}" alt="Foto">
                                        <div class="ps-3">
                                            <div class="text-sm md:text-base font-semibold uppercase">{{ $topcliente->name }}</div>
                                            <div class="text-xs md:text-sm font-normal text-gray-500">{{ $topcliente->email }}</div>
                                        </div>  
                                    </th>
                                    <td class="px-6 py-4 uppercase">
                                        {{ $topcliente->total_pedidos  }}
                                    </td>
                                    <td class="px-6 py-4 uppercase dark:text-green-400">
                                        {{ $topcliente->total_items  }}
                                    </td> 
                                    <td class="px-6 py-4 uppercase dark:text-blue-400">
                                        {{ \Carbon\Carbon::parse($topcliente->ultimo_pedido)->format('d/m/Y') }}
                                    </td> 
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div class="p-1" id="jeremias" x-data="{
                        jeremias(){
                            const observer = new IntersectionObserver((topClientes) => {
                                topClientes.forEach((topcliente) => {
                                    if(topcliente.isIntersecting){
                                        @this.loadMore()
                                    }
                                    
                                })
                            })
                            observer.observe(this.$el)
                        }
                    }" x-init="jeremias"></div>

                </div>

            </div>




        </div>
    {{-- </div> --}}

</div>
