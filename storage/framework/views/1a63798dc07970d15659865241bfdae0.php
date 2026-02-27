<div>
    

         <?php $__env->slot('header', null, []); ?> 
            <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
                <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M15.077.019a4.658 4.658 0 0 0-4.083 4.714V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-1.006V4.68a2.624 2.624 0 0 1 2.271-2.67 2.5 2.5 0 0 1 2.729 2.49V8a1 1 0 0 0 2 0V4.5A4.505 4.505 0 0 0 15.077.019ZM9 15.167a1 1 0 1 1-2 0v-3a1 1 0 1 1 2 0v3Z"/>
                </svg>
                <?php echo e(__('Permissão de acesso ao sistema')); ?>

            </h2>
         <?php $__env->endSlot(); ?>
    
        <div class="px-2 py-5">

            <div class="w-full md:w-11/12 mx-auto sm:px-2 lg:p-3 bg-white dark:bg-slate-800 rounded-lg">

                <div class="md:flex md:items-end md:space-x-5 space-y-3 bg-slate-300 dark:bg-slate-900 p-2 rounded-lg">
                    
                    <div class="w-full md:w-3/12">                        
                        <?php if (isset($component)) { $__componentOriginalba37bc18e15fb5b3998ec0574c6b817c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba37bc18e15fb5b3998ec0574c6b817c = $attributes; } ?>
