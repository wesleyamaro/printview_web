  <!--Div info inicio -->
  <div class="col-span-full">
    <h1 class="text-orange-600 dark:text-orange-400">Lista de correias</h1>

    <div class="flex flex-col space-y-1 mb-3">

       

      <div class="md:flex items-center gap-x-2 flex-column max-h-55v overflow-y-auto overflow-x-auto  flex-wrap md:flex-row space-y-4 md:space-y-0  p-2 bg-white dark:bg-slate-900 rounded-lg">


        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4 hidden md:table-cell">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Referência
                    </th>
                    
                    
                    <th scope="col" class="px-3 py-3 text-center">
                        Cor correia
                    </th>

                    <th scope="col" class="px-3 py-3">
                      Quantidade
                  </th>
                                        
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $itenspedidoList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>                 
                
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="w-4 p-2 hidden md:table-cell">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>



                        <td class="px-3 py-2">
                            <div class="flex items-center justify-center font-semibold text-blue-600 dark:text-blue-400">
                                <?php echo e($item->produto->referencia); ?>

                            </div>
                        </td>
                        


                      <td>
                        
                      
                      
                        <div class="flex items-center justify-center">
                            <?php echo e($item->correiacor); ?>

                         </div>

                      </td>
    

                        <td class="px-3 py-2">
                            <div class="flex items-center justify-center">
                                
                                <?php echo e($item->quantidade); ?>

                            </div>
                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full">
                        <h1 class="text-red-500">Nenhum item encontrado.</h1>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                
            </tbody>
        </table>
    </div>


    </div>

</div>
<!--Div info fim --><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/pedidos/sm/editor/correiaPedidoSM.blade.php ENDPATH**/ ?>