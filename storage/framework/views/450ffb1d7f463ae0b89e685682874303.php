  <!--Div info inicio -->
  <div class="col-span-full">


    <div class="flex flex-col space-y-3 mb-3">

        <div class="w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2" >
            <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Total de itens: 
                <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> <?php echo e($itens_qnde); ?></h1>
            </strong>
            <hr class="border border-slate-300 dark:border-slate-600 border-dashed my-2">
            <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Qnde total de pares: 
                <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> <?php echo e($pares_qnde); ?></h1>
            </strong>
        </div>

        <div class="w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2" >
  
            
            <div class="w-full rounded-md ">
                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['label' => 'Marca:'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'marca','placeholder' => '****']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e)): ?>
<?php $attributes = $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e; ?>
<?php unset($__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e)): ?>
<?php $component = $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e; ?>
<?php unset($__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e); ?>
<?php endif; ?> 
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('EDIT-STATUS-PEDIDO', $permissao)): ?>
                <div class="flex items-end gap-x-2 w-full">
                    <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['label' => 'Altere o status','placeholder' => 'Selecione o status','options' => ['Aberto','cadastrado', 'Cancelado']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['autocomplete' => 'off','wire:model' => 'statuspedido']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c)): ?>
<?php $attributes = $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c; ?>
<?php unset($__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba37bc18e15fb5b3998ec0574c6b817c)): ?>
<?php $component = $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c; ?>
<?php unset($__componentOriginalba37bc18e15fb5b3998ec0574c6b817c); ?>
<?php endif; ?>                                    
                    <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['label' => 'Alterar'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'alterarStatus','emerald' => true]); ?>
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
            <?php endif; ?>
            

            
            <div class="w-full"> 
                <?php if (isset($component)) { $__componentOriginal05e078adad918d7a9c127c65d98f7d47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal05e078adad918d7a9c127c65d98f7d47 = $attributes; } ?>
<?php $component = WireUi\View\Components\Textarea::resolve(['label' => 'Observações'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('textarea-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'observacao','placeholder' => 'Observação do pedido...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal05e078adad918d7a9c127c65d98f7d47)): ?>
<?php $attributes = $__attributesOriginal05e078adad918d7a9c127c65d98f7d47; ?>
<?php unset($__attributesOriginal05e078adad918d7a9c127c65d98f7d47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal05e078adad918d7a9c127c65d98f7d47)): ?>
<?php $component = $__componentOriginal05e078adad918d7a9c127c65d98f7d47; ?>
<?php unset($__componentOriginal05e078adad918d7a9c127c65d98f7d47); ?>
<?php endif; ?>
                
            </div>


        </div>

         <div class="<?php echo e($motivo_cancelamento ? '' : 'hidden'); ?> border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
            <h1 class="text-gray-600 dark:text-gray-400 "> Motivo solicitação cancelamento:</h1>
            <h1 class="text-orange-600 dark:text-orange-400 text-sm md:text-base"> <?php echo e($motivo_cancelamento); ?></h1>
        </div> 

    </div>

</div>
<!--Div info fim --><?php /**PATH C:\laragon\www\PrintView2\resources\views/components/pedidos/sm/editor/complementoPedidoSM.blade.php ENDPATH**/ ?>