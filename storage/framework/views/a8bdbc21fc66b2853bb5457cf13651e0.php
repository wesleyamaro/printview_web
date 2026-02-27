<div>
    
    <div class="w-full md:w-10/12 m-auto mt-5 p-1 md:p-5 rounded-md dark:bg-slate-800">

        <div class="flex gap-x-2 items-end  justify-between p-1 md:p-2 dark:bg-slate-700 rounded-md my-2 w-auto">

            <div class="w-full md:w-auto">
                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['icon' => 'search'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'search','placeholder' => 'pesquise pagamento...']); ?>
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
            <div>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ADMIN', $permissao)): ?>
                    <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['label' => 'Cadastrar Boleto'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['positive' => true,'wire:click' => 'showCreateModal']); ?>
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
        </div>


        <div wire:poll.30s class="overflow-y-auto overflow-x-auto max-h-[33rem] md:max-h-[42rem] soft-scrollbar rounded-lg">
 
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-3 text-center">
                            #
                        </th>

                        <th scope="col" class="px-2 py-3 text-center">
                            Vencimento
                        </th>
                        
                        <th scope="col" class="md:table-cell px-1 py-3 text-center">
                            Status
                        </th>                    

                        <th scope="col" class="px-3 py-3 text-center">
                            Desconto
                        </th>
                        <th scope="col" class="md:table-cell px-1 py-3 text-center">
                            Valor
                        </th>

                        <th scope="col" class="md:table-cell px-1 py-3 text-center">
                            Observação
                         </th>

                        <th scope="col" class="md:table-cell px-1 py-3 text-center">
                            Ação
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $pagamentoList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>                 
                    
                        <tr wire:key="<?php echo e($item->id); ?>" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800  border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">

                            <td class="px-3 py-2 cursor-pointer text-center" wire:click="modalShow(<?php echo e($item->id); ?>)">                           
                                <h1 class="font-bold text-blue-600 dark:text-blue-400 text-xs md:text-sm"><?php echo e(str_pad($item->id, 4, '0', STR_PAD_LEFT)); ?></h1>
                            </td>
 
                            <td class="px-2 py-2">
                                <div class="flex items-center justify-center text-xs md:text-sm">
                                    <?php echo e(\Carbon\Carbon::parse($item->vencimento)->format('d/m/Y')); ?>

                                </div>
                            </td>

                            
                            <td class="px-3 py-2">
                                <div class="flex items-center justify-center ">
                                    
                                    <!--[if BLOCK]><![endif]--><?php switch($item->status):
                                        case ('pago'): ?>
                                            <h1 class="text-green-500 dark:text-green-400 capitalize text-xs md:text-sm"><?php echo e($item->status); ?></h1>
                                            <?php break; ?>
                                        <?php case ('aberto'): ?>
                                            <h1 class="text-gray-500 dark:text-blue-400 capitalize text-xs md:text-sm"><?php echo e($item->status); ?></h1>
                                            <?php break; ?>
                                        <?php case ('vencido'): ?>
                                            <h1 class="text-red-500 dark:text-red-400 capitalize animate-pulse text-xs md:text-sm"><?php echo e($item->status); ?></h1>
                                            <?php break; ?>
                                        <?php default: ?>
                                            
                                    <?php endswitch; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </td>

                            

                            <td class="px-3 py-2">
                                <div class="flex items-center justify-center text-xs md:text-sm">
                                    <?php echo e($item->desconto); ?>

                                </div>
                            </td>

                            <td class="px-3 py-2">
                                <div class="flex items-center justify-center text-xs md:text-sm">
                                    <?php echo e($item->valor); ?>

                                </div>
                            </td>

                            <td class="px-3 py-2">
                                <div class="flex items-center justify-center capitalize text-xs md:text-sm">
                                    <?php echo e($item->observacao); ?>

                                </div>
                            </td>

                             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ADMIN', $permissao)): ?>
                            <td class="px-3 py-2">
                                <div class="flex items-center justify-center text-xs md:text-sm">
                                    <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['icon' => 'trash','flat' => true,'rounded' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['negative' => true,'wire:click' => 'ShowDeletePagamento('.e($item->id).')']); ?>
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
                            </td>
                            <?php endif; ?>

                        </tr>

                        

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="w-full h-10">
                            <h1 class="text-red-500 text-xs md:text-sm">Nenhum pedido encontrado.</h1>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    
                </tbody>
                

            </table>
    
         <!--Serve pra paginate auto usando alpineJs - INICIO -->
            <div class="p-0.5 text-center text-xs " id="jeremias" x-data="{
                jeremias(){
                    const observer = new IntersectionObserver((pagamentoList) => {
                        pagamentoList.forEach((pedido) => {
                            if(pedido.isIntersecting){
                                window.Livewire.find('<?php echo e($_instance->getId()); ?>').loadMore()
                            }
                            
                        })
                    })
                    observer.observe(this.$el)
                }
            }" x-init="jeremias">
            <!--[if BLOCK]><![endif]--><?php if($pagamentoList->hasMorePages()): ?> 
                <h1 class="text-green-500 dark:text-green-400 text-xs md:text-sm">Carregando mais registros...</h1>
            <?php else: ?>
                <h1 class="text-yellow-600 dark:text-yellow-300 text-xs md:text-sm">Não existem mais registros para carregar</h1>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>


        

        <?php if (isset($component)) { $__componentOriginal7ea8362733ae9e02c43079506217fb0f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7ea8362733ae9e02c43079506217fb0f = $attributes; } ?>
