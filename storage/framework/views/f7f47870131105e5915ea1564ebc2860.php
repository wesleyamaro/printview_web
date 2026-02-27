     <!--Div cabeçalho inicio -->
     <div class="col-span-full flex justify-between p-2 mb-2 rounded-md bg-gray-950">

        <!--Div pedido inicio -->
       <div class="w-full md:w-auto flex justify-between">
           

               <div class="">
                   <h1 class="font-bold dark:text-gray-300 text-sm md:text-base">Pedido nº:  <span class="font-bold dark:text-green-400"><?php echo e(str_pad($idpedido, 4, '0', STR_PAD_LEFT)); ?></span> </h1>
                   <div class="flex gap-x-2 items-center rounded-md w-40">                   
                       <strong class="flex font-bold dark:text-gray-300 text-nowrap text-sm md:text-base">Modelo nº:</strong>
                       <input wire:model="pedido_modelo" placeholder="0000" tabindex="2" type="text" class="block w-full p-1 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50  focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                   </div> 
               </div>                                       

           
           <div class="">
               <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['label' => 'Fechar','icon' => 'x-circle'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['warning' => true,'wire:click' => '$toggle(\'myModal\')']); ?>
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



       </div>
       <!--Div pedido fim -->


   </div>
   <!--Div cabeçalho fim --><?php /**PATH C:\laragon\www\PrintView2\resources\views/components/pedidos/sm/editor/cabecalhoPedidoSM.blade.php ENDPATH**/ ?>