  <!--Div info inicio -->
  <div class="col-span-full">


      <div class="flex flex-col space-y-3 mb-3">

          <div
              class="flex justify-between w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Total de itens:
                  <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> <?php echo e($itens_qnde); ?></h1>
              </strong>
              
              <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Qnde total de pares:
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('OCUTAR-QNDE-ITEM-PEDIDO', $permissao)): ?>
                      <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> <?php echo e($pares_qnde); ?></h1>
                  <?php endif; ?>
              </strong>
          </div>

          
          

          <!--[if BLOCK]><![endif]--><?php if($status == 'solicitando cancelamento'): ?>
                  <div class="flex gap-x-2 border-2 border-dotted border-slate-300 dark:border-slate-600 p-2 rounded-md w-full">
                      <strong class="dark:text-gray-400 text-sm md:text-base">Status:</strong>
                      <h1 class="animate-bounce text-orange-600 dark:text-yellow-400 text-sm md:text-base capitalize">
                          <?php echo e($status); ?></h1>
                  </div>
              <?php else: ?>
                  <div class="flex gap-x-2 border-2 border-dotted border-slate-300 dark:border-slate-600 p-2 rounded-md w-full">
                      <strong class="dark:text-gray-400 text-sm md:text-base">Status:</strong>
                      <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize"><?php echo e($status); ?>

                      </h1>
                  </div>
              <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


           
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['PREFEITURA', 'TESTE'], $permissao)): ?>
            <div class="flex gap-x-2 w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
                <strong class="dark:text-gray-400 text-sm md:text-base">Prefeitura:</strong>
                <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize"><?php echo e($prefeitura); ?>

                </h1>
            </div>
            <?php endif; ?>
         

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('PREFEITURA', $permissao)): ?>
          <div class="flex gap-x-2  w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              <strong class="dark:text-gray-400 text-sm md:text-base">Marca:</strong>
              <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize"><?php echo e($marca); ?>

              </h1>
          </div>  
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('PREFEITURA', $permissao)): ?>
          <div class="flex gap-x-2 border-2 border-dotted border-slate-300 dark:border-slate-600 p-2 rounded-md w-full">
            <strong class="dark:text-gray-400 text-sm md:text-base">Grupo:</strong>
            <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize"><?php echo e($grupo); ?>

            </h1>
          </div>
         

        <div class="flex gap-x-2 border-2 border-dotted border-slate-300 dark:border-slate-600 p-2 rounded-md w-full">
            <strong class="dark:text-gray-400 text-sm md:text-base">Grade:</strong>
            <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize"><?php echo e($grade); ?>

            </h1>
        </div>
        <?php endif; ?>

          <div class="flex gap-x-2 border-2 border-dotted border-slate-300 dark:border-slate-600 p-2 rounded-md w-full">
              <h1 class="text-gray-600 dark:text-gray-400 "> Motivo do cancelamento:</h1>
              <h1 class="text-orange-600 dark:text-orange-400 text-sm md:text-base capitalize">
                  <?php echo e($motivo_cancelamento); ?></h1>
          </div>




          <div class="gap-x-2 border-2 border-dotted border-slate-300 dark:border-slate-600 p-2 rounded-md w-full">
              <strong class="dark:text-gray-400 text-sm md:text-base">Observações:</strong>
              <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize"><?php echo e($observacao); ?></h1>
          </div>
          
          <div class="py-5 w-full">
            <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['label' => 'Imprimir Pedido','icon' => 'printer'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'imprimirOrder('.e($idpedido).')','class' => 'w-full']); ?>
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

          <button class="text-white bg-blue-700 rounded-md" wire:click="generatePdf(<?php echo e($idpedido); ?>)"
              wire:loading.attr="disabled">
              <span wire:loading.remove>Imprimir pedido</span>
              <div wire:loading>Gerando relatório...</div>
          </button>


      </div>

  </div>
  <!--Div info fim -->
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/pedidos/md/cliente/complementoPedidoMD.blade.php ENDPATH**/ ?>