<?php $component = WireUi\View\Components\Select::resolve(['label' => 'Encontre o usuário que deseja atribuir permissão','placeholder' => 'Selecione um usuário','emptyMessage' => 'Cliente não encontrado'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Select::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['autocomplete' => 'off','z-index' => 'z-50','wire:model.live' => 'selectedUser']); ?>
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

                    <div>
                        <?php if (isset($component)) { $__componentOriginal82b947c12c0b8a4cfc71f282aadb8530 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal82b947c12c0b8a4cfc71f282aadb8530 = $attributes; } ?>
<?php $component = WireUi\View\Components\Checkbox::resolve(['label' => 'LIBERAR PERMISSÕES PADRÃO ( CLIENTE )'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('checkbox-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'insertRegrasPadrao','wire:model' => 'checkboxPadrao','positive' => true,'id' => 'right-label']); ?>
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

                    <div>          
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
                    </div>

                    
                    
                </div>

                <div class="md:flex mt-5 bg-white dark:bg-slate-800 overflow-hidden shadow-xl rounded-lg">
                    
                    <!--PERMISSOES DISPONIVEIS -->
                    <div class="bg-blue-400 md:w-5/12 rounded-lg">
                        
                        <div class="bg-blue-800 p-2 rounded-t-lg">
                            <h1 class="text-white">Permissão disponível</h1>
                        </div>

                        <div class="p-2">
                            <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['icon' => 'search'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'search','placeholder' => 'pesquise a permissão...']); ?>
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
                            <!--div table -->
                            <div class="mt-2 max-h-96 md:max-h-50v relative overflow-x-auto overflow-y-auto soft-scrollbar shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <input wire:model.live="checkboxAllDisponivel"  id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                                </div>
                                            </th>
                                            <th scope="col" class="px-0 py-3">
                                                #
                                            </th>
                                            <th scope="col" class="px-0 py-3">                                               
                                                <div class="flex items-center">
                                                    Permissão
                                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                                    </svg></a>
                                                </div>
                                            </th>
                                            
                                            <th scope="col" class="px-0 py-3">
                                                Sobre a permissão
                                            </th>

                                            <th scope="col" class="px-0 py-3 text-center">
                                                Classe
                                            </th>
  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $regrasNaoAssociadasAoUsuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $naoassociadas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-orange-950">                                          
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input wire:model.live="checkboxDisponivel" value="<?php echo e($naoassociadas->id); ?>"  wire:key="<?php echo e($naoassociadas->id); ?>" id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <td scope="row" class="px-0 py-4 text-gray-900 whitespace-nowrap dark:text-gray-400">
                                                    <?php echo e('#'.$naoassociadas->id); ?>

                                                </td>
                                                <th scope="row" class="px-2 py-4 uppercase font-mono text-gray-900 whitespace-nowrap dark:text-green-400">
                                                    <?php echo e($naoassociadas->nome); ?>

                                                </th>
                                                
                                                <th scope="row" class="px-0 py-4 uppercase font-mono text-sm whitespace-nowrap text-gray-900  dark:text-gray-500">
                                                    <?php echo e($naoassociadas->observacao); ?>

                                                </th>

                                                <th scope="row" class="px-3 py-4 uppercase font-mono text-gray-900 whitespace-nowrap dark:text-cyan-500">
                                                    <?php echo e($naoassociadas->classe); ?>

                                                </th>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <th>
                                                       <h1 class="text-red-600">Nada encotrado!</h1> 
                                                    </th>
                                                </tr>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                              
                            
                                    </tbody>
                                </table>
                            </div>
                            <!--Fim div table -->
                            <div class="mt-3">
                                
                                <button wire:click="adicionarRegraAoUsuario" type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Liberar selecionados
                                    <span class="inline-flex items-center justify-center w-4 h-4 ms-2 p-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                                    <?php echo e($totalselected); ?>

                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--PERMISSOES DISPONIVEIS - FIM-->

                    <div class="flex items-center justify-center  p-2">
                        <svg class="w-5 h-5 rotate-90 md:rotate-0 text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                        </svg>
                    </div>

                    <!--PERMISSOES LIBERADAS -->
                    <div class="bg-green-400 md:w-7/12 rounded-lg">
                        
                        <div class="bg-green-800 p-2 rounded-t-lg">
                            <h1 class="text-white">Permissão liberadas</h1>
                        </div>

                        <div class="p-2">
                            <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['icon' => 'search'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'searchAssociados','placeholder' => 'pesquise a permissão...']); ?>
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

                             <!--div table -->
                             <div class="mt-2 max-h-96 md:max-h-50v relative overflow-x-auto overflow-y-auto soft-scrollbar shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <input wire:model.live="checkboxAllLiberados" id="checkbox-all-liberados" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-all-liberados" class="sr-only">checkbox</label>
                                                </div>
                                            </th>
                                            <th scope="col" class="px-0 py-3">
                                                #
                                            </th>
                                            <th scope="col" class="px-0 py-3">
                                                Permissão
                                            </th>
                                            
                                            <th scope="col" class="px-2 py-3">
                                                Sobre a permissão
                                            </th>
                               
                                            <th scope="col" class="px-2 py-3">
                                                Classe
                                            </th>

                                            <th scope="col" class="px-2 py-3 text-center">
                                                Ação
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $regrasAssociadasAoUsuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $associadas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-orange-950">
                                            <td class="w-4 p-4">
                                                <div class="flex items-center">
                                                    <input wire:model.live="checkboxLiberados" value="<?php echo e($associadas->id); ?>" id="checkbox-table-search-2" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            <td scope="row" class="px-0 py-4 text-gray-900 whitespace-nowrap dark:text-gray-400">
                                                <?php echo e('#' . $associadas->id); ?>

                                            </td>
                                            <th scope="row" class="px-2 py-4 uppercase font-mono text-gray-900 whitespace-nowrap dark:text-green-400">
                                                <?php echo e($associadas->nome); ?>

                                            </th>
                                            
                                            <th scope="row" class="px-2 py-4 uppercase font-mono text-sm text-gray-900 whitespace-nowrap dark:text-gray-500">
                                                <?php echo e($associadas->observacao); ?>

                                            </th>

                                            <th scope="row" class="px-2 py-4 uppercase font-mono text-gray-900 whitespace-nowrap dark:text-gray-500">
                                                <?php echo e($associadas->classe); ?>

                                            </th>
                                   
                                            <td class="flex items-center px-2 py-4">                       
                                                <a wire:click="removeRegraUser(<?php echo e($associadas->id); ?>)" wire:key="<?php echo e($associadas->id); ?>" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3 cursor-pointer">Remover</a>
                                            </td>
                                        </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <th>
                                                        <h1 class="text-red-600">Nada encotrado!</h1> 
                                                    </th>
                                                </tr>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                              
                            
                                    </tbody>
                                </table>
                            </div>
                            <!--Fim div table -->

                            <div class="mt-3">
                                
                                <button wire:click="removerRegraSelecionadas" type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    Remover selecionados
                                    <span class="inline-flex items-center justify-center w-4 h-4 ms-2 p-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">
                                    <?php echo e($totalselectedLiberados); ?>

                                    </span>
                                </button>
                            </div>

                        </div>
                    </div>
                    <!--PERMISSOES DISPONIVEIS - FIM-->

                </div>

            </div>

        </div>
    

</div>
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/livewire/users/permissao-sistema.blade.php ENDPATH**/ ?>