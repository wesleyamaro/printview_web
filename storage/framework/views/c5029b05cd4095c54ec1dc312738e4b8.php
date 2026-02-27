<!-- cabeçalho pedido inicio -->
<div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('EDIT-PEDIDO', $permissao)): ?>
        <?php echo $__env->make('components.pedidos.md.editor.cabecalhoPedidoMD', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- EDITOR -->
    <?php else: ?>
        <?php echo $__env->make('components.pedidos.md.cliente.cabecalhoPedidoMD', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- CLIENTE -->
    <?php endif; ?>
</div>
<!-- cabeçalho pedido fim -->


<!-- LAYOUT - INICIO -->
<div class="grid grid-cols-12 gap-2">


    <!-- itens pedido inicio -->
    <div class="col-span-8">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('EDIT-PEDIDO', $permissao)): ?>
            <?php echo $__env->make('components.pedidos.md.editor.itensPedidoMD2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- EDITOR -->
        <?php else: ?>
            <?php echo $__env->make('components.pedidos.md.cliente.itensPedidoMD2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- CLIENTE -->
        <?php endif; ?>
    </div>
    <!-- itens pedido fim -->


    <div x-data="{ tab: 'first' }" class="col-span-4 h-[40rem]">
        <!--TAB - INICIO-->
        <div class="flex">
            <button
                :class="{
                    'active': tab === 'first',
                    'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600': tab === 'first',
                    'border-b-2 border-gray-300 dark:border-slate-600': tab !== 'first'
                }"
                @click="tab = 'first'"
                class="text-gray-600 dark:text-blue-400 py-1 px-3 rounded-t-lg text-sm md:text-base">
                Itens do pedido
            </button>

            

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('CORREIA-PEDIDO', $permissao)): ?>
                <button
                    :class="{
                        'active': tab === 'terceiro',
                        'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600': tab === 'terceiro',
                        'border-b-2 border-gray-300 dark:border-slate-600': tab !== 'terceiro'
                    }"
                    @click="tab = 'terceiro'"
                    class="text-gray-600 dark:text-blue-400 py-1 px-3 rounded-t-md text-sm md:text-base">
                    Correia(s)
                </button>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('EDIT-PEDIDO', $permissao)): ?>
                <button
                    :class="{
                        'active': tab === 'quarto',
                        'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600': tab === 'quarto',
                        'border-b-2 border-gray-300 dark:border-slate-600': tab !== 'quarto'
                    }"
                    @click="tab = 'quarto'"
                    class="text-gray-600 dark:text-blue-400 py-1 px-3 rounded-t-md text-sm md:text-base">
                    Add+ produto
                </button>
            <?php endif; ?>


        </div>
        <!--TAB - FIM-->

        <!--TABS - INICIO-->
        <div class="bg-white dark:bg-slate-800 p-1 rounded-b-lg">
            <div x-show="tab === 'first'">
                <div class="mt-2  soft-scrollbar overflow-y-auto">


                    <!-- itens pedido inicio -->
                    <div>

                        <!-- complemento pedido inicio -->
                        <div>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('EDIT-PEDIDO', $permissao)): ?>
                                <?php echo $__env->make('components.pedidos.md.editor.complementoPedidoMD', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- EDITOR -->
                            <?php else: ?>
                                <?php echo $__env->make('components.pedidos.md.cliente.complementoPedidoMD', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- CLIENTE -->
                            <?php endif; ?>
                        </div>
                        <!-- complemento pedido fim -->


                    </div>
                    <!-- itens pedido fim -->


                </div>
            </div>

            


            <div x-show="tab === 'terceiro'">
                <div class="mt-2 min-h-65v max-h-65v soft-scrollbar overflow-y-auto">


                    <!-- complemento pedido inicio -->
                    <div>

                        <!-- itens pedido inicio -->
                        <div>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('EDIT-PEDIDO', $permissao)): ?>
                                <?php echo $__env->make('components.pedidos.md.editor.correiaPedidoMD', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- EDITOR -->
                            <?php else: ?>
                                <?php echo $__env->make('components.pedidos.md.cliente.correiaPedidoMD', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- CLIENTE -->
                            <?php endif; ?>
                        </div>
                        <!-- itens pedido fim -->


                    </div>
                    <!-- complemento pedido fim -->

                </div>
            </div>

            <div x-show="tab === 'quarto'">
                <div class="mt-2 min-h-65v max-h-65v soft-scrollbar overflow-y-auto">

                    <div>
                        <?php echo $__env->make('components.pedidos.md.editor.addItemPedidoMD', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- CLIENTE -->
                    </div>
                    <!-- complemento pedido fim -->

                </div>
            </div>

        </div>
        <!--TABS - FIM-->

    </div>
    <!-- LAYOUT - FIM -->
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/pedidos/md/pedido_md.blade.php ENDPATH**/ ?>