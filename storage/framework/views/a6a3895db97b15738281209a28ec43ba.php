<div>

    <div name="header" class="bg-gray-200 dark:bg-gray-800 shadow ">
        <div class="flex place-items-end justify-between md:w-10/12 mx-auto py-2 px-2 sm:px-6 lg:px-2">
            <h2 class="flex  gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
                <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 2h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m6 0a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1m6 0v3H6V2M5 5h8m-8 5h8m-8 4h8" />
                </svg>
                <?php echo e(__('Pedidos')); ?>

            </h2>
            <h1 class="text-gray-400 text-end font-bold">Pedidos: <span
                    class="text-orange-500"><?php echo e($totalPedidos); ?></span> </h1>
        </div>
    </div>

    <div class="w-full md:w-10/12 px-2 mx-auto  mt-1 p-2 lg:px-3 lg:py-2 bg-gray-300 dark:bg-slate-800  rounded-lg">


        <!-- Filtros Pedidos - Inicio -->
        <div
            class="md:flex gap-x-2  space-y-2 md:space-y-0 p-2 bg-gray-300 dark:bg-slate-900 rounded-md mb-2">

            <div class="md:hidden">
                <?php echo $__env->make('components.pedidos.sm.filtro_pedido_sm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="hidden md:flex gap-x-2 space-y-2 md:space-y-0 md:w-full">
                <?php echo $__env->make('components.pedidos.md.filtro_pedido_md', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

        </div>
        <!-- Filtros Pedidos - Fim -->


        <div wire:poll.30s
            class="overflow-y-auto overflow-x-auto max-h-[33rem] md:max-h-[42rem] soft-scrollbar rounded-lg">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead
                    class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-3 hidden md:table-cell">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-3 py-3 text-center">
                            #
                        </th>
                        <th scope="col" class="px-3 py-3 text-nowrap text-center">
                            Nº Modelo
                        </th>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ALLPEDIDO', $permissao)): ?>
                            <th scope="col" class="px-6 py-3">
                                Cliente
                            </th>
                        <?php endif; ?>
                        <th scope="col" class="px-6 py-3 text-center">
                            Status
                        </th>
                        <th scope="col" class="px-3 py-3 text-center">
                            Total Itens
                        </th>
                        <th scope="col" class="px-3 py-3 text-center">
                            Qnde Pares
                        </th>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('TESTE', $permissao)): ?>
                            <th scope="col" class="px-1 py-3 text-center">
                                Previsão Estrega
                            </th>
                        <?php endif; ?>

                        <th scope="col" class="md:table-cell px-1 py-3 text-center">
                            Data cadastro
                        </th>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ENTREGAR-PEDIDO', $permissao)): ?>
                            <th scope="col" class="px-1 py-3 text-center">
                                Status
                            </th>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('DEL-PEDIDO', $permissao)): ?>
                            <th scope="col" class="px-1 py-3 ">
                                Ação
                            </th>
                        <?php endif; ?>

                    </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $pedidoList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr wire:key="<?php echo e($pedido->id); ?>"
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800  border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                            <td class="px-3 hidden md:table-cell">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                            </td>
                            <td class="px-3 py-2 cursor-pointer text-center"
                                wire:click="modalShow(<?php echo e($pedido->id); ?>)">
                                <h1 class="font-bold text-blue-600 dark:text-blue-400">
                                    <?php echo e(str_pad($pedido->id, 4, '0', STR_PAD_LEFT)); ?></h1>
                            </td>
                            <td class="px-3 py-2 cursor-pointer text-center"
                                wire:click="modalShow(<?php echo e($pedido->id); ?>)">
                                <h1 class="font-bold text-green-600 dark:text-green-400"><?php echo e($pedido->pedido_modelo); ?>

                                </h1>
                            </td>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ALLPEDIDO', $permissao)): ?>
                                <th wire:click="modalShow(<?php echo e($pedido->id); ?>)" scope="row"
                                    class="cursor-pointer flex items-center justify-start text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex py-2">
                                        <img class="w-8 h-8 rounded-full"
                                            src="<?php echo e($pedido->user->profile_photo_path ? asset('storage/' . $pedido->user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png'); ?>"
                                            alt="Sem foto">
                                        <div class="ps-3 cursor-pointer">
                                            <div
                                                class="capitalize truncate w-32 text-sm md:text-base font-semibold text-cyan-600 dark:text-cyan-400">
                                                <?php echo e($pedido->user->name); ?></div>
                                            <div class="truncate text-xs md:font-normal dark:text-gray-400">
                                                <?php echo e($pedido->user->email); ?></div>
                                        </div>
                                    </div>
                                </th>
                            <?php endif; ?>



                            <td wire:click="modalShow(<?php echo e($pedido->id); ?>)"
                                class="px-6 py-2 text-center uppercase cursor-pointer">
                                <!--[if BLOCK]><![endif]--><?php if($pedido->status == 'Entregue'): ?>
                                    <h1 class="flex gap-x-2 ">
                                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m5 12 4.7 4.5 9.3-9" />
                                        </svg>
                                        <span
                                            class="text-xs md:text-base font-bold text-green-600 dark:text-green-400">Entregue</span>
                                    </h1>
                                <?php else: ?>
                                    <!--[if BLOCK]><![endif]--><?php if($pedido->status == 'Entregue'): ?>
                                        <span
                                            class="text-xs md:text-base text-red-600 dark:text-red-500"><?php echo e($pedido->status); ?></span>
                                    <?php else: ?>
                                        <!--[if BLOCK]><![endif]--><?php if($pedido->status == 'solicitando cancelamento'): ?>
                                            <span class="text-xs md:text-base text-orange-600 dark:text-yellow-400">
                                                <?php echo e($pedido->status); ?>...
                                            </span>
                                        <?php elseif($pedido->status == 'Cancelado'): ?>
                                            <span class="text-xs md:text-base text-red-600 dark:text-red-400">
                                                <?php echo e($pedido->status); ?>

                                            </span>
                                        <?php else: ?>
                                            <!--[if BLOCK]><![endif]--><?php if($pedido->status == 'cadastrado'): ?>
                                                <span class="text-xs md:text-base text-gray-600 dark:text-gray-400">
                                                    Aberto
                                                </span>
                                            <?php elseif($pedido->status == 'parcialmente entregue'): ?>
                                                <span
                                                    class="text-xs md:text-base truncate text-orange-500 dark:text-orange-400"><?php echo e($pedido->status); ?></span>
                                            <?php else: ?>
                                                <span
                                                    class="text-xs md:text-base truncate"><?php echo e($pedido->status); ?></span>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </td>
                            <td class="px-3 py-2">
                                <div class="flex items-center justify-center">
                                    <?php echo e($pedido->itens->count()); ?>

                                </div>
                            </td>
                            <td class="px-3 py-2">
                                <div class="flex items-center justify-center ">
                                    <?php echo e($pedido->itens->sum('quantidade')); ?>

                                </div>
                            </td>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('TESTE', $permissao)): ?>
                                <td class="px-1 py-2 text-center uppercase text-xs text-positive-500">
                                    <?php echo e($pedido->previsao_entrega ? (new DateTime($pedido->previsao_entrega))->format('d/m/Y') : 'Data não disponível'); ?>

                                </td>
                            <?php endif; ?>


                            <!--Caso esteja no mobile apareca uma das rows -->
                            <td class="hidden md:table-cell px-1 py-2 text-center uppercase text-xs">
                                <?php echo e($pedido->created_at->format('d/m/Y : H:i')); ?>

                            </td>
                            <td class="md:hidden px-1 py-2 text-center uppercase text-xs">
                                <?php echo e($pedido->created_at->format('d/m/Y')); ?>

                            </td>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ENTREGAR-PEDIDO', $permissao)): ?>
                                <td class="px-2 py-2 text-center">
                                    <div class="flex items-center justify-between">
                                        <a wire:click="showEntregaParcialmentePedido(<?php echo e($pedido->id); ?>)"
                                            title="Entregar parcialmente" href="#"
                                            class=" font-medium text-red-600 dark:text-red-500 hover:underline">
                                            <svg class="w-6 h-6 text-cyan-600 dark:text-cyan-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M18 14a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 1 0 0-2h-2v-2Z"
                                                    clip-rule="evenodd" />
                                                <path fill-rule="evenodd"
                                                    d="M15.026 21.534A9.994 9.994 0 0 1 12 22C6.477 22 2 17.523 2 12S6.477 2 12 2c2.51 0 4.802.924 6.558 2.45l-7.635 7.636L7.707 8.87a1 1 0 0 0-1.414 1.414l3.923 3.923a1 1 0 0 0 1.414 0l8.3-8.3A9.956 9.956 0 0 1 22 12a9.994 9.994 0 0 1-.466 3.026A2.49 2.49 0 0 0 20 14.5h-.5V14a2.5 2.5 0 0 0-5 0v.5H14a2.5 2.5 0 0 0 0 5h.5v.5c0 .578.196 1.11.526 1.534Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>

                                        <a wire:click="showEntregarPedido(<?php echo e($pedido->id); ?>)" title="Entregar o pedido"
                                            href="#"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('DEL-PEDIDO', $permissao)): ?>
                                <td class="px-1 py-2">
                                    <a wire:click="delPedido(<?php echo e($pedido->id); ?>)" href="#"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Deletar</a>
                                <?php endif; ?>
                            </td>

                        </tr>



                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="w-full h-10">
                            <h1 class="text-red-500">Nenhum pedido encontrado.</h1>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                </tbody>


            </table>

            <!--Serve pra paginate auto usando alpineJs - INICIO -->
            <div class="p-0.5 text-center text-xs " id="jeremias" x-data="{
                jeremias() {
                    const observer = new IntersectionObserver((pedidoList) => {
                        pedidoList.forEach((pedido) => {
                            if (pedido.isIntersecting) {
                                window.Livewire.find('<?php echo e($_instance->getId()); ?>').loadMore()
                            }
            
                        })
                    })
                    observer.observe(this.$el)
                }
            }" x-init="jeremias">
                <!--[if BLOCK]><![endif]--><?php if($pedidoList->hasMorePages()): ?>
                    <h1 class="text-green-500 dark:text-green-400">Carregando mais registros...</h1>
                <?php else: ?>
                    <h1 class="text-yellow-600 dark:text-yellow-300">Não existem mais registros para carregar</h1>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <!--Serve pra paginate auto usando alpineJs - FIM -->




            <!--MODAL COM OS ITENS DO PEDIDO-->
            <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['name' => 'simpleModal','wire:model' => 'myModal','maxWidth' => '8xl']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'simpleModal','wire:model' => 'myModal','maxWidth' => '8xl']); ?>
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

                <div class=" md:p-2 border-4 md:border-8 border-gray-200 dark:border-slate-700">

                    <div class="soft-scrollbar overflow-y-auto md:max-h-85v">


                        <!-- Itens do pedido aqui -->
                        <div class="md:hidden">
                            <?php echo $__env->make('components.pedidos.sm.pedido_sm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="hidden md:block">
                            <?php echo $__env->make('components.pedidos.md.pedido_md', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <!-- Itens do pedido fim -->
                    </div>

                    <div class="md:flex justify-between mt-2">
                        <div class="md:flex justify-between mt-3">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('EDIT-PEDIDO', $permissao)): ?>
                                <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['label' => 'Salvar alterações'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'updatePedido','info' => true,'class' => ' w-full md:w-auto']); ?>
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
                            <?php else: ?>
                                <!--Solicitar cancelamento do pedido somente se o usuário logado for proprietario do pedido-->
                                <!--[if BLOCK]><![endif]--><?php if($userpedido == $userLogado): ?>
                                    <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['label' => 'Solicitar cançelamento do pedido'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'cancelarPedidoDialog','red' => true,'class' => 'w-full md:w-auto']); ?>
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
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            <?php endif; ?>
                        </div>
                        <!--Solicitar cancelamento do pedido -->

                        <?php if (isset($component)) { $__componentOriginal2451dfd9df7c01154a83baa9ef28b9d5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2451dfd9df7c01154a83baa9ef28b9d5 = $attributes; } ?>
<?php $component = WireUi\View\Components\Dialog::resolve(['id' => 'custom','title' => 'Cancelamento de pedido','description' => 'A solicitação pode levar até 24h para ser processada.'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dialog'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Dialog::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['label' => 'Qual o motivo do cancelamento?'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Descreva o motivo','wire:model' => 'motivocancelar']); ?>
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
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2451dfd9df7c01154a83baa9ef28b9d5)): ?>
<?php $attributes = $__attributesOriginal2451dfd9df7c01154a83baa9ef28b9d5; ?>
<?php unset($__attributesOriginal2451dfd9df7c01154a83baa9ef28b9d5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2451dfd9df7c01154a83baa9ef28b9d5)): ?>
<?php $component = $__componentOriginal2451dfd9df7c01154a83baa9ef28b9d5; ?>
<?php unset($__componentOriginal2451dfd9df7c01154a83baa9ef28b9d5); ?>
<?php endif; ?>

                    </div>
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
            <!--FIM MODAL ITENS PEDIDO -->
        </div>

    </div>
<?php /**PATH C:\laragon\www\PrintView2\resources\views/livewire/pedidos/pedido-table.blade.php ENDPATH**/ ?>