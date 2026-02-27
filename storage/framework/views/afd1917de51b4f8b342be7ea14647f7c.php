<div class="block md:flex md:gap-x-3 md:items-end md:justify-between w-full">
    


    <div class="relative flex items-end gap-x-3">   

        <div class="w-40">
            <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['icon' => 'search','label' => 'Nº pedido'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'search','placeholder' => 'Nº pedido...']); ?>
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
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ALLPEDIDO', $permissao)): ?>
                    <div class="flex space-x-2 z-20">
                        <div class="w-96">
                            <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['label' => 'Pesquisar por clientes','placeholder' => 'Selecione o cliente','emptyMessage' => 'Cliente não encontrado'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['autocomplete' => 'off','z-index' => 'z-50','wire:model.live' => 'selectedUser','class' => 'capitalize']); ?>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $userList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if (isset($component)) { $__componentOriginal69737e411223b90b08f97b8064d75edb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69737e411223b90b08f97b8064d75edb = $attributes; } ?>
<?php $component = WireUi\View\Components\Select\UserOption::resolve(['src' => ''.e($user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png').'','label' => ''.e($user->name).'','value' => ''.e($user->id).'','description' => ''.e($user->email).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select.user-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select\UserOption::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => ''.e($user->id).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69737e411223b90b08f97b8064d75edb)): ?>
<?php $attributes = $__attributesOriginal69737e411223b90b08f97b8064d75edb; ?>
<?php unset($__attributesOriginal69737e411223b90b08f97b8064d75edb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69737e411223b90b08f97b8064d75edb)): ?>
<?php $component = $__componentOriginal69737e411223b90b08f97b8064d75edb; ?>
<?php unset($__componentOriginal69737e411223b90b08f97b8064d75edb); ?>
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
         <?php endif; ?>
         
         
         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('PREFEITURA', $permissao)): ?>
                <div class="w-60">
                    <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['label' => 'Grupo','placeholder' => 'Selecione o grupo','options' => ['bebê', 'feminino', 'infantil', 'juvenil', 'masculino']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'filterGrupo','class' => 'capitalize']); ?>
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
                <?php endif; ?>
         
         
         <div class="flex w-60">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ALLPEDIDO', $permissao)): ?>
                        <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['label' => 'Status pedido','placeholder' => 'Selecione o status','options' => ['Aberto', 'cadastrado', 'Cancelado', 'parcialmente entregue', 'Entregue']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'selectedStatus','class' => 'capitalize']); ?>
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
                    <?php elseif (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MENU-PEDIDO', $permissao)): ?>
                        <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['label' => 'Status pedido','placeholder' => 'Selecione o status','options' => ['Aberto', 'Cancelado', 'parcialmente entregue', 'Entregue']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'selectedStatus']); ?>
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
                    <?php endif; ?>
                </div>

           
           

            <div class="w-3 h-3 bg-yellow-300 animate-bounce rounded-full absolute -top-1 right-0 <?php echo e(!$hasFilters ? 'hidden' : ''); ?>"></div>
            <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['label' => '+ Filtros de pedidos'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$openModal(\'filterModal\')','orange' => true]); ?>
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

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('IMPRIMIR-TODOS-PEDIDOS', $permissao)): ?>
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
<?php $component->withAttributes(['x-on:click' => '$openModal(\'simpleModal\')','sky' => true]); ?>
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


    <!-- Modal para filtro de pedidos -->
    <?php if (isset($component)) { $__componentOriginal7ea8362733ae9e02c43079506217fb0f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7ea8362733ae9e02c43079506217fb0f = $attributes; } ?>
<?php $component = WireUi\View\Components\Modal::resolve(['name' => 'filterModal'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex justify-center items-center']); ?>
        
        

            <div class="flex flex-col gap-y-2 p-5  m-auto bg-gray-100 dark:bg-gray-800 border-8 border-gray-200 dark:border-gray-900 rounded-md">

                <div class="p-2 mb-5 border-b border-gray-200 dark:border-gray-700 w-full">
                    <span class="text-lg text-gray-100">Filtrar pedidos</span>
                </div>

                    <!-- Filtros start -->
                

                <!-- Filtro de pedidos por referência do produto -->
                <div class="w-60 relative">
                    <div class="px-1 py-0.5 z-10 text-xs bg-green-300 animate-bounce rounded-full absolute top-3 -right-3">novo</div>
                    <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['label' => 'Referência'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'filter_referencia_produto','placeholder' => 'Busque pedidos pela referência','class' => 'w-full']); ?>
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

            
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['PREFEITURA','ALLPEDIDO'], $permissao)): ?>
                <div class="w-60">
                    <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['icon' => 'search','label' => 'Prefeitura'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'nome_prefeitura','placeholder' => 'Nome prefeitura...']); ?>
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
                <?php endif; ?>

                
            
                <!-- Filtros periodos -->
                <div class="flex gap-x-3 w-72">
                    <?php if (isset($component)) { $__componentOriginal2225aca2c40fa71fe239aabb14054f8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2225aca2c40fa71fe239aabb14054f8e = $attributes; } ?>
