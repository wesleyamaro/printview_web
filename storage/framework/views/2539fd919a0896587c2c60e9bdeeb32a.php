     <!--Div cabeçalho inicio -->
     <div class="col-span-full flex justify-between p-2 mb-2 rounded-md bg-gray-200 dark:bg-gray-950">

     
           
        <div class="">
            <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Pedido nº:  <span class="font-bold dark:text-green-400"><?php echo e(str_pad($idpedido, 4, '0', STR_PAD_LEFT)); ?></span> </h1>
            <div class="flex gap-x-2 items-center rounded-md md:w-60">                   
                <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Modelo nº:  <span class="font-bold dark:text-blue-400"><?php echo e($pedido_modelo); ?></span> </h1>
            </div> 
        </div>
           
           


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
   <!--Div cabeçalho fim --><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/pedidos/md/cliente/cabecalhoPedidoMD.blade.php ENDPATH**/ ?>