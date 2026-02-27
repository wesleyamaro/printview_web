<div class="">

    <div class="p-2 md:p-5 rounded-lg bg-slate-300 dark:bg-slate-700">
        <div class="md:flex space-y-2 md:space-y-0 items-center justify-between py-2 mb-2">
            <form class="md:flex space-y-2 md:space-y-0">

                <div class="relative md:flex gap-x-2 gap-y-2 space-y-1 md:space-y-0">

                    <div class="w-72">
                        <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['icon' => 'search'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'search','placeholder' => 'Pesquise por referência ou filtros...']); ?>
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

                    <div class="md:w-96">
                        
                        <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['placeholder' => 'Selecione a marca...'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'searchMarca','class' => 'uppercase']); ?>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $marcaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginal2ca7cb6f73abe68c14d582be1a7a5ad6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ca7cb6f73abe68c14d582be1a7a5ad6 = $attributes; } ?>
<?php $component = WireUi\View\Components\Select\Option::resolve(['label' => ''.e($marca->referencia.' / '.$marca->descricao).'','value' => ''.e($marca->id).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                    
                </div>
                
                <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['spinner' => true,'icon' => 'adjustments','label' => 'Limpar filtros'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'resetFilters','md' => true,'amber' => true,'class' => 'md:ml-2']); ?>
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

            </form>

            
        </div>

        <div x-data="{ openModal: false, imgModal: '', filtros: '', medidas: '' }" class="relative overflow-y-auto soft-scrollbar shadow-md sm:rounded-lg  max-h-55v">
            <table class="w-full text-left text-gray-500 dark:text-gray-400 rounded-xl">
                <!-- head -->
                <thead class="sticky top-0 uppercase text-white bg-slate-400 dark:bg-blue-700 text-center">
                    <tr>
                        <th>id</th>
                        <th>Imagem</th>
                        <th>

                            <div class="flex items-center">
                                Referência
                                <a wire:click="sortBy('referencia')" href="#">
                                    <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg>
                                </a>
                            </div>

                        </th>
                        <th>Marca</th>
                        <th>Medidas</th>
                        <th>Cliente</th>
                        <th>Filtros</th>
                        
                        <th>Usuário</th>
                        <th>Cadastro</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $termopatchList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $termo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900">
                            <td class="uppercase text-center"><?php echo e('#' . $termo->id); ?></td>
                            <td class="text-center">
                                <img 
                                @click="openModal = true; 
                                imgModal = '<?php echo e(url("storage/{$termo->imagem}")); ?>'; 
                                filtros = '<?php echo e($termo->filtros); ?>';
                                medidas = '<?php echo e($termo->medidas); ?>'";
                                    class="cursor-pointer p-1 rounded-lg min-h-20 max-h-20"
                                    src="<?php echo e(url("storage/{$termo->imagem}")); ?>" alt="imagem do produto" />
                            </td>
                            <td class="uppercase text-center"><?php echo e($termo->referencia); ?></td>  
                            <td class="uppercase text-center">
                                <?php echo e($termo->marca->referencia . ' / ' . $termo->marca->descricao); ?></td>
                            <td class="uppercase text-center"><?php echo e($termo->medidas); ?></td>
                            <td class="uppercase text-center"><?php echo e($termo->nomeCliente); ?></td>
                            <td class="uppercase text-center"><?php echo e($termo->filtros); ?></td>                            
                            <td class="uppercase text-center"><?php echo e($termo->user->name); ?></td>
                            <td class="uppercase text-center"><?php echo e($termo->created_at->format('d/m/Y H:i')); ?></td>
                            <td class="text-center">
                                <div class="flex justify-center items-center gap-x-5">

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('EDIT-TERMOPATCH', $permissao)): ?>
                                        <a class="text-red-600 cursor-pointer"
                                            wire:click="editTermopatch(<?php echo e($termo->id); ?>)">
                                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                <path
                                                    d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                                <path
                                                    d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                            </svg>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('DEL-TERMOPATCH', $permissao)): ?>
                                        <a class="text-red-600 cursor-pointer"
                                            wire:click="confirmDeleteTermopatch(<?php echo e($termo->id); ?>)">
                                            <svg class="w-6 h-6 text-red-600 dark:text-red-600" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="text-center">
                                <h1 class="text-2xl text-red-600 dark:text-red-400">Nenhum registro encontrado.</h1>
                            </td>
                        </tr>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
            
            <!--Modal Alpinejs-->
            <div x-show="openModal" @click.away="openModal = false" class="fixed inset-0 flex items-center justify-center z-50">
                <div @click.away="openModal = false" class="bg-white p-4 rounded shadow">
                    <img :src="imgModal" alt="Imagem do modal" />
                    <h1 x-text="filtros" class="text-sm text-blue-600"></h1>
                    <h1 x-text="medidas" class="text-sm text-blue-600"></h1>
                </div>
            </div>
             <!--Modal Alpinejs fim-->

            <div class="bg-yellow-300 p-0.5" id="jeremias" x-data="{
                jeremias() {
                    const observer = new IntersectionObserver((termopatchList) => {
                        termopatchList.forEach((termo) => {
                            if (termo.isIntersecting) {
                                window.Livewire.find('<?php echo e($_instance->getId()); ?>').loadMore()
                            }
            
                        })
                    })
                    observer.observe(this.$el)
                }
            }" x-init="jeremias"></div>

        </div>

    </div>

    <div class="flex justify-between mt-2 ">
        <div wire:loading class="dark:text-green-400">Carregando mais items...</div>

        <!--[if BLOCK]><![endif]--><?php if($termopatchList->hasMorePages()): ?>
            <button wire:loading.remove wire:click="loadMore" class="text-blue-600 dark:text-blue-400">Carregar
                mais</button>
        <?php else: ?>
            <h1 class="dark:text-orange-500">Não há mais itens para carregar.</h1>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        


        <h1 class="font-bold dark:text-gray-400">Total de registros: <span
                class="dark:text-green-400"><?php echo e($termopatchList->count()); ?></span></h1>
    </div>



</div><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/termopatch/consultar-termopatch.blade.php ENDPATH**/ ?>