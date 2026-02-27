  <!--Div info inicio -->
  <div class="col-span-full">


      <div class="flex flex-col space-y-1 mb-3">

          <div class="w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Total de itens:
                  <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> <?php echo e($itens_qnde); ?></h1>
              </strong>
              <hr class="border border-slate-300 dark:border-slate-600 border-dashed my-2">
              <strong class="flex gap-x-2 dark:text-gray-400 text-sm md:text-base">Qnde total de pares:
                  <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base"> <?php echo e($pares_qnde); ?></h1>
              </strong>
          </div>


          <div
              class="flex gap-x-2 justify-between w-full border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['PREFEITURA', 'VER TODOS - PEDIDOS'], $permissao)): ?>
              <div class="gap-x-2 w-auto">
                  <strong class="dark:text-gray-400 text-sm md:text-base">Prefeitura:</strong>
                  <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize"><?php echo e($prefeitura); ?>

                  </h1>
              </div>
              <?php else: ?>
              <div class="gap-x-2 w-auto">
                <strong class="dark:text-gray-400 text-sm md:text-base">Marca:</strong>
                <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize"><?php echo e($marca); ?>

                </h1>
              </div>
              <?php endif; ?>
              
          </div>
          
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('PREFEITURA', $permissao)): ?>
          <div class="w-auto border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              <strong class="dark:text-gray-400 text-sm md:text-base">Grupo:</strong>
              <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize"><?php echo e($grupo); ?></h1>
          </div>
          

          <div class="w-auto border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
            <strong class="dark:text-gray-400 text-sm md:text-base">Grade:</strong>
            <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize"><?php echo e($grade); ?></h1>
        </div>
        <?php endif; ?>

          <!--[if BLOCK]><![endif]--><?php if($status == 'solicitando cancelamento'): ?>
              <div class="w-auto border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
                  <strong class="dark:text-gray-400 text-sm md:text-base">Status:</strong>
                  <h1 class="animate-bounce  text-orange-600 dark:text-yellow-300 text-sm md:text-base capitalize">
                      <?php echo e($status); ?></h1>
              </div>
          <?php else: ?>
              <div class="w-auto border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
                  <strong class="dark:text-gray-400 text-sm md:text-base">Status:</strong>
                  <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize"><?php echo e($status); ?>

                  </h1>
              </div>
          <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

          <div
              class="w-auto border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              <strong class="dark:text-gray-400 text-sm md:text-base">Observações:</strong>
              <div class="soft-scrollbar overflow-y-auto max-h-20">
                  <h1 class="text-green-600 dark:text-green-400 text-sm md:text-base capitalize"><?php echo e($observacao); ?>

                  </h1>
              </div>
          </div>

          <div class="border-2 border-dotted border-slate-300 dark:border-slate-600 rounded-md p-2">
              <h1 class="text-gray-600 dark:text-gray-400 "> Motivo solicitação cancelamento:</h1>
              <h1 class="text-orange-600 dark:text-orange-400 text-sm md:text-base capitalize">
                  <?php echo e($motivo_cancelamento); ?></h1>
          </div>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ALLPEDIDO', $permissao)): ?>
              <div class="flex gap-x-2 mt-5 py-5 px-2">
                  <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                      alt="Jese image">
                  <div class="ps-1 cursor-pointer" x-on:click="$openModal('simpleModal')">
                      <div class="text-base font-semibold dark:text-gray-300"><?php echo e($username); ?></div>
                      <div class="font-normal text-gray-500"><?php echo e($useremail); ?></div>
                  </div>
              </div>
          <?php endif; ?>

          <!-- Accordion inicio -->
          
          <!-- Acordion fim -->

      </div>

  </div>
  <!--Div info fim -->
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/pedidos/sm/cliente/complementoPedidoSM.blade.php ENDPATH**/ ?>