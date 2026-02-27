<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido - #<?php echo e($pedido->id); ?></title>
    <script src="https://cdn.tailwindcss.com "></script>
</head>
<body class="bg-gray-50 font-sans min-h-screen py-3 px-6">
    <div class="max-w-5xl mx-auto bg-white p-4 ">
        <!-- Título -->
        
        <div class="flex justify-between items-center mb-4">
            
            <div class="flex gap-x-2">
                <img src="<?php echo e(asset('img/printview-logo.svg')); ?>" alt="Jese image" class="w-20 h-20">
            </div>

            <h1 class="text-2xl font-bold text-gray-800">
                Relatório de Pedido
            </h1>

            <div>
                <p class="text-md text-gray-500">
                    Pedido: #<?php echo e($pedido->id); ?>

                </p>
                <p class="text-md text-blue-500">
                    Nº Modelo: <?php echo e($pedido->pedido_modelo ?? '0000'); ?>

                </p>
            </div>

        </div>

        <!-- Detalhes do Pedido (Compacto) -->
        <div class="mt-6 flex justify-between flex-wrap gap-4 text-sm text-gray-700 border-b border-gray-200 pb-4">
            <div>
                <div>
                    <span class="font-medium">Cliente:</span>
                    <span><?php echo e($pedido->user->name); ?></span>
                </div>
                <?php if($pedido->prefeitura == null): ?> <!-- Se prefeitura for vazio exibe-->
                <div>
                    <span class="font-medium">Marca:</span>
                    <span class="capitalize"><?php echo e($pedido->marca); ?></span>
                </div>
                <?php endif; ?>
                <div>
                    <?php if(!empty($pedido->prefeitura)): ?>
                        <span class="font-medium">Prefeitura:</span>
                    <?php endif; ?>
                    <span class="capitalize"><?php echo e($pedido->prefeitura); ?></span>
                </div>
            </div>
            <div>
                <div>
                    <span class="font-medium">Status:</span>
                    <span class="text-white px-2 py-1 rounded-lg bg-green-500 text-xs font-semibold capitalize"><?php echo e($pedido->status); ?></span>
                </div>
                <?php if($pedido->prefeitura == null): ?> <!-- Se prefeitura for vazio exibe-->
                <div>
                    <span class="font-medium">Grade:</span>
                    <span><?php echo e($pedido->grade); ?></span>
                </div>
                <div>
                    <span class="font-medium capitalize">Gênero:</span>
                    <span><?php echo e($pedido->grupo); ?></span>
                </div>
                <?php endif; ?>
            </div>
            <div>
                <div>
                    <span class="font-medium">Itens:</span>
                    <span><?php echo e($pedido->itemPedidos->count()); ?></span>
                </div>
                <div>
                    <span class="font-medium">Quantidade:</span>
                    <span><?php echo e($pedido->itemPedidos->sum('quantidade')); ?></span>
                </div>
            </div>
        </div>

        <!-- Itens do Pedido -->
        <div class="mt-2">
            <h2 class="text-md font-semibold text-gray-700 mb-2">Itens do Pedido:</h2>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Imagem
                            </th>
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Referência
                            </th>
                            <?php if($pedido->prefeitura): ?> <!-- Se prefeitura for vazio exibe-->
                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Produto
                            </th>
                            <?php endif; ?>
                            <th class="<?php echo e($pedido->itemPedidos->where('correiacor', '!=', null)->count() > 0 ? 'block' : 'hidden'); ?> px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Correia cor
                            </th>
                            <th class="<?php echo e($pedido->itemPedidos->where('medida', '!=', null)->count() > 0 ? 'block' : 'hidden'); ?> px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                               Tamanho
                            </th>
                            <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Quantidade
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $__currentLoopData = $pedido->itemPedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-1 whitespace-nowrap">
                                    <img
                                        src="<?php echo e($item->imagem_cliente ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produtos->imagem}")); ?> "
                                        alt="Imagem do produto"
                                        class="w-14 h-14 object-contain"
                                    />
                                </td>
                                <td class="px-3 py-1 whitespace-nowrap">
                                    <?php echo e($item->produto->referencia ?? 'N/A'); ?>

                                </td>
                                <td class="<?php echo e($item->prefeitura_produto != null ? '' : 'hidden'); ?> px-3 py-1 whitespace-nowrap">
                                    <span class="capitalize"><?php echo e($item->prefeitura_produto ?? '-'); ?></span>
                                </td>
                                <td class="<?php echo e($item->correiacor != null ? 'block' : 'hidden'); ?> px-3 py-1 whitespace-nowrap uppercase">
                                    <?php echo e($item->correiacor ?? '-'); ?>

                                </td>
                                <td class="<?php echo e($item->medida != null ? 'block' : 'hidden'); ?> px-3 py-1 whitespace-nowrap uppercase">
                                    <?php echo e($item->medida ?? '-'); ?>

                                </td>
                                <td class="px-3 py-1 whitespace-nowrap text-center">
                                    <?php echo e($item->quantidade); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

       <!-- Obeservações -->
       <div class="mt-2 border-t border-gray-200 pt-2">
            <h2 class="text-md font-semibold text-gray-700 mb-4">Observações:</h2>
            <p class="text-sm text-gray-500 font-mono"><?php echo e($pedido->observacao); ?></p>
        </div>

        <!-- Rodapé -->
        <div class="mt-8 pt-4 border-t border-gray-200 text-right">
            <p class="text-sm text-gray-500">
                Relatório gerado em: <?php echo e(now()->format('d/m/Y H:i:s')); ?>

            </p>
        </div>
    </div>
</body>

<script>
    // Script para impressão automática quando a página carregar
    window.onload = function() {
        // Pequeno delay para garantir que a página esteja completamente carregada
        setTimeout(function() {
            window.print();
        }, 500);
    };
</script>

</html><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/reports/order/print-order-v1.blade.php ENDPATH**/ ?>