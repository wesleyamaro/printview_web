<form wire:submit.prevent="salvarProdutos" class="max-w-full  p-1 mx-auto rounded-lg bg-white dark:bg-slate-700">

        <!--BARRA CADASTRO-->
        <div class="w-full py-1 md:flex items-center sticky top-0 justify-between  gap-x-2  bg-gray-300 dark:bg-gray-800 rounded-lg px-3">
    
            <div class="md:flex items-baseline gap-x-2">
    

                <div class="w-80">
                    <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['label' => 'Marca*','placeholder' => 'Selecione uma marca'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'selectedMarca','class' => 'uppercase']); ?>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $marcaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginal2ca7cb6f73abe68c14d582be1a7a5ad6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ca7cb6f73abe68c14d582be1a7a5ad6 = $attributes; } ?>
<?php $component = WireUi\View\Components\Select\Option::resolve(['label' => ''.e($marca->referencia . ' / ' . $marca->descricao).'','value' => ''.e($marca->id).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select.option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select\Option::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ca7cb6f73abe68c14d582be1a7a5ad6)): ?>
<?php $attributes = $__attributesOriginal2ca7cb6f73abe68c14d582be1a7a5ad6; ?>
<?php unset($__attributesOriginal2ca7cb6f73abe68c14d582be1a7a5ad6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ca7cb6f73abe68c14d582be1a7a5ad6)): ?>
<?php $component = $__componentOriginal2ca7cb6f73abe68c14d582be1a7a5ad6; ?>
<?php unset($__componentOriginal2ca7cb6f73abe68c14d582be1a7a5ad6); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
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
    
            </div>
    
            <div class="md:w-96">
                <form class="">
                    <label for="file-input" class="dark:text-gray-400 text-sm">Adicione imagens. ( Limite de 50 imagens por vez ).</label>
                    <input wire:model="imagens" type="file" name="file-input" id="file-input" multiple title="Max. 40 imagens por vez"
                        class="cursor-pointer block w-full border border-gray-200 shadow-sm 
                    rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 
                    disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700
                     dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                       file:border-0 bg-gray-50 file:me-4
                      file:py-3 file:px-4
                      dark:file:bg-gray-700 dark:file:text-gray-400">
                </form>
            </div>
    
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['imagens'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error text-sm text-red-600 dark:text-red-300"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <!--FIM BARRA CADASTRO-->
    
    
    
        <!--INICIO GRID-->
        <div x-data="{ openModal: false, imgModal: '' }" class="grid grid-cols-12 overflow-y-auto h-55v soft-scrollbar gap-x-2 gap-y-1 mt-1">
    
            <div wire:loading wire:target="imagens" class="col-span-full flex mt-2  p-1 rounded-lg">
                <span class="loading loading-spinner text-warning"></span>
                <span class="text-green-600 dark:text-green-400"> Carregando imagens...</span>
            </div>
    
            <!-- Lista de imagens selecionadas -->
            <!--[if BLOCK]><![endif]--><?php if(!empty($imagens)): ?>
    
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $imagens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $imagem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-span-4  flex items-center p-2 bg-gray-100 dark:bg-slate-700 rounded-lg border-2 border-dotted border-slate-400 dark:border-slate-500">
    
                        <div class="w-56 max-h-56 rounded-lg">
                            <img 
                            @click="openModal = true; 
                                imgModal = '<?php echo e($imagem->temporaryUrl()); ?>'";
                            
                                class="cursor-pointer p-1 rounded-lg w-full" src="<?php echo e($imagem->temporaryUrl()); ?>"
                                alt="imagem do produto" />
                            <input wire:model="referencias.<?php echo e($index); ?>" type="text" id="referencia"
                                name="referencia"
                                class="text-center uppercase w-full rounded-md bg-yellow-50 dark:bg-gray-800 block flex-1 border border-gray-400 dark:border-gray-700 bg-transparent py-1 pl-1 text-gray-900 dark:text-yellow-500 placeholder:text-gray-400 dark:placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                placeholder="<?php echo e(pathinfo($imagem->getClientOriginalName(), PATHINFO_FILENAME)); ?>">
                        </div>
    
                        <div class="w-full h-56 flex justify-between flex-col px-3">
    
                            
                                   
                                

                                <div>

                                
                                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['label' => 'Cliente','icon' => 'users'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Nome do cliente','wire:model' => 'nomeCliente.'.e($index).'']); ?>
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

                                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['label' => 'Filtro 1 * ( obrigatório )','icon' => 'variable'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Ex.: flor, cachorro...','wire:model' => 'filtro1.'.e($index).'']); ?>
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
 
                                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['label' => 'Medidas: * ( obrigatório )','icon' => 'adjustments'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Ex.: 44x44, 35x35...','wire:model' => 'medidas.'.e($index).'']); ?>
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
                                

                           
    
                            

                            
                                
                                
                                
                            
    
                            <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['icon' => 'trash','spinner' => true,'label' => 'Remover item'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'removerImagem('.e($index).')','wire:loading.attr' => 'disabled','negative' => true]); ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                
               
    
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <!--FIM GRID-->

        <div class="w-full h-12 flex justify-start mt-3 px-1">
            <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['icon' => 'check','spinner' => true,'label' => 'Salvar Produtos'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'salvarProdutos','wire:loading.attr' => 'disabled','positive' => true]); ?>
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
    
    </form><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/termopatch/create-termopatch.blade.php ENDPATH**/ ?>