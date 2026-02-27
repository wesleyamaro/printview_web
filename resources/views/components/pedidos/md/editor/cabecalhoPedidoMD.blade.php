     <!--Div cabeçalho inicio -->
     <div class="col-span-full flex justify-between p-2 mb-2 rounded-md bg-gray-300 dark:bg-gray-950">

        <!--Div pedido inicio -->
       <div class="w-full md:w-auto flex justify-between">
           

          {{--  @can('EDIT-PEDIDO', $permissao) --}}
               {{-- <div class="md:hidden">
                   <h1 class="font-bold text-gray-600 dark:text-gray-300 text-sm md:text-base">Pedido nº:  <span class="font-bold dark:text-green-400">{{ str_pad($idpedido, 4, '0', STR_PAD_LEFT)  }}</span> </h1>
                   <h1 class="font-bold text-gray-600 dark:text-gray-300 text-sm md:text-base">Modelo nº:  <span class="font-bold dark:text-blue-400">{{ $pedido_modelo }}</span> </h1>
               </div> --}}
               <div class="hidden md:block">
                   <h1 class="font-bold text-gray-600 dark:text-gray-300 text-sm md:text-base">Pedido nº:  <span class="font-bold text-green-600 dark:text-green-400">{{ str_pad($idpedido, 4, '0', STR_PAD_LEFT)  }}</span> </h1>
                   <div class="flex gap-x-2 items-center rounded-md md:w-60">                   
                       <strong class="flex font-bold text-gray-600 dark:text-gray-300 text-nowrap text-sm md:text-base">Modelo nº:</strong>                       
                       <input wire:model="pedido_modelo" placeholder="0000" tabindex="2" type="text" class="block w-full p-1 text-blue-600 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                   </div> 
               </div>                                       
          {{--  @else --}}
          {{--  <span class="text-gray-500"> / </span>
           <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Modelo nº:  <span class="font-bold dark:text-blue-400">{{ $pedido_modelo }}</span> </h1> --}}
           
          {{--  <div class="">
               <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Pedido nº:  <span class="font-bold dark:text-green-400">{{ str_pad($idpedido, 4, '0', STR_PAD_LEFT)  }}</span> </h1>
               <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Modelo nº:  <span class="font-bold dark:text-blue-400">{{ $pedido_modelo }}</span> </h1>
           </div>
           @endcan --}}

           
           {{-- <div class="md:hidden">
               <x-button-wire label="Fechar" icon="x-circle" warning wire:click="$toggle('myModal')" />                           
           </div> --}}



       </div>
       <!--Div pedido fim -->

       <!--Div user inicio -->
       <!--<div class="hidden md:flex gap-x-2">
           <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Jese image">
           <div class="ps-3 cursor-pointer" x-on:click="$openModal('simpleModal')">
               <div class="text-base font-semibold dark:text-gray-300">{{ $username }}</div>
               <div class="font-normal text-gray-500">{{ $useremail }}</div>
           </div>  
       </div> -->
       
       <div class="hidden md:flex items-center gap-x-10">

            <div class="md:flex items-center">
                <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Jese image">
                <div class="ps-3 cursor-pointer" x-on:click="$openModal('simpleModal')">
                    <div class="text-base font-semibold dark:text-gray-300">{{ $username }}</div>
                    <div class="font-normal text-gray-500">{{ $useremail }}</div>
                </div>
            </div>
           
            @can('EDIT-CLIENTE-PEDIDO', $permissao)
           <div class="flex gap-x-2 items-center rounded-md md:w-60">                             
                <div class="md:w-96">
                    <x-select autocomplete="off" z-index="z-50" label="Alterar Cliente" placeholder="Selecione um cliente"
                        wire:model.live="clientePedido" empty-message="Cliente não encontrado">
                        @foreach ($userList as $user)
                            <x-select.user-option 
                            wire:key="{{ $user->id }}"
                            src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                            
                            label="{{ $user->name }}" 
                            value="{{ $user->id }}" 
                            description="{{ $user->email }}"/>                       
                        @endforeach
                    </x-select>
                </div>               
            </div>
            @endcan

       </div>
       <!--Div user fim -->

   </div>
   <!--Div cabeçalho fim -->