<div>
    
    <div class="w-full md:w-10/12 m-auto mt-5 p-1 md:p-5 rounded-md dark:bg-slate-800">

        <div class="flex gap-x-2 items-end  p-1 md:p-2 dark:bg-slate-700 rounded-md my-2 w-auto">

            <div>
                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['icon' => 'search'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'search','placeholder' => 'pesquise o log...']); ?>
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
                
            <div class="w-96">
                <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['placeholder' => 'Selecione um usuário','emptyMessage' => 'Cliente não encontrado'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['autocomplete' => 'off','z-index' => 'z-50','wire:model.live' => 'userSelected']); ?>
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

            <div class="flex gap-x-3  md:w-4/12">
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

        
        

            <div class="relative overflow-y-auto soft-scrollbar  max-h-[30rem] shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                            Tipo ação
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Descrição
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Usuário
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $logList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            

                            <th scope="row" class="
                            <?php switch($log->action_type):
                                case ('delete'): ?>
                                    text-red-500
                                    <?php break; ?>
                                <?php case ('cancelado'): ?>
                                    text-yellow-300
                                    <?php break; ?>
                                <?php case ('status'): ?>
                                    text-pink-500
                                    <?php break; ?>
                                <?php case ('entregue'): ?>
                                    text-green-500
                                    <?php break; ?>
                                <?php case ('update'): ?>
                                    text-blue-500
                                    <?php break; ?>
                                <?php case ('pedido'): ?>
                                    text-lime-600 dark:text-lime-400
                                    <?php break; ?>
                                <?php case ('add item'): ?>
                                    text-purple-600 dark:text-purple-400
                                    <?php break; ?>
                                <?php case ('registrou'): ?>
                                    text-cyan-400
                                    <?php break; ?>
                                <?php default: ?>
                                    
                                <?php endswitch; ?>
                            text-xs md:text-sm uppercase px-6 py-4 font-medium">
                            <?php echo e($log->action_type); ?>

                        </th>


                            <td class="px-6 py-4 text-nowrap text-xs md:text-sm uppercase">
                                <?php echo e($log->description); ?>

                            </td>
                            <td class="px-6 py-4 text-nowrap text-xs md:text-sm">
                                <?php echo e($log->created_at->format('d/m/Y H:i')); ?>

                            </td>
                            <td class="px-6 py-4 text-nowrap text-xs md:text-sm uppercase">
                                <?php echo e($log->users->name); ?>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr class="">
                            <td class="px-6 py-4 text-red-500">
                                Nenhum log encontrado...
                            </td>
                        </tr>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                      
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end p-2 dark:bg-slate-800">                   
                <?php echo e($logList->links()); ?>

            </div>

        </div>

</div>
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/livewire/users/log-users.blade.php ENDPATH**/ ?>