<?php $component = WireUi\View\Components\DatetimePicker::resolve(['label' => 'Período inicial','displayFormat' => 'DD/MM/YYYY'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datetime-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\DatetimePicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'display-format1','placeholder' => 'Data Inicial','wire:model.live' => 'data_inicial','class' => 'w-60']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2225aca2c40fa71fe239aabb14054f8e)): ?>
<?php $attributes = $__attributesOriginal2225aca2c40fa71fe239aabb14054f8e; ?>
<?php unset($__attributesOriginal2225aca2c40fa71fe239aabb14054f8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2225aca2c40fa71fe239aabb14054f8e)): ?>
<?php $component = $__componentOriginal2225aca2c40fa71fe239aabb14054f8e; ?>
<?php unset($__componentOriginal2225aca2c40fa71fe239aabb14054f8e); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal2225aca2c40fa71fe239aabb14054f8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2225aca2c40fa71fe239aabb14054f8e = $attributes; } ?>
<?php $component = WireUi\View\Components\DatetimePicker::resolve(['label' => 'Período final','displayFormat' => 'DD/MM/YYYY'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datetime-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\DatetimePicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'display-format2','placeholder' => 'Data Final','wire:model.live' => 'data_final','class' => 'w-60']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2225aca2c40fa71fe239aabb14054f8e)): ?>
<?php $attributes = $__attributesOriginal2225aca2c40fa71fe239aabb14054f8e; ?>
<?php unset($__attributesOriginal2225aca2c40fa71fe239aabb14054f8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2225aca2c40fa71fe239aabb14054f8e)): ?>
<?php $component = $__componentOriginal2225aca2c40fa71fe239aabb14054f8e; ?>
<?php unset($__componentOriginal2225aca2c40fa71fe239aabb14054f8e); ?>
<?php endif; ?>
                </div>
    

                


                    
                
                    <div class="flex flex-col items-center justify-center gap-y-3 w-full mt-5">
                        <div wire:loading wire:target="imprimirPedidos">
                            <span class="loading loading-spinner text-green-500 dark:text-green-400">Aguarde... Buscando pedidos.</span>
                            <img src="/img/animation-loading2.gif" alt="" srcset="">
                        </div>


                        
                        <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['label' => 'Limpar filtros'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'clearFilters','warning' => true,'class' => ''.e(!$hasFilters ? 'hidden' : 'animate-pulse').'']); ?>
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



    <?php if (isset($component)) { $__componentOriginal7ea8362733ae9e02c43079506217fb0f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7ea8362733ae9e02c43079506217fb0f = $attributes; } ?>
<?php $component = WireUi\View\Components\Modal::resolve(['name' => 'simpleModal'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <?php if (isset($component)) { $__componentOriginal526977d3da1dbf047bef54116d3416a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal526977d3da1dbf047bef54116d3416a0 = $attributes; } ?>
<?php $component = WireUi\View\Components\Card::resolve(['title' => 'Filtrar relatório'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

            <div class="p-2 bg-yellow-100 dark:bg-yellow-200 rounded-md">
                <span class="text-sm text-red-600">Deixe em branco para mostrar todos os pedidos</span>
                <span class="text-sm text-red-600">( Observacão: Pode
                    demorar para gerar o relatório )</span>
            </div>
            <div class="flex gap-x-2 space-y-0 w-auto mt-5">
                <div class="flex gap-x-3 w-9/12">
                    <?php if (isset($component)) { $__componentOriginal2225aca2c40fa71fe239aabb14054f8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2225aca2c40fa71fe239aabb14054f8e = $attributes; } ?>
<?php $component = WireUi\View\Components\DatetimePicker::resolve(['label' => 'Período inicial','displayFormat' => 'DD/MM/YYYY'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datetime-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\DatetimePicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'display-format1','placeholder' => 'Data Inicial','wire:model.live' => 'filter_data_inicial','class' => 'w-60']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2225aca2c40fa71fe239aabb14054f8e)): ?>
<?php $attributes = $__attributesOriginal2225aca2c40fa71fe239aabb14054f8e; ?>
<?php unset($__attributesOriginal2225aca2c40fa71fe239aabb14054f8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2225aca2c40fa71fe239aabb14054f8e)): ?>
<?php $component = $__componentOriginal2225aca2c40fa71fe239aabb14054f8e; ?>
<?php unset($__componentOriginal2225aca2c40fa71fe239aabb14054f8e); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal2225aca2c40fa71fe239aabb14054f8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2225aca2c40fa71fe239aabb14054f8e = $attributes; } ?>
<?php $component = WireUi\View\Components\DatetimePicker::resolve(['label' => 'Período final','displayFormat' => 'DD/MM/YYYY'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datetime-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\DatetimePicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'display-format2','placeholder' => 'Data Final','wire:model.live' => 'filter_data_final','class' => 'w-60']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2225aca2c40fa71fe239aabb14054f8e)): ?>
<?php $attributes = $__attributesOriginal2225aca2c40fa71fe239aabb14054f8e; ?>
<?php unset($__attributesOriginal2225aca2c40fa71fe239aabb14054f8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2225aca2c40fa71fe239aabb14054f8e)): ?>
<?php $component = $__componentOriginal2225aca2c40fa71fe239aabb14054f8e; ?>
<?php unset($__componentOriginal2225aca2c40fa71fe239aabb14054f8e); ?>
<?php endif; ?>
                </div>
            </div>

            <div class="mt-5 flex flex-col gap-4">
                <?php if (isset($component)) { $__componentOriginal82b947c12c0b8a4cfc71f282aadb8530 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530 = $attributes; } ?>
