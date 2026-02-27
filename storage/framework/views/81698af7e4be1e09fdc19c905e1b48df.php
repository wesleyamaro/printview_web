     <!--Div cabeçalho inicio -->
     <div class="col-span-full flex justify-between p-2 mb-2 rounded-md bg-gray-300 dark:bg-gray-950">

        <!--Div pedido inicio -->
       <div class="w-full md:w-auto flex justify-between">
           

          
               
               <div class="hidden md:block">
                   <h1 class="font-bold text-gray-600 dark:text-gray-300 text-sm md:text-base">Pedido nº:  <span class="font-bold text-green-600 dark:text-green-400"><?php echo e(str_pad($idpedido, 4, '0', STR_PAD_LEFT)); ?></span> </h1>
                   <div class="flex gap-x-2 items-center rounded-md md:w-60">                   
                       <strong class="flex font-bold text-gray-600 dark:text-gray-300 text-nowrap text-sm md:text-base">Modelo nº:</strong>                       
                       <input wire:model="pedido_modelo" placeholder="0000" tabindex="2" type="text" class="block w-full p-1 text-blue-600 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                   </div> 
               </div>                                       
          
          
           
          

           
           



       </div>
       <!--Div pedido fim -->

       <!--Div user inicio -->
       <div class="hidden md:flex gap-x-2">
           <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Jese image">
           <div class="ps-3 cursor-pointer" x-on:click="$openModal('simpleModal')">
               <div class="text-base font-semibold dark:text-gray-300"><?php echo e($username); ?></div>
               <div class="font-normal text-gray-500"><?php echo e($useremail); ?></div>
           </div>  
       </div>
       <!--Div user fim -->

   </div>
   <!--Div cabeçalho fim --><?php /**PATH C:\laragon\www\PrintView2\resources\views/components/pedidos/md/editor/cabecalhoPedidoMD.blade.php ENDPATH**/ ?>