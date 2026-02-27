<div class="flex flex-col md:mb-2 gap-y-1">


    <div class="p-1 border-dashed border-2 border-gray-300 dark:border-gray-600 rounded-lg">
        <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['label' => 'Marca*'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'marca','placeholder' => 'Esse pedido será feito em qual marca?*']); ?>
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

    <div class="p-1 w-full border-dashed border-2 border-gray-300 dark:border-gray-600 rounded-lg">
        <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['label' => 'Grupo*','placeholder' => 'Selecione o grupo','options' => ['bebê', 'feminino', 'infantil', 'juvenil', 'masculino']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'grupo','class' => 'capitalize']); ?>
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
    </div>

    <div class="p-1 w-full border-dashed border-2 border-gray-300 dark:border-gray-600 rounded-lg">
        <?php if (isset($component)) { $__componentOriginal05e078adad918d7a9c127c65d98f7d47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal05e078adad918d7a9c127c65d98f7d47 = $attributes; } ?>
<?php $component = WireUi\View\Components\Textarea::resolve(['label' => 'Grade*'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('textarea-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'grade','placeholder' => 'Qual a grade do pedido? Ex.: 33/34:20 35/36: 40 ou 2-4-4-2
','class' => 'h-16']); ?>
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

    <div class="p-1 w-full border-dashed border-2 border-gray-300 dark:border-gray-600 rounded-lg">
        <?php if (isset($component)) { $__componentOriginal05e078adad918d7a9c127c65d98f7d47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal05e078adad918d7a9c127c65d98f7d47 = $attributes; } ?>
<?php $component = WireUi\View\Components\Textarea::resolve(['label' => 'Observação'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('textarea-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'observacao','placeholder' => 'Gostaria de adicionar alguma observação sobre o seu pedido?','class' => 'h-16']); ?>
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


    <div class="p-1 border-dashed border-2 border-gray-300 dark:border-gray-600 rounded-lg">

        <form wire:submit="salvarImagens" enctype="multipart/form-data">
            <label class="block mb-1 p-2 rounded-lg text-sm md:text-base font-medium text-orange-600 dark:text-orange-600 bg-yellow-100" for="file_input">
                Não encontrou a estampa desejada? Envie sua ideia e nós a desenvolvemos para você.
            </label>

            <div class="text-green-400 flex justify-center w-full" wire:loading wire:target="imagens">
                
                <div class="p-2">
                    
                    <img src="<?php echo e(asset('img/animations/animation-1709438932456.gif')); ?>"alt="" class="w-32 mx-auto" >

                    <h1 class="text-green-600 dark:text-green-400 mt-2 text-center">Aguarde! Enviando suas imagens...</h1>
                </div>
                
            </div>
            
            
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full  border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-800 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-700">
                    <div class="flex flex-col items-center justify-center pt-2 pb-2">
                        <svg class="w-8 h-8 mb-1 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-1 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Clique para carregar</span> ou arraste e solte</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG ou JPG (MAX. 1024x840px)</p>
                    </div>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MULTIPLE-UPLOAD', $permissao)): ?>
                    <input wire:model="imagens" id="dropzone-file" type="file" class="hidden" multiple />
                    <?php elseif (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MENU-CARRINHO', $permissao)): ?>                       
                        <input  wire:model.live="imagem" id="dropzone-file" type="file" class="hidden" />
                    <?php endif; ?>

                </label>
            </div> 

            

        </form>
        <div class="flex justify-center w-full">
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['imagens'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error bg-red-600 p-1 rounded-md w-full mx-auto mt-2 text-sm text-white"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>     
        

        </div>


        <!--[if BLOCK]><![endif]--><?php if(!$imagens): ?>
        <div class="mb-2">
            <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['icon' => 'check','label' => 'Confirmar Pedido','spinner' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'showConfirmPedido','wire:loading.attr' => 'disabled','teal' => true,'class' => 'w-full mt-3']); ?>
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
            
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/cart/cart-pedido.blade.php ENDPATH**/ ?>