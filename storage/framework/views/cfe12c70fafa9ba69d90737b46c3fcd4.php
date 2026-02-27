<?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['wire:model' => 'editTransferModal','maxWidth' => '4xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'editTransferModal','maxWidth' => '4xl']); ?>
    <!--Oficial-->

    <div class="bg-white dark:bg-slate-800 border-4 p-2 dark:border-slate-700 rounded-lg shadow-lg">

        <div class="bg-blue-600 p-2 mb-2 rounded-lg">
            <h1 class="text-white text-2xl">Editar estampa</h1>
        </div>

        <!--Inicio Grid-->
        <div class="grid grid-cols-3 gap-4 h-35v">

            <div class="col-span-2">

                <div class="flex flex-wrap gap-2">

                    <div class="w-28">
                        <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['label' => 'Referência*'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'referencia','tabindex' => '-1','placeholder' => 'Referência']); ?>
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

                    <div class="w-40">
                        <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['label' => 'Gênero*','placeholder' => 'Selecione gênero'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tabindex' => '-1','wire:model' => 'genero']); ?>
                            <?php if (isset($component)) { $__componentOriginal2ca7cb6f73abe68c14d582be1a7a5ad6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ca7cb6f73abe68c14d582be1a7a5ad6 = $attributes; } ?>
<?php $component = WireUi\View\Components\Select\Option::resolve(['label' => 'Feminino','value' => 'feminino'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <?php if (isset($component)) { $__componentOriginal2ca7cb6f73abe68c14d582be1a7a5ad6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ca7cb6f73abe68c14d582be1a7a5ad6 = $attributes; } ?>
<?php $component = WireUi\View\Components\Select\Option::resolve(['label' => 'Infantil','value' => 'infantil'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                            <?php if (isset($component)) { $__componentOriginal2ca7cb6f73abe68c14d582be1a7a5ad6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ca7cb6f73abe68c14d582be1a7a5ad6 = $attributes; } ?>
<?php $component = WireUi\View\Components\Select\Option::resolve(['label' => 'Masculino','value' => 'masculino'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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

                    <div class="w-72">
                        <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['label' => 'Marca*','placeholder' => 'Selecione marca'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tabindex' => '-1','wire:model' => 'selectedMarca']); ?>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $marcaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginal2ca7cb6f73abe68c14d582be1a7a5ad6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ca7cb6f73abe68c14d582be1a7a5ad6 = $attributes; } ?>
<?php $component = WireUi\View\Components\Select\Option::resolve(['label' => ''.e($marca->descricao).'','value' => ''.e($marca->id).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select.option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select\Option::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => ''.e($marca->id).'']); ?>
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

                    <div class="w-60">
                        
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-300">Tipo*</label>
                        <select wire:model="tipo" class="bg-white dark:bg-slate-800 border border-gray-300 dark:border-slate-700 text-gray-900 dark:text-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="transfer">Transfer</option>
                            <option value="termopatch">Termopatch</option>
                        </select>
                    </div>

                    <div class="w-full">
                        <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['label' => 'Filtros*'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'filtros','tabindex' => '-1','placeholder' => 'Filtros separado por virgula Ex.: girassol, borboleta, listrado (Por padrão usar máximo 2 filtros)']); ?>
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
                    
                    <div class="w-full">
                        <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['label' => 'Medida*'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'medida','tabindex' => '-1','placeholder' => '00x00']); ?>
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

                </div>

            </div>

            <div class="col-span-1">

                <div class="flex items-center justify-center w-full ">
                    <label title="Clique para carregar a imagem" for="imagem"
                        class="flex flex-col items-center justify-center w-full p-2 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-slate-800 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-800">
                        <div class="flex flex-col items-center text-center justify-center max-h-48 p-1">
                            <!--[if BLOCK]><![endif]--><?php if($imagem && is_object($imagem) && method_exists($imagem, 'temporaryUrl')): ?>
                                <img src="<?php echo e($imagem->temporaryUrl()); ?>" class="h-52">
                            <?php else: ?>
                                <!--[if BLOCK]><![endif]--><?php if($imagem): ?>
                                    <img src="<?php echo e(url('storage/' . $imagem)); ?>" class="h-52">
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <p class="mb-1 text-sm text-gray-500 dark:text-gray-400"><span
                                    class="text-2xs font-semibold">Clique para fazer upload</span></p>
                            <p class="text-2xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG ou GIF (MAX.
                                300x300px)</p>
                        </div>
                        <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['wire:model' => 'imagem','id' => 'imagem','type' => 'file','class' => 'hidden']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'imagem','id' => 'imagem','type' => 'file','class' => 'hidden']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                        <div wire:loading wire:target="imagem">Enviando...</div>
                    </label>

                </div>

                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['imagem'];
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

        </div>

        <div class="col-span-full md:col-span-full mt-2">
            <div class="text-green-800  p-3 w-full bg-yellow-400 rounded-lg" wire:loading wire:target="imagem">
                Carregando imagem...</div>
        </div>


        <div class="col-span-full md:col-span-12 flex justify-between mt-5">
            <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['icon' => 'check','spinner' => true,'label' => 'Salvar Alteração'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'saveChanges','type' => 'button','wire:loading.attr' => 'disabled','info' => true]); ?>
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

        <!--FIM GRID-->

        <!-- Script JavaScript para atualizar o campo de referência -->
        <script>
            document.getElementById('imagem').addEventListener('change', function() {
                // Obtenha o nome do arquivo selecionado
                var nomeImagem = this.files[0].name;
                window.Livewire.find('<?php echo e($_instance->getId()); ?>').dispatch('atualizarCampoReferencia', {
                    nomeImagem
                });

            });
        </script>



    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $attributes = $__attributesOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__attributesOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $component = $__componentOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__componentOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/cadastros/transfers/editTransferModal.blade.php ENDPATH**/ ?>