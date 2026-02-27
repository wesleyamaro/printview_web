
 <!-- drawer component -->
 <div id="drawer-navigation" class="fixed top-0 left-0 z-40 w-72 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-navigation-label">
    
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>
  <div class="py-4 overflow-y-auto">

      <a href="<?php echo e(route('novidades')); ?>" wire:navigate class="flex items-center ps-2.5 mb-5">
         <img src="https://printview.shop/img/logo_printview.png" class="h-6 me-3 sm:h-7" alt="Printview Logo" />
         <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-gray-200">PrintView</span>         
      </a>


      <hr class="border-gray-500 dark:border-gray-500">

      <ul class="space-y-2 font-medium">
        
         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MENU-MAIS-VENDIDO', $permissao)): ?>
        <li>
            <a href="<?php echo e(route('mais_vendido')); ?>" wire:navigate class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
              </svg>
               <span class="ms-3">Estampas mais pedidas</span>
            </a>
         </li>
         <?php endif; ?>

         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MENU-NOVIDADE', $permissao)): ?>
         <li>
            <a href="<?php echo e(route('novidades')); ?>" wire:navigate class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
                  <path d="M15 1.943v12.114a1 1 0 0 1-1.581.814L8 11V5l5.419-3.871A1 1 0 0 1 15 1.943ZM7 4H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2v5a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V4ZM4 17v-5h1v5H4ZM16 5.183v5.634a2.984 2.984 0 0 0 0-5.634Z"/>
                </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Novidades</span>
               <span class="inline-flex items-center justify-center px-2 py-1 ms-3 text-xs font-medium text-white bg-green-600 rounded-full  dark:text-gray-300">New</span>
            </a>
         </li>
         <?php endif; ?>



         <li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MENU-PRODUTOS', $permissao)): ?>
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                 </svg>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Produtos</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <?php endif; ?>

            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                 

                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('SUBMENU-TRANSFER', $permissao)): ?>
                  <li>
                     <a href="<?php echo e(route('produtos', ['tipo' => 'transfer'])); ?>" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Transfers</a>
                  </li>
                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('SUBMENU-TERMOPATCH', $permissao)): ?>
                  <li>
                     <a href="<?php echo e(route('produtos', ['tipo' => 'termopatch'])); ?>" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Termopatch</a>
                  </li>
                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('SUBMENU-SINTETICO', $permissao)): ?>
                  <li>
                     <a href="#" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Sintético</a>
                  </li>
                  <?php endif; ?>
            </ul>
         </li>

         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MENU-CARRINHO', $permissao)): ?>
         <li>
            <a href="<?php echo e(route('carrinho_compra')); ?>" wire:navigate class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                    <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Carrinho</span>
            </a>
         </li>
         <?php endif; ?>

         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MENU-PEDIDO', $permissao)): ?>
         <li>
            <a href="<?php echo e(route('pedidos')); ?>" wire:navigate class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path d="M19.9 6.58c0-.009 0-.019-.006-.027l-2-4A1 1 0 0 0 17 2h-4a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v9a1 1 0 0 0 1 1h.3c-.03.165-.047.332-.051.5a3.25 3.25 0 1 0 6.5 0A3.173 3.173 0 0 0 7.7 12h4.6c-.03.165-.047.332-.051.5a3.25 3.25 0 1 0 6.5 0 3.177 3.177 0 0 0-.049-.5h.3a1 1 0 0 0 1-1V7a.99.99 0 0 0-.1-.42ZM16.382 4l1 2H13V4h3.382ZM4.5 13.75a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5Zm11 0a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5Z"/>
                </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Pedidos</span>
            </a>
         </li>
         <?php endif; ?>

         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MENU-GERENCIAR-USER', $permissao)): ?>
         <li>
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700" aria-controls="dropdown-gerenciar" data-collapse-toggle="dropdown-gerenciar">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                    <path d="M7.324 9.917A2.479 2.479 0 0 1 7.99 7.7l.71-.71a2.484 2.484 0 0 1 2.222-.688 4.538 4.538 0 1 0-3.6 3.615h.002ZM7.99 18.3a2.5 2.5 0 0 1-.6-2.564A2.5 2.5 0 0 1 6 13.5v-1c.005-.544.19-1.072.526-1.5H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h7.687l-.697-.7ZM19.5 12h-1.12a4.441 4.441 0 0 0-.579-1.387l.8-.795a.5.5 0 0 0 0-.707l-.707-.707a.5.5 0 0 0-.707 0l-.795.8A4.443 4.443 0 0 0 15 8.62V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.12c-.492.113-.96.309-1.387.579l-.795-.795a.5.5 0 0 0-.707 0l-.707.707a.5.5 0 0 0 0 .707l.8.8c-.272.424-.47.891-.584 1.382H8.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1.12c.113.492.309.96.579 1.387l-.795.795a.5.5 0 0 0 0 .707l.707.707a.5.5 0 0 0 .707 0l.8-.8c.424.272.892.47 1.382.584v1.12a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1.12c.492-.113.96-.309 1.387-.579l.795.8a.5.5 0 0 0 .707 0l.707-.707a.5.5 0 0 0 0-.707l-.8-.795c.273-.427.47-.898.584-1.392h1.12a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5ZM14 15.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z"/>
                  </svg>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Gerenciar usuários</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="dropdown-gerenciar" class="hidden py-2 space-y-2">
                  
                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('SUBMENU-TOP-CLIENTE', $permissao)): ?>
                  <li>
                    <a href="<?php echo e(route('top_cliente')); ?>"  wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Top Clientes</a>
                 </li>
                 <?php endif; ?>
                 
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('SUBMENU-LIBERAR-MARCA', $permissao)): ?>
                  <li>
                     <a href="<?php echo e(route('liberar_marca')); ?>" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Liberar marca</a>
                  </li>
                  <?php endif; ?>

                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('SUBMENU-BLOQUEAR-PRODUTO', $permissao)): ?>
                  <li>
                     <a href="<?php echo e(route('bloquear_referencia')); ?>"  wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Bloquear produto</a>
                  </li>
                  <?php endif; ?>
                 
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('SUBMENU-LIBERAR-CLIENTE', $permissao)): ?>
                  <li>
                     <a href="<?php echo e(route('liberar_cliente')); ?>" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Liberar cliente</a>
                  </li>
                  <?php endif; ?>
                  
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('SUBMENU-LIBERAR-SISTEMA', $permissao)): ?>
                 <li>
                    <a href="<?php echo e(route('permissao_sistema')); ?>" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Permissão sistema</a>
                 </li>
                 <?php endif; ?>

                 <hr class="border-gray-500 dark:border-gray-500">

                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('SUBMENU-REGISTRAR-USER', $permissao)): ?>
                 <li>
                    <a href="<?php echo e(route('registrar_user')); ?>" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Registrar usuário</a>
                 </li>
                 <?php endif; ?>

                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('LIST-USER', $permissao)): ?>
                 <li>
                    <a href="<?php echo e(route('list_user')); ?>" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">Lista de usuário</a>
                 </li>
                 <?php endif; ?>

                 <hr class="border-gray-500 dark:border-gray-500">

                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('LOG-USER', $permissao)): ?>
                 <li>
                    <a href="<?php echo e(route('logs_user')); ?>" wire:navigate class="flex items-center w-full p-2 text-yellow-600 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-yellow-400 dark:hover:bg-yellow-700">Logs usuário</a>
                 </li>
                 <?php endif; ?>
                 
                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('SUBMENU-PERMISSAO-SISTEMA', $permissao)): ?>
                 <li>
                    <a href="<?php echo e(route('permissao_sistema')); ?>" wire:navigate class="flex items-center w-full p-2 text-red-600 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-red-400 dark:hover:bg-red-700">Permissão sistema</a>
                 </li>
                 <?php endif; ?>

                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('PAGAMENTO', $permissao)): ?>
                 <li>
                    <a href="<?php echo e(route('pagamentos')); ?>" wire:navigate class="flex items-center w-full p-2 text-yellow-600 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-cyan-400 dark:hover:bg-yellow-700">Pagamentos</a>
                 </li>
                 <?php endif; ?>
            </ul>
         </li>
         <?php endif; ?>

         

         
         <li>
            <a href="<?php echo e(route('profile.show')); ?>" wire:navigate class="flex items-center p-2 text-gray-900 rounded-lg dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Gerenciar conta</span>
            </a>
         </li>

         <li>
  
            <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
               <?php echo csrf_field(); ?>

               <a href="<?php echo e(route('logout')); ?>" @click.prevent="$root.submit();" class="flex items-center p-2 text-red-500 rounded-lg dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-700 group">
                  <svg class="flex-shrink-0 w-5 h-5 text-red-500 transition duration-75 dark:text-red-400 group-hover:text-red-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                  </svg>              
                  <span class="flex-1 ms-3 whitespace-nowrap">Desconectar conta</span>
               </a>
           </form>
         </li>

      </ul>
   </div>

   <div class="mt-60">
      <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['id' => 'theme-toggle2','type' => 'button','class' => 'cursor-pointer flex']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'theme-toggle2','type' => 'button','class' => 'cursor-pointer flex']); ?>
         <svg id="theme-toggle-dark-icon2" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
         <svg id="theme-toggle-light-icon2" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
         <h1 id="theme-toggle-light-text2" class="hidden ml-2">Tema Light</h1>
         <h1 id="theme-toggle-dark-text2" class="hidden ml-2">Tema Dark</h1>
      <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
   </div>

</div><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/sidebar-menu.blade.php ENDPATH**/ ?>