<div class="block md:flex md:gap-x-3 md:items-center md:justify-between w-full">
    <div class="flex gap-x-2 justify-between">
      <div class="w-48">
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
    </div>
  
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ALLPEDIDO', $permissao)): ?>
      <div class="flex w-4/12 mt-2">
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
  
    <div class="flex gap-x-2 space-y-0 w-auto">
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
    </div>
  
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
<?php $component = WireUi\View\Components\Select::resolve(['label' => 'Status pedido','placeholder' => 'Selecione o status','options' => ['Aberto', 'Cancelado', 'Entregue']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
  </div><?php /**PATH C:\laragon\www\PrintView2\resources\views/components/pedidos/md/filtro_pedido_md.blade.php ENDPATH**/ ?>