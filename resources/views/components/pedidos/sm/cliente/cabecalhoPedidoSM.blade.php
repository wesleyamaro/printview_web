     <!--Div cabeçalho inicio -->
     <div class="col-span-full flex justify-between p-2 mb-2 rounded-md bg-gray-300 dark:bg-gray-950">

     
           
        <div class="">
            <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Pedido nº:  <span class="font-bold dark:text-green-400">{{ str_pad($idpedido, 4, '0', STR_PAD_LEFT)  }}</span> </h1>
            <div class="flex gap-x-2 items-center rounded-md md:w-60">                   
                <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Modelo nº:  <span class="font-bold dark:text-blue-400">{{ $pedido_modelo }}</span> </h1>
            </div> 
        </div>
        
        <div>
            <x-button-wire label="Imprimir" icon="printer" wire:click="imprimirOrder({{ $idpedido }})" />
        </div>
           
           <div class="">
               {{-- <x-button-wire.circle label="Fechar" icon="x-circle" warning wire:click="$toggle('myModal')" /> --}} 
               {{-- <x-button.circle warning icon="x-circle" warning wire:click="$toggle('myModal')" class="!w-10 !h-10 !p-0"/> --}}
               <button wire:click="$toggle('myModal')" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center">X</button>                          
           </div>
           {{--
           <div class="">
               <x-button-wire label="Fechar" icon="x-circle" warning wire:click="$toggle('myModal')" />                           
           </div> --}}


       <!--Div user inicio -->
       <div class="hidden md:flex gap-x-2">
           <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Jese image">
           <div class="ps-3 cursor-pointer" x-on:click="$openModal('simpleModal')">
               <div class="text-base font-semibold dark:text-gray-300">{{ $username }}</div>
               <div class="font-normal text-gray-500">{{ $useremail }}</div>
           </div>  
       </div>
       <!--Div user fim -->

   </div>
   <!--Div cabeçalho fim -->