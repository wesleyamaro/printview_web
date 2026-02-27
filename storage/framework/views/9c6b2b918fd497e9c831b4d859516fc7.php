<div>


     <?php $__env->slot('header', null, []); ?> 
        <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
            <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M15.077.019a4.658 4.658 0 0 0-4.083 4.714V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-1.006V4.68a2.624 2.624 0 0 1 2.271-2.67 2.5 2.5 0 0 1 2.729 2.49V8a1 1 0 0 0 2 0V4.5A4.505 4.505 0 0 0 15.077.019ZM9 15.167a1 1 0 1 1-2 0v-3a1 1 0 1 1 2 0v3Z"/>
            </svg>
            <?php echo e(__('Permissão de acesso ao sistema')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="w-full md:w-10/12 mx-auto sm:px-2 lg:p-3 mt-3 bg-white dark:bg-slate-800 rounded-lg">
  
          <div class="md:flex space-y-2 justify-between p-2 mb-4 rounded-lg bg-slate-300 dark:bg-slate-900">
  
              <div class="w-full md:w-80 mt-2 ">
                  <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['wire:model.live' => 'search','icon' => 'search','placeholder' => 'Pesquise o cliente...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'search','icon' => 'search','placeholder' => 'Pesquise o cliente...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
              </div>
  
              <div class="flex items-center gap-x-2 rounded-lg w-full md:w-auto p-2 bg-yellow-300">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                      class="stroke-current shrink-0 w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <span class=" text-red-600">Cliente bloqueados não terão mais acesso ao sistema.</span>
              </div>
  
          </div>
  
          <div class="relative overflow-x-auto soft-scrollbar max-h-70v shadow-md sm:rounded-lg bg-gray-50 dark:bg-slate-800">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs sticky top-0 text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="p-4">
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Nome
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Data criação
                          </th>
                          
                          <th scope="col" class="px-6 py-3">
                              Status
                          </th>
                          <th scope="col" class="px-6 py-3">
                            Data bloqueio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ação
                        </th>
                      </tr>
                  </thead>
                  <tbody>
                      <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr
                              class="<?php echo e($user->bloqueio ? 'bg-red-300 dark:bg-red-950' : ''); ?> dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600">
                              <td class="w-4 p-4">
                                  <div class="flex items-center">
                                      <input wire:click="toggleBloqueio(<?php echo e($user->id); ?>)"
                                          wire:key="<?php echo e($user->id); ?>" <?php echo e($user->bloqueio ? 'checked' : ''); ?>

                                          id="checkbox-table-search-1" type="checkbox"
                                          class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                      <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                  </div>
                              </td>
                              <th scope="row"
                                  class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                  <img class="w-10 h-10 rounded-full"
                                      src="<?php echo e($user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png'); ?>"
                                      alt="imagem user">
                                  <div class="ps-3">
                                      <div class="text-sm md:text-base uppercase font-semibold"><?php echo e($user->name); ?></div>
                                      <div class="font-normal text-xs text-gray-600 dark:text-gray-400"><?php echo e($user->email); ?></div>
                                  </div>
                              </th>
                              <td class="px-6 py-4">
                                  <?php echo e(date('d/m/Y H:i:s', strtotime($user->created_at))); ?>

                              </td>
                              <td class="px-6 py-4">
                                  <div class="flex items-center">
                                    <!--[if BLOCK]><![endif]--><?php if($user->bloqueio == 1): ?>
                                      <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Offline
                                    <?php else: ?>
                                      <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                  </div>
                              </td>

                              <td class="px-6 py-4">
                                <?php echo e(date('d/m/Y H:i:s', strtotime($user->updated_at))); ?>                               
                            </td>
                            <td class="px-6 py-4">
                                <a class="text-red-500 cursor-pointer" wire:click="showConfirmDelete(<?php echo e($user->id); ?>)">
                                    <svg class="w-4 h-4 text-red-500 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                    </svg>
                                </a>                             
                            </td>
                          </tr>
                          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                  </tbody>
              </table>
  
          </div>
      </div>
  </div>
  <?php /**PATH /home/u637911780/domains/printview.shop/resources/views/livewire/users/bloqueio-user.blade.php ENDPATH**/ ?>