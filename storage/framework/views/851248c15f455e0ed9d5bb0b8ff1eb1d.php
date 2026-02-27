<div>
    
    
    
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
            <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m11.479 1.712 2.367 4.8a.532.532 0 0 0 .4.292l5.294.769a.534.534 0 0 1 .3.91l-3.83 3.735a.534.534 0 0 0-.154.473l.9 5.272a.535.535 0 0 1-.775.563l-4.734-2.49a.536.536 0 0 0-.5 0l-4.73 2.487a.534.534 0 0 1-.775-.563l.9-5.272a.534.534 0 0 0-.154-.473L2.158 8.48a.534.534 0 0 1 .3-.911l5.294-.77a.532.532 0 0 0 .4-.292l2.367-4.8a.534.534 0 0 1 .96.004Z"/>
            </svg>
            <?php echo e(__('Top clientes')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <!--Notificação wireui-->
    <?php if (isset($component)) { $__componentOriginal10717d162484e57a570d6d2cc4597545 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal10717d162484e57a570d6d2cc4597545 = $attributes; } ?>
<?php $component = WireUi\View\Components\Notifications::resolve(['position' => 'top-right'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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


    <div class="w-full md:w-10/12 px-2 mx-auto mt-2 sm:px-2 lg:p-3 bg-gray-300 dark:bg-slate-800  rounded-lg">    
    



         <!--FIM DIV MOLDE -->
        <div class="grid grid-cols-12 gap-x-5 py-2 md:py-0 shadow-xl sm:rounded-lg">
           
            <!--COLUNA ESQ - INICIO  -->
            <div class="col-span-full md:col-span-12 p-2 dark:bg-slate-900 rounded-lg">

                <!--FILTROS -INICIO -->
                <div class="md:flex items-end gap-2 mb-2 w-full">
                  <div class="py-2 md:w-96 md:py-0">
                    <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['placeholder' => 'Selecione o cliente','label' => 'Clientes','emptyMessage' => 'Cliente não encontrado'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'selectedUser']); ?>
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

                  <div class="flex gap-x-3 ">
                    <?php if (isset($component)) { $__componentOriginal2225aca2c40fa71fe239aabb14054f8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2225aca2c40fa71fe239aabb14054f8e = $attributes; } ?>
<?php $component = WireUi\View\Components\DatetimePicker::resolve(['label' => 'Período inicial','displayFormat' => 'DD-MM-YYYY'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datetime-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\DatetimePicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Data Inicial','wire:model.live' => 'dataInicial','class' => 'soft-scrollbar md:w-auto']); ?>
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
<?php $component = WireUi\View\Components\DatetimePicker::resolve(['label' => 'Período final','displayFormat' => 'DD-MM-YYYY'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datetime-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\DatetimePicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Data Final','wire:model.live' => 'dataFinal','class' => 'soft-scrollbar md:w-auto']); ?>
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
                

                <div class="flex w-full mt-2 md:mt-0">
                    <!--[if BLOCK]><![endif]--><?php if($dataInicial && $dataFinal): ?>
                    <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['icon' => 'printer','label' => 'Imprimir'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'generatePdf','teal' => true,'class' => 'w-full md:w-auto']); ?>
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
                </div>

                </div>

                <div class="shadow-md sm:rounded-lg overflow-y-auto hide-scrollbar max-h-70v md:max-h-70v">

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead
                            class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
     
                                <th scope="col" class="px-2 py-3">
                                    Cliente
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Pedidos
                                </th>
                                <th scope="col" class="px-2s py-3">
                                    Total pares
                                </th>
                                <th scope="col" class="px-2s py-3">
                                    Ultimo pedido
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            

                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $topClientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topcliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-8 h-8 rounded-full" src="<?php echo e($topcliente->profile_photo_path ? asset('storage/' . $topcliente->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png'); ?>" alt="Foto">
                                        <div class="ps-3">
                                            <div class="text-sm md:text-base font-semibold uppercase"><?php echo e($topcliente->name); ?></div>
                                            <div class="text-xs md:text-sm font-normal text-gray-500"><?php echo e($topcliente->email); ?></div>
                                        </div>  
                                    </th>
                                    <td class="px-6 py-4 uppercase">
                                        <?php echo e($topcliente->total_pedidos); ?>

                                    </td>
                                    <td class="px-6 py-4 uppercase dark:text-green-400">
                                        <?php echo e($topcliente->total_items); ?>

                                    </td> 
                                    <td class="px-6 py-4 uppercase dark:text-blue-400">
                                        <?php echo e(\Carbon\Carbon::parse($topcliente->ultimo_pedido)->format('d/m/Y')); ?>

                                    </td> 
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                        </tbody>
                    </table>

                    <div class="p-1" id="jeremias" x-data="{
                        jeremias(){
                            const observer = new IntersectionObserver((topClientes) => {
                                topClientes.forEach((topcliente) => {
                                    if(topcliente.isIntersecting){
                                        window.Livewire.find('<?php echo e($_instance->getId()); ?>').loadMore()
                                    }
                                    
                                })
                            })
                            observer.observe(this.$el)
                        }
                    }" x-init="jeremias"></div>

                </div>

            </div>




        </div>
    

</div>
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/livewire/users/top-cliente.blade.php ENDPATH**/ ?>