<?php $component = WireUi\View\Components\Checkbox::resolve(['label' => 'Abertos (Padrão)'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('checkbox-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'filter_abertos']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530)): ?>
<?php $attributes = $__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530; ?>
<?php unset($__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal82b947c12c0b8a4cfc71f282aadb8530)): ?>
<?php $component = $__componentOriginal82b947c12c0b8a4cfc71f282aadb8530; ?>
<?php unset($__componentOriginal82b947c12c0b8a4cfc71f282aadb8530); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal82b947c12c0b8a4cfc71f282aadb8530 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530 = $attributes; } ?>
<?php $component = WireUi\View\Components\Checkbox::resolve(['label' => 'Cadastrados'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('checkbox-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'filter_cadastrados']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530)): ?>
<?php $attributes = $__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530; ?>
<?php unset($__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal82b947c12c0b8a4cfc71f282aadb8530)): ?>
<?php $component = $__componentOriginal82b947c12c0b8a4cfc71f282aadb8530; ?>
<?php unset($__componentOriginal82b947c12c0b8a4cfc71f282aadb8530); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal82b947c12c0b8a4cfc71f282aadb8530 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530 = $attributes; } ?>
<?php $component = WireUi\View\Components\Checkbox::resolve(['label' => 'Parcialmente Entregues'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('checkbox-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'filter_parcialmente_entregues']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530)): ?>
<?php $attributes = $__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530; ?>
<?php unset($__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal82b947c12c0b8a4cfc71f282aadb8530)): ?>
<?php $component = $__componentOriginal82b947c12c0b8a4cfc71f282aadb8530; ?>
<?php unset($__componentOriginal82b947c12c0b8a4cfc71f282aadb8530); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal82b947c12c0b8a4cfc71f282aadb8530 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530 = $attributes; } ?>
<?php $component = WireUi\View\Components\Checkbox::resolve(['label' => 'Entregues'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('checkbox-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'filter_entregues']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530)): ?>
<?php $attributes = $__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530; ?>
<?php unset($__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal82b947c12c0b8a4cfc71f282aadb8530)): ?>
<?php $component = $__componentOriginal82b947c12c0b8a4cfc71f282aadb8530; ?>
<?php unset($__componentOriginal82b947c12c0b8a4cfc71f282aadb8530); ?>
<?php endif; ?>
            </div>

             <?php $__env->slot('footer', null, ['class' => ' gap-x-4']); ?> 

                <div class="flex flex-col items-center justify-center gap-y-3 w-full">
                    <div wire:loading wire:target="imprimirPedidos">
                        <span class="loading loading-spinner text-green-500 dark:text-green-400">Aguarde... Gerando
                            relatório.</span>
                        <img src="/img/animation-loading2.gif" alt="" srcset="">
                    </div>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('IMPRIMIR-TODOS-PEDIDOS', $permissao)): ?>
                        <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['label' => 'Imprimir'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['primary' => true,'wire:click' => 'imprimirPedidos']); ?>
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
                    <?php endif; ?>
                </div>
             <?php $__env->endSlot(); ?>
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
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/pedidos/md/filtro_pedido_md.blade.php ENDPATH**/ ?>