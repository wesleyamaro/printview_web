     <!--Div cabeçalho inicio -->
     <div class="col-span-full flex justify-between p-2 mb-2 rounded-md bg-gray-950">

        <!--Div pedido inicio -->
       <div class="w-full md:w-auto flex justify-between">
           

               <div class="">
                   <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Pedido nº:  <span class="font-bold dark:text-green-400">{{ str_pad($idpedido, 4, '0', STR_PAD_LEFT)  }}</span> </h1>
                   <div class="flex gap-x-2 items-center rounded-md w-40">                   
                       <strong class="flex font-bold dark:text-gray-300 text-nowrap text-sm md:text-base">Modelo nº:</strong>
                       <input wire:model="pedido_modelo" placeholder="0000" tabindex="2" type="text" class="block w-full p-1 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50  focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                   </div> 
               </div>                                       

           
           <div class="">
               <x-button-wire label="Fechar" icon="x-circle" warning wire:click="$toggle('myModal')" />                           
           </div>



       </div>
       <!--Div pedido fim -->


   </div>
   <!--Div cabeçalho fim -->