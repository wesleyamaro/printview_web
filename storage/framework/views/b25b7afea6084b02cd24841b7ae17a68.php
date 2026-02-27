<div>
    

    <div class="flex items-center justify-between bg-green-700  rounded-lg ">
        <!--[if BLOCK]><![endif]--><?php if(session()->has('error')): ?>
            <div class="flex items-center w-full  h-10 alert bg-red-600 text-white">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <div name="headers" class="mb-2 bg-gray-200 dark:bg-gray-800 shadow">

       <div class="md:w-10/12 mx-auto py-2 px-2 sm:px-6 lg:px-2">
            <h2 class="flex items-center justify-between font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
                <div class="flex gap-x-2 ">
                    <svg class="w-5 h-5 text-orange-600 dark:text-orange-500 " viewBox="0 0 29 27" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2">
                        <path d="M23.623 20.812s.39-1.627.874-3.038c.758-2.21 2.898-5.41 3.639-7.755.439-1.357.677-2.857.252-4.102-.443-1.294-.915-2.429-1.876-3.709C25.534.906 24.209.164 22.628.011c-1.125-.109-2.048.608-2.659 1.416-1.022 1.351-1.404 3.031-1.823 4.66-.597 2.314-.519 4.002-.232 5.589.151 2.132-.369 3.41-.946 4.944-1.16 3.08-2.087 5.366-1.867 6.474.39 1.315 1.086 2.151 2.365 2.6 1.483.52 2.656.723 3.58.184 1.021-.597 1.583-1.483 1.884-2.538l.693-2.528zM4.988 20.812s-.39-1.627-.874-3.038c-.758-2.21-2.898-5.41-3.64-7.755C.036 8.662-.202 7.162.223 5.917c.442-1.294.915-2.429 1.875-3.709C3.076.906 4.401.164 5.983.011 7.108-.098 8.03.619 8.641 1.427c1.022 1.351 1.404 3.031 1.824 4.66.596 2.314.519 4.002.231 5.589-.15 2.132.369 3.41.947 4.944 1.16 3.08 2.086 5.366 1.867 6.474-.391 1.315-1.087 2.151-2.365 2.6-1.483.52-2.656.723-3.58.184-1.022-.597-1.583-1.483-1.884-2.538l-.693-2.528z" 
                        style="fill:rgb(208 56 1)"/>
                    </svg>
                    <?php echo e(__('Termopatch')); ?>

                
                </div>

                <div class="flex items-center justify-between gap-x-2">
                    
                    <!-- Cart -->
                    <div class="hidden ml-4 md:flow-root mr-2">
                        <a  href="<?php echo e(route('carrinho_compra')); ?>" class="group -m-2 flex items-center p-2">
                        <svg class="h-6 w-6 flex-shrink-0 text-blue-500 group-hover:text-blue-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium text-gray-400 group-hover:text-gray-400"><?php echo e($quantidadeCart); ?></span>
                        <span class="sr-only">items in cart, view bag</span>
                        </a>
                    </div>
                
                    <div class="flow-root md:hidden mr-2">
                        <a data-drawer-target="menu-cart" data-drawer-show="menu-cart" href="#" class="group -m-2 flex items-center p-2">
                        <svg class="h-6 w-6 flex-shrink-0 text-green-500 group-hover:text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium text-gray-400 group-hover:text-gray-400"><?php echo e($quantidadeCart); ?></span>
                        <span class="sr-only">items in cart, view bag</span>
                        </a>
                    </div>               
                       
                </div>

                
            </h2>
        </div>
    </div>
 

     <?php echo $__env->make('components.menu-cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   

    <div class="w-full md:w-11/12 mx-auto sm:px-2 md:px-2 lg:p-3 bg-gray-200 dark:bg-slate-800 rounded-lg">
        
        <div class="dark:bg-slate-900 mb-4 p-1 rounded-lg">
            
            <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['icon' => 'adjustments','label' => 'Filtrar por'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$openModal(\'simpleModal\')','positive' => true,'class' => 'w-full md:w-auto']); ?>
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
            

              <?php if (isset($component)) { $__componentOriginal7ea8362733ae9e02c43079506217fb0f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7ea8362733ae9e02c43079506217fb0f = $attributes; } ?>
<?php $component = WireUi\View\Components\Modal::resolve(['blur' => 'sm','name' => 'simpleModal'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:post-created' => '...','id' => 'simpleModal']); ?>
                <?php if (isset($component)) { $__componentOriginal526977d3da1dbf047bef54116d3416a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal526977d3da1dbf047bef54116d3416a0 = $attributes; } ?>
<?php $component = WireUi\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <form wire:submit.prevent="buscarEstampa">
            
                        <div class="flex h-50v flex-col justify-between items-stretch p-2">
                    
                            <div class="space-y-3">
                                <div class="flex p-2 gap-x-2 w-full rounded-lg tex bg-gray-300 dark:bg-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                      </svg>
                                    <h1 class="font-bold text-gray-600 dark:text-gray-400">Pesquise termopatch por filtros</h1>
                                </div>
            
                            <div class="w-full">
                                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['icon' => 'search'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'search','tabindex' => '-1','placeholder' => 'Busque produtos… Ex: flor, cachorro…']); ?>
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
            
                            <div class="md:flex space-y-3  md:space-y-0 md:space-x-3">
                            
                                
            
                            
                                <div class="w-full">
                                    <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['placeholder' => 'Selecione a marca'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tabindex' => '-1','wire:model' => 'selectedMarca','class' => 'uppercase']); ?>
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
                                
                                <div class="w-40">
                                    <?php if (isset($component)) { $__componentOriginal85ca4b3e56109309ed152b03e950458a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal85ca4b3e56109309ed152b03e950458a = $attributes; } ?>
<?php $component = WireUi\View\Components\NativeSelect::resolve(['options' => ['DESC', 'ASC']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('native-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\NativeSelect::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'order','class' => 'uppercase']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal85ca4b3e56109309ed152b03e950458a)): ?>
<?php $attributes = $__attributesOriginal85ca4b3e56109309ed152b03e950458a; ?>
<?php unset($__attributesOriginal85ca4b3e56109309ed152b03e950458a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal85ca4b3e56109309ed152b03e950458a)): ?>
<?php $component = $__componentOriginal85ca4b3e56109309ed152b03e950458a; ?>
<?php unset($__componentOriginal85ca4b3e56109309ed152b03e950458a); ?>
<?php endif; ?>
                                </div>
            
                            </div>
            
                            </div>
            
                            <div wire:loading wire:target="buscarEstampa" class="w-full text-center">
                                <h1 class="dark:text-green-400">Aguarde! Procurando produto(s)...</h1>
                            </div>                        
                            <div class="flex space-x-3 py-3">
                                <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['icon' => 'search','rounded' => true,'label' => 'Pesquisar'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','teal' => true,'class' => 'w-full']); ?>
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
                                <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['icon' => 'x','rounded' => true,'label' => 'Limpar filtros'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => 'close','wire:click' => 'resetFilters','warning' => true,'class' => 'w-full']); ?>
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
                    </form>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal526977d3da1dbf047bef54116d3416a0)): ?>
<?php $attributes = $__attributesOriginal526977d3da1dbf047bef54116d3416a0; ?>
<?php unset($__attributesOriginal526977d3da1dbf047bef54116d3416a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal526977d3da1dbf047bef54116d3416a0)): ?>
<?php $component = $__componentOriginal526977d3da1dbf047bef54116d3416a0; ?>
<?php unset($__componentOriginal526977d3da1dbf047bef54116d3416a0); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7ea8362733ae9e02c43079506217fb0f)): ?>
<?php $attributes = $__attributesOriginal7ea8362733ae9e02c43079506217fb0f; ?>
<?php unset($__attributesOriginal7ea8362733ae9e02c43079506217fb0f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7ea8362733ae9e02c43079506217fb0f)): ?>
<?php $component = $__componentOriginal7ea8362733ae9e02c43079506217fb0f; ?>
<?php unset($__componentOriginal7ea8362733ae9e02c43079506217fb0f); ?>
<?php endif; ?>
  
        </div>

        

        <div  class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-12 xl:grid-cols-12 content-start px-1 gap-1 md:gap-2 mb-0 md:mb-3 rounded-lg  overflow-y-auto soft-scrollbar max-h-70v md:max-h-70v">
            
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $termopatchList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $termopatch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <!--[if BLOCK]><![endif]--><?php if(!in_array($termopatch->id, $carrinho)): ?>

                <div x-data="{ showModal: false }" wire:key="<?php echo e($termopatch->id); ?>" class="col-span-1 h-40 md:h-48 rounded-lg bg-white dark:bg-slate-700 p-2 shadow-lg">
                  
                     <!-- inicio card -->
                    
                        <div class="rounded-t-lg bg-white ">
                            <img @click="showModal = true" src="<?php echo e($termopatch->imagem ? asset('storage/' . $termopatch->imagem) : 'https://cdn1.staticpanvel.com.br/produtos/15/produto-sem-imagem.jpg'); ?>"  alt="Produto sem foto. Avise-nos!" class="h-img-produto md:msx-h-36 rounded-t-lg cursor-pointer" oncontextmenu="return false;" />
                        </div>
                        <div class="p-1 text-center ">
                            <div class="flex justify-center w-full clear-left text-center py-1 md:py-2 ">
                                <span class="font-bold text-sm text-gray-600 dark:text-gray-300"><?php echo e(str_pad($termopatch->referencia, 4, '0', STR_PAD_LEFT)); ?></h1>
                            </div>
                            
                        
                            <button disabled wire:click="addCarrinho(<?php echo e($termopatch->id); ?>)" wire:loading.attr="disabled" type="button" class="relative bottom-16 left-1 float-right inline-flex items-center rounded-full border-2 bg-green-700 p-1.5 text-center text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg class="h-5 w-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 21">
                                  <path d="M15 14H7.78l-.5-2H16a1 1 0 0 0 .962-.726l.473-1.655A2.968 2.968 0 0 1 16 10a3 3 0 0 1-3-3 3 3 0 0 1-3-3 2.97 2.97 0 0 1 .184-1H4.77L4.175.745A1 1 0 0 0 3.208 0H1a1 1 0 0 0 0 2h1.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 10 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3Zm-8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm8 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                  <path d="M19 3h-2V1a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V5h2a1 1 0 1 0 0-2Z" />
                                </svg>
                            </button>

                        </div>
                    
                    <!-- fim card -->
                    


                 <!-- Alpine.js Modal -->
                 <div x-show="showModal" @click.away="showModal = false" class="z-50 fixed inset-0 overflow-y-auto" style="display: none;">
                  
                    <div class="flex items-start justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        
                        <div @click.away="showModal = false" x-show="showModal" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full p-2" style="width: 100%;">
                            <div class="p-2 bg-gray-200 rounded-lg">
                                <h1 class="text-center font-bold text-green-600"><?php echo e(str_pad($termopatch->referencia, 4, '0', STR_PAD_LEFT)); ?> </h1>
                            </div>
                            <div class="mt-1 p-2">
                                <img src="<?php echo e(url("storage/{$termopatch->imagem}")); ?>" alt="" class="mx-auto h-80 rounded-lg" oncontextmenu="return false;">
                            </div>
                            <div class=" border-2 border-dashed border-gray-300 p-2 rounded-md"> 
                                <div class="p-2">
                                    <strong class="text-blue-600">Marca:</strong> <h1 class="text-xs text-gray-400 uppercase"><?php echo e($termopatch->marca->descricao); ?></h1>
                                   
                                    <strong class="text-blue-600">Filtros:</strong> <h1 class="text-xs text-gray-400 uppercase"><?php echo e($termopatch->filtros); ?></h1>                        
                                </div>  
                                <div class="border-t-2 mt-2 p-2">     
                                                 
                                    <strong class="text-blue-600">Medidas:</strong> <h1 class="text-sm text-orange-600"><?php echo e($termopatch->medidas); ?></h1>                      
                                </div>
                            </div>

                            <div class="p-3 w-full ">
                                <button disabled wire:click="addCarrinho(<?php echo e($termopatch->id); ?>)" wire:loading.attr="disabled" type="button"
                                    class="w-full justify-center text-white bg-green-700 hover:bg-green-800 focus:ring-0 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 18 21">
                                        <path
                                            d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                                    </svg>
                                    Adicionar ao carrinho
                                </button>
                            </div>
                              
                            
                        </div>
                        
                    </div>
                </div>
                <!--Alpine.js Modal - Fim -->
            </div>

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
                <div class="col-span-full text-center">
                    <h1 class="md:text-2xl text-red-600 dark:text-red-400">Nenhum registro encontrado.</h1>
                </div>
            
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <div class="p-1" id="jeremias" x-data="{
            jeremias(){
                const observer = new IntersectionObserver((produtos) => {
                    produtos.forEach((transfer) => {
                        if(transfer.isIntersecting){
                            window.Livewire.find('<?php echo e($_instance->getId()); ?>').loadMore()
                        }
                        
                    })
                })
                observer.observe(this.$el)
            }
        }" x-init="jeremias"></div>



    

        </div>
        
    </div>

</div><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/livewire/produtos/termopatch-table.blade.php ENDPATH**/ ?>