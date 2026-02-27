<div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('TESTE', $permissao)): ?>
        <?php echo $__env->make('livewire.produtos.componentes.produtos_list_002', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Modelo novo - Produtos List 002 -->
    <?php else: ?>
        <?php echo $__env->make('livewire.produtos.componentes.produtos_list_001', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Modelo antigo - Produtos List 001 -->
    <?php endif; ?>
</div>
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/livewire/produtos/transfer-table.blade.php ENDPATH**/ ?>