

<div class=" lg:hidden fixed bottom-0 left-0  w-full h-16 bg-white border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600">
    
        
        <div class="grid h-full max-w-lg grid-cols-5 mx-auto justify-between font-medium">
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MENU-NOVIDADE', $permissao)): ?>
        <a href="<?php echo e(route('novidades')); ?>"  wire:navigate type="button" class="inline-flex flex-col items-center justify-center px-5 border-gray-200 border-x hover:bg-gray-50 dark:hover:bg-gray-800 group dark:border-gray-600">
            
            <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
            </svg>
            
            <span class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Início
                
            </span>
        </a>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MENU-MAIS-VENDIDO', $permissao)): ?>
        <a href="<?php echo e(route('mais_vendido')); ?>"  wire:navigate type="button" class="inline-flex flex-col items-center justify-center px-3 border-gray-200 border-x hover:bg-gray-50 dark:hover:bg-gray-800 group dark:border-gray-600">
            
            <svg class="w-5 h-5 mb-2 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
              </svg>
            
            <span class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Top 50</span>
        </a>
        <?php endif; ?>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('SUBMENU-TRANSFER', $permissao)): ?>
            <a href="<?php echo e(route('produtos', ['tipo' => 'transfer'])); ?>"  wire:navigate type="button" class="inline-flex flex-col items-center justify-center px-3 border-e border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 group dark:border-gray-600">
                <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2" viewBox="0 0 12 12">
                <path d="m5.063 9.765-.596-2.238s-.503-1.739-.182-2.787c.28-.917.109-2.098.109-2.098C4.234 1.47 3.919.555 3.252.127 2.868-.12 2.253.015 1.691.346.872.829.403 1.571.114 2.499c-.252.806-.079 1.785.459 3.009.257.593.492 1.189.692 1.79.271.943.385 1.657.528 2.414.159 1.072.403 1.685.751 1.88.557.312 1.184.349 1.901-.04.734-.398.79-1.064.618-1.787ZM6.071 9.765l.596-2.238s.503-1.739.183-2.787c-.28-.917-.109-2.098-.109-2.098C6.9 1.47 7.216.555 7.883.127c.383-.247.998-.112 1.56.219.819.483 1.288 1.225 1.578 2.153.251.806.079 1.785-.459 3.009a21.923 21.923 0 0 0-.693 1.79c-.271.943-.385 1.657-.527 2.414-.16 1.072-.404 1.685-.752 1.88-.556.312-1.184.349-1.901-.04-.734-.398-.79-1.064-.618-1.787Z" style="fill:#9ba5b1"/>
            </svg>            
            <span class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Estampas</span>
        </a>
        <?php endif; ?>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('PREFEITURA', $permissao)): ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MENU-CARRINHO', $permissao)): ?>
            <a href="<?php echo e(route('carrinho_compra')); ?>"  wire:navigate type="button" class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">

                <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                    <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                </svg>
                <span class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Carrinho</span>
            </a>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MENU-PEDIDO', $permissao)): ?>
            <a href="<?php echo e(route('pedidos')); ?>"  wire:navigate type="button" class="inline-flex flex-col items-center justify-center px-5 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 group border-x dark:border-gray-600">
                <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path d="M19.9 6.58c0-.009 0-.019-.006-.027l-2-4A1 1 0 0 0 17 2h-4a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v9a1 1 0 0 0 1 1h.3c-.03.165-.047.332-.051.5a3.25 3.25 0 1 0 6.5 0A3.173 3.173 0 0 0 7.7 12h4.6c-.03.165-.047.332-.051.5a3.25 3.25 0 1 0 6.5 0 3.177 3.177 0 0 0-.049-.5h.3a1 1 0 0 0 1-1V7a.99.99 0 0 0-.1-.42ZM16.382 4l1 2H13V4h3.382ZM4.5 13.75a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5Zm11 0a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5Z"/>
                </svg>
                <span class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Pedidos</span>
            </a>
            <?php endif; ?>

        <?php endif; ?>
        
        
        
        <!--PERTENCE A PREFEITURA - INICIO-->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('PREFEITURA', $permissao)): ?>
        <a href="<?php echo e(route('carrinho_compra')); ?>"  wire:navigate type="button" class="col-span-2 inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">

            <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
            </svg>
            <span class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Carrinho</span>
        </a>
        
        <div class="col-span-1 inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group border-x dark:border-gray-600">
            
        </div>

        <a href="<?php echo e(route('pedidos')); ?>"  wire:navigate type="button" class="col-span-2 inline-flex flex-col items-center justify-center px-5 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 group ">
            <svg class="w-5 h-5 mb-2 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                <path d="M19.9 6.58c0-.009 0-.019-.006-.027l-2-4A1 1 0 0 0 17 2h-4a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v9a1 1 0 0 0 1 1h.3c-.03.165-.047.332-.051.5a3.25 3.25 0 1 0 6.5 0A3.173 3.173 0 0 0 7.7 12h4.6c-.03.165-.047.332-.051.5a3.25 3.25 0 1 0 6.5 0 3.177 3.177 0 0 0-.049-.5h.3a1 1 0 0 0 1-1V7a.99.99 0 0 0-.1-.42ZM16.382 4l1 2H13V4h3.382ZM4.5 13.75a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5Zm11 0a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5Z"/>
              </svg>
            <span class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Pedidos</span>
        </a>
        <?php endif; ?>
        
        <!--PERTENCE A PREFEITURA - FIM -->
        
    </div>
</div>
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/menu-mobile.blade.php ENDPATH**/ ?>