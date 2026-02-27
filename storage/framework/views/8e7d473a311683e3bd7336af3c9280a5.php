





<div x-data="{ openModalId: null }" x-init="openModalId = null">

    <style>
        .soft-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: rgba(156, 163, 175, 0.3) transparent;
        }
        .soft-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .soft-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .soft-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(156, 163, 175, 0.3);
            border-radius: 3px;
        }
        .soft-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(156, 163, 175, 0.5);
        }
        .glass-effect {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.85);
        }
        .dark .glass-effect {
            background: rgba(30, 41, 59, 0.85);
        }
        .product-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #92400e 100%);
        }
        
        /* CORREÇÃO: Evitar scroll da página quando modal aberto */
        body.modal-open {
            overflow: hidden;
        }
    </style>

    <div class="w-full h-full bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">

        <div x-data="{ darkMode: false }">
            <?php if (isset($component)) { $__componentOriginal10717d162484e57a570d6d2cc4597545 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal10717d162484e57a570d6d2cc4597545 = $attributes; } ?>
<?php $component = WireUi\View\Components\Notifications::resolve(['zIndex' => 'z-50'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notifications'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Notifications::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal10717d162484e57a570d6d2cc4597545)): ?>
<?php $attributes = $__attributesOriginal10717d162484e57a570d6d2cc4597545; ?>
<?php unset($__attributesOriginal10717d162484e57a570d6d2cc4597545); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal10717d162484e57a570d6d2cc4597545)): ?>
<?php $component = $__componentOriginal10717d162484e57a570d6d2cc4597545; ?>
<?php unset($__componentOriginal10717d162484e57a570d6d2cc4597545); ?>
<?php endif; ?>

            <div class="flex items-center justify-between bg-green-700 rounded-lg">
                <!--[if BLOCK]><![endif]--><?php if(session()->has('error')): ?>
                    <div class="flex items-center w-full h-10 alert bg-red-600 text-white px-4 rounded-lg shadow-lg animate-fade-in">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <div class="mb-2 glass-effect border-b border-white/20 dark:border-gray-700/50 sticky top-0 z-40">
                <div class="mx-auto py-3 px-4 lg:px-8">
                    <div class="flex items-center justify-between">
                        
                        <div class="flex items-center space-x-3">
                            <div class="gradient-bg p-2 rounded-xl shadow-lg">
                                <svg class="md:w-6 md:h-6 w-4 h-4 text-white" viewBox="0 0 29 27" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2">
                                    <path d="M23.623 20.812s.39-1.627.874-3.038c.758-2.21 2.898-5.41 3.639-7.755.439-1.357.677-2.857.252-4.102-.443-1.294-.915-2.429-1.876-3.709C25.534.906 24.209.164 22.628.011c-1.125-.109-2.048.608-2.659 1.416-1.022 1.351-1.404 3.031-1.823 4.66-.597 2.314-.519 4.002-.232 5.589.151 2.132-.369 3.41-.946 4.944-1.16 3.08-2.087 5.366-1.867 6.474.39 1.315 1.086 2.151 2.365 2.6 1.483.52 2.656.723 3.58.184 1.021-.597 1.583-1.483 1.884-2.538l.693-2.528zM4.988 20.812s-.39-1.627-.874-3.038c-.758-2.21-2.898-5.41-3.64-7.755C.036 8.662-.202 7.162.223 5.917c.442-1.294.915-2.429 1.875-3.709C3.076.906 4.401.164 5.983.011 7.108-.098 8.03.619 8.641 1.427c1.022 1.351 1.404 3.031 1.824 4.66.596 2.314.519 4.002.231 5.589-.15 2.132.369 3.41.947 4.944 1.16 3.08 2.086 5.366 1.867 6.474-.391 1.315-1.087 2.151-2.365 2.6-1.483.52-2.656.723-3.58.184-1.022-.597-1.583-1.483-1.884-2.538l-.693-2.528z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-sm md:text-xl font-bold bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">
                                    <?php echo e(__('Top 50 mais vendidas')); ?>

                                </h1>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Produtos em destaque</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-2">
                            <div class="hidden md:ml-4 md:flex mr-2 ">
                                <a href="<?php echo e(route('carrinho_compra')); ?>" class="group relative md:p-3 p-2 rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white shadow-lg transform hover:scale-105 transition-all duration-200">
                                    <svg class="md:h-6 md:w-6 w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-6 h-6 flex items-center justify-center font-bold animate-pulse-soft">
                                        <?php echo e($quantidadeCart); ?>

                                    </span>
                                    <span class="sr-only">items in cart, view bag</span>
                                </a>
                            </div>

                            <div class="flex md:hidden mr-2">
                                <a data-drawer-target="menu-cart" data-drawer-show="menu-cart" href="#" class="group relative p-3 rounded-xl bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white shadow-lg transform hover:scale-105 transition-all duration-200">
                                    <svg class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-6 h-6 flex items-center justify-center font-bold animate-pulse-soft">
                                        <?php echo e($quantidadeCart); ?>

                                    </span>
                                    <span class="sr-only">items in cart, view bag</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php echo $__env->make('components.menu-cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            
            <div x-data="{ active: 'Todos' }" class="flex items-center justify-center gap-3 p-2 mb-2">
                <button wire:click="changeGenero('feminino')" @click="active = 'Feminino'" :class="active === 'Feminino' ? 'bg-blue-500 text-white' : 'bg-gray-300'" class="px-2 py-0.5 text-xs font-medium rounded">
                    Feminino
                </button>
                <button wire:click="changeGenero('infantil')" @click="active = 'Infantil'" :class="active === 'Infantil' ? 'bg-blue-500 text-white' : 'bg-gray-300'" class="px-2 py-0.5 text-xs font-medium rounded">
                    Infantil
                </button>
                <button wire:click="changeGenero('masculino')" @click="active = 'Masculino'" :class="active === 'Masculino' ? 'bg-blue-500 text-white' : 'bg-gray-300'" class="px-2 py-0.5 text-xs font-medium rounded">
                    Masculino
                </button>
                <button wire:click="changeGenero('')" @click="active = 'Todos'" :class="active === 'Todos' ? 'bg-blue-500 text-white' : 'bg-gray-300'" class="px-2 py-0.5 text-xs font-medium rounded">
                    Todos
                </button>
            </div>
            

            <div class="mx-auto px-2 sm:px-6 lg:px-8">
                
                <div class="h-product-grid overflow-y-auto soft-scrollbar bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-white/20 dark:border-gray-700/50 p-1 md:p-4">
                    <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-10 gap-2 md:gap-4 pb-6">
                        
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $produtoList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <!--[if BLOCK]><![endif]--><?php if(!in_array($transfer->id, $carrinho)): ?>
                                <div wire:key="<?php echo e($transfer->produto->id); ?>" 
                                     @click="openModalId = <?php echo e($transfer->produto->id); ?>; document.body.classList.add('modal-open')"
                                     class="product-card h-product-card group bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700 cursor-pointer">
                                    
                                    <div class="relative h-product-img bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 overflow-hidden">
                                        <img src="<?php echo e($transfer->produto->imagem ? asset('storage/' . $transfer->produto->imagem) : 'https://cdn1.staticpanvel.com.br/produtos/15/produto-sem-imagem.jpg'); ?>" 
                                             alt="Produto sem foto. Avise-nos!" 
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                             oncontextmenu="return false;" />
                                        
                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300"></div>

                                        <div class="absolute top-2 left-2">
                                            <span class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg">
                                                TOP
                                            </span>
                                        </div>

                                        <button wire:click="addCarrinho(<?php echo e($transfer->produto->id); ?>)" 
                                                wire:loading.attr="disabled" 
                                                type="button" 
                                                @click.stop class="absolute bottom-2 right-2 bg-green-500 hover:bg-green-600 text-white p-2 rounded-full shadow-lg transform transition-transform duration-300 scale-100 md:scale-0 md:group-hover:scale-100">
                                            <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 21">
                                                <path d="M15 14H7.78l-.5-2H16a1 1 0 0 0 .962-.726l.473-1.655A2.968 2.968 0 0 1 16 10a3 3 0 0 1-3-3 3 3 0 0 1-3-3 2.97 2.97 0 0 1 .184-1H4.77L4.175.745A1 1 0 0 0 3.208 0H1a1 1 0 0 0 0 2h1.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 10 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3Zm-8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm8 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                                <path d="M19 3h-2V1a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V5h2a1 1 0 1 0 0-2Z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="px-2 py-1 md:p-2 flex-1 flex flex-col">
                                        
                                        <div class="flex items-center mb-1 md:mb-2">
                                            <?php
                                                $rating = min(5, max(1, floor($transfer->vezes_pedido / 10) + 1));
                                            ?>
                                            <!--[if BLOCK]><![endif]--><?php for($i = 1; $i <= 5; $i++): ?>
                                                <!--[if BLOCK]><![endif]--><?php if($i <= $rating): ?>
                                                    <svg class="w-3 h-3 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                                    </svg>
                                                <?php else: ?>
                                                    <svg class="w-3 h-3 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                                    </svg>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
                                            <span class="text-xs text-gray-500 ml-2">(<?php echo e($rating); ?>.0)</span>
                                        </div>

                                        <h3 class="font-semibold text-sm text-gray-800 dark:text-gray-200 line-clamp-2 mb-1 flex-1">
                                            <?php echo e($transfer->produto->referencia); ?>

                                        </h3>
                                    </div>
                                </div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-span-full text-center py-12">
                                <div class="max-w-md mx-auto">
                                    <svg class="w-24 h-24 mx-auto text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                    </svg>
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Nenhum produto encontrado</h3>
                                    <p class="text-gray-500 dark:text-gray-400">Não há produtos disponíveis no momento.</p>
                                </div>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]--> 
                    </div>
                </div>
            </div>
            
            <!-- CORREÇÃO: Modais movidos para fora do loop -->
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $produtoList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!--[if BLOCK]><![endif]--><?php if(!in_array($transfer->id, $carrinho)): ?>
                    <div x-show="openModalId === <?php echo e($transfer->produto->id); ?>" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         @click.away="openModalId = null; document.body.classList.remove('modal-open')" 
                         @keydown.escape.window="openModalId = null; document.body.classList.remove('modal-open')"
                         class="fixed inset-0 z-50 overflow-y-auto" 
                         style="display: none;"
                         aria-labelledby="modal-title-<?php echo e($transfer->produto->id); ?>" 
                         role="dialog" 
                         aria-modal="true">
                        
                        <div @click="openModalId = null; document.body.classList.remove('modal-open')" class="fixed inset-0 bg-gray-500/50 backdrop-blur-sm"></div>
                        
                        <div class="flex min-h-full items-center justify-center p-4">
                            <div x-show="openModalId === <?php echo e($transfer->produto->id); ?>"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="relative bg-white  rounded-2xl shadow-2xl max-w-2xl w-full overflow-hidden">
                                
                                <div class="bg-gradient-to-r from-blue-500 to-blue-700 dark:from-blue-900 dark:to-blue-900  p-2 text-white">
                                    <div class="flex items-center justify-between">
                                        <h2 class="text-xl font-bold ml-2" id="modal-title-<?php echo e($transfer->produto->id); ?>"><?php echo e($transfer->produto->referencia); ?></h2>
                                        <button @click="openModalId = null; document.body.classList.remove('modal-open')" class="p-1 rounded-full hover:bg-white/20 transition-colors">
                                            <span class="sr-only">Close modal</span>
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="p-3">
                                    <div class="mb-3 h-[calc(100vh-350px)] bg-white rounded-lg">
                                        <img src="<?php echo e($transfer->produto->imagem ? asset('storage/' . $transfer->produto->imagem) : 'https://placehold.co/600x400/e2e8f0/94a3b8?text=Sem+Imagem'); ?>" 
                                             alt="<?php echo e($transfer->produto->referencia); ?>" 
                                             class="h-full m-auto  object-contain rounded-lg bg-gray-100 dark:bg-gray-700" 
                                             oncontextmenu="return false;"
                                             onerror="this.onerror=null; this.src='https://placehold.co/600x400/e2e8f0/94a3b8?text=Imagem+Indispon%C3%ADvel';">
                                    </div>

                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm font-medium text-gray-600 ">Filtros:</span>
                                            <span class="text-sm text-gray-800  capitalize"><?php echo e($transfer->produto->filtros); ?></span>
                                        </div>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('QNDE-MAISVENDIDOS', $permissao)): ?>
                                            <div class="flex items-center justify-between">
                                                <span class="text-sm font-medium text-gray-600 ">Vendas:</span>
                                                <span class="text-sm font-bold text-blue-600 "><?php echo e($transfer->vezes_pedido); ?> vezes</span>
                                            </div>
                                        <?php endif; ?>

                                        <button wire:click="addCarrinho(<?php echo e($transfer->produto->id); ?>)" 
                                                wire:loading.attr="disabled" 
                                                type="button"
                                                @click="openModalId = null; document.body.classList.remove('modal-open')" 
                                                class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg transform hover:scale-[1.02] transition-all duration-200 flex items-center justify-center space-x-2">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                                                <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                                            </svg>
                                            <span>Adicionar ao carrinho</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            
        </div>
    </div>
</div><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/livewire/produtos/mais-vendidos.blade.php ENDPATH**/ ?>