<?php $component = WireUi\View\Components\Modal::resolve(['name' => 'createPagamentoModal'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'createPagamentoModal']); ?>
            <?php if (isset($component)) { $__componentOriginal526977d3da1dbf047bef54116d3416a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal526977d3da1dbf047bef54116d3416a0 = $attributes; } ?>
<?php $component = WireUi\View\Components\Card::resolve(['title' => 'Cadastrar Boleto'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

                <form wire:submit.prevent="createPagamento">
                    <div class="flex gap-x-2">

                        <div class="w-60">
                            <?php if (isset($component)) { $__componentOriginal2225aca2c40fa71fe239aabb14054f8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2225aca2c40fa71fe239aabb14054f8e = $attributes; } ?>
<?php $component = WireUi\View\Components\DatetimePicker::resolve(['label' => 'Data vencimento','displayFormat' => 'DD/MM/YYYY'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datetime-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\DatetimePicker::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'default-picker','placeholder' => 'Data','wire:model' => 'vencimento']); ?>
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

                        <div class="w-40">
                            <?php if (isset($component)) { $__componentOriginalcca70a8bd451d922b269d11a9aa1b486 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcca70a8bd451d922b269d11a9aa1b486 = $attributes; } ?>
<?php $component = WireUi\View\Components\Inputs\CurrencyInput::resolve(['label' => 'Desconto','prefix' => 'R$','thousands' => '.','precision' => '4','decimal' => ','] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('inputs.currency'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Inputs\CurrencyInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'desconto','placeholder' => '00']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcca70a8bd451d922b269d11a9aa1b486)): ?>
<?php $attributes = $__attributesOriginalcca70a8bd451d922b269d11a9aa1b486; ?>
<?php unset($__attributesOriginalcca70a8bd451d922b269d11a9aa1b486); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcca70a8bd451d922b269d11a9aa1b486)): ?>
<?php $component = $__componentOriginalcca70a8bd451d922b269d11a9aa1b486; ?>
<?php unset($__componentOriginalcca70a8bd451d922b269d11a9aa1b486); ?>
<?php endif; ?>
                        </div>

                        <div class="w-40">
                            <?php if (isset($component)) { $__componentOriginalcca70a8bd451d922b269d11a9aa1b486 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcca70a8bd451d922b269d11a9aa1b486 = $attributes; } ?>
<?php $component = WireUi\View\Components\Inputs\CurrencyInput::resolve(['label' => 'Valor','prefix' => 'R$','thousands' => '.','precision' => '4','decimal' => ','] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('inputs.currency'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Inputs\CurrencyInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'valor','placeholder' => '00']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcca70a8bd451d922b269d11a9aa1b486)): ?>
<?php $attributes = $__attributesOriginalcca70a8bd451d922b269d11a9aa1b486; ?>
<?php unset($__attributesOriginalcca70a8bd451d922b269d11a9aa1b486); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcca70a8bd451d922b269d11a9aa1b486)): ?>
<?php $component = $__componentOriginalcca70a8bd451d922b269d11a9aa1b486; ?>
<?php unset($__componentOriginalcca70a8bd451d922b269d11a9aa1b486); ?>
<?php endif; ?>
                        </div>

                        
                    </div>

                    <div class="w-full">
                        <?php if (isset($component)) { $__componentOriginal05e078adad918d7a9c127c65d98f7d47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal05e078adad918d7a9c127c65d98f7d47 = $attributes; } ?>
<?php $component = WireUi\View\Components\Textarea::resolve(['label' => 'Observação'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('textarea-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Observação do boleto','wire:model' => 'observacao']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal05e078adad918d7a9c127c65d98f7d47)): ?>
<?php $attributes = $__attributesOriginal05e078adad918d7a9c127c65d98f7d47; ?>
<?php unset($__attributesOriginal05e078adad918d7a9c127c65d98f7d47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal05e078adad918d7a9c127c65d98f7d47)): ?>
<?php $component = $__componentOriginal05e078adad918d7a9c127c65d98f7d47; ?>
<?php unset($__componentOriginal05e078adad918d7a9c127c65d98f7d47); ?>
<?php endif; ?>
                    </div>

                    <p>
                        Cadastro de pagamentos do sistema.
                    </p>
                    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['label' => 'Cadastrar'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['positive' => true,'wire:click' => 'createPagamento','class' => 'mt-3']); ?>
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
</div>
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/livewire/users/pagamento-sistema.blade.php ENDPATH**/ ?>