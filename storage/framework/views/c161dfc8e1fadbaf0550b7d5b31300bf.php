     <!--Div cabeçalho inicio -->
     <div class="col-span-full flex justify-between p-2 mb-2 rounded-md bg-gray-300 dark:bg-gray-950">

     
           
        <div class="">
            <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Pedido nº:  <span class="font-bold dark:text-green-400"><?php echo e(str_pad($idpedido, 4, '0', STR_PAD_LEFT)); ?></span> </h1>
            <div class="flex gap-x-2 items-center rounded-md md:w-60">                   
                <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Modelo nº:  <span class="font-bold dark:text-blue-400"><?php echo e($pedido_modelo); ?></span> </h1>
            </div> 
        </div>
        
        <div>
            <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['label' => 'Imprimir','icon' => 'printer'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'imprimirOrder('.e($idpedido).')']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92)): ?>
<?php $attributes = $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92; ?>
<?php unset($__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal53cf851b4d6af185b0b5e0467ca69b92)): ?>
<?php $component = $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92; ?>
<?php unset($__componentOriginal53cf851b4d6af185b0b5e0467ca69b92); ?>
<?php endif; ?>
        </div>
           
           <div class="">
                
               
               <button wire:click="$toggle('myModal')" class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center">X</button>                          
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
   <!--Div cabeçalho fim --><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/pedidos/sm/cliente/cabecalhoPedidoSM.blade.php ENDPATH**/ ?>