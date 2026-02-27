<!-- drawer init and show -->

 
 <!-- drawer component -->
 <div id="menu-cart" class="fixed top-0 left-0 z-40 w-11/12 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-navigation-label">
    
    <button type="button" data-drawer-hide="menu-cart" aria-controls="menu-cart" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>
  <div class="py-4 overflow-y-auto">

      <a href="<?php echo e(route('novidades')); ?>" class="flex items-center ps-2.5 mb-5">
         <img src="https://printview.shop/img/logo_printview.png" class="h-6 me-3 sm:h-7" alt="Printview Logo" />
         <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">PrintView</span>         
      </a>


      <hr>

      <div>
         <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('carrinho-compra', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3480290142-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
      </div>


   </div>



</div><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/menu-cart.blade.php ENDPATH**/ ?>