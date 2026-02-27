

<div>
    <h1 class="text-yellow-500">Listagem de estampas solicitadas em pedidos</h1>

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
<?php $component->withAttributes(['wire:model.live' => 'searchItensUsados','wire:keydown.enter' => 'consultarItensPedido','placeholder' => 'Pesquise a estampa...']); ?>
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

        <!--[if BLOCK]><![endif]--><?php if(count($transfersUsedPedidos) > 0): ?>
            <div class="mt-2 max-h-96 md:max-h-50v relative overflow-x-auto overflow-y-auto soft-scrollbar shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-2 py-3">Referência</th>
                            <th scope="col" class="px-2 py-3">Pedido ID</th>
                            <th scope="col" class="px-2 py-3">Cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $transfersUsedPedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-2 py-4 font-medium text-xs md:text-sm uppercase text-cyan-900 whitespace-nowrap dark:text-cyan-400">
                                    <?php echo e($item->produto->referencia); ?>

                                </td>
                                <td class="px-2 py-4 font-medium text-xs md:text-sm uppercase text-gray-900 whitespace-nowrap dark:text-gray-400">
                                    <?php echo e($item->pedido_id); ?>

                                </td>
                                <td class="px-2 py-4 font-medium text-xs md:text-sm uppercase text-gray-900 whitespace-nowrap dark:text-gray-400">
                                    <?php echo e($item->usuarios->name); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="mt-4 text-red-600 dark:text-red-400">Nenhum item encontrado.</p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/cadastros/transfers/transfers_used_pedido.blade.php ENDPATH**/ ?>