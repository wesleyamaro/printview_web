
<div x-data="{ openModal: false, imgModal: '', referenciaModal: '' }" class="grid grid-cols-12 gap-1 w-full border-4 md:border-8 border-slate-900 bg-slate-400  rounded-md p-1">
    
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $itenspedidoList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-span-6 w-auto bg-gray-50  rounded-md border-8 border-slate-700 shadow-md">
        <img
        @click="openModal = true; 
        imgModal = '<?php echo e($item->imagem_cliente ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produtos->imagem}")); ?>'; 
        referenciaModal = '<?php echo e($item->produto->referencia); ?>'";
        class="w-20  max-h-32 rounded-md mx-auto cursor-pointer" src="<?php echo e($item->imagem_cliente ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produtos->imagem}")); ?> " alt="transfer">  
    

        <!--Input quantidade inicio -->
        <div class="p-1 mt-1 bg-slate-700 text-center">
        
        <!--usando alpinejs contador inclement input-->
        <div x-data="{ quantity: <?php if ((object) ('quantities.' . $item->produto->id) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('quantities.' . $item->produto->id->value()); ?>')<?php echo e('quantities.' . $item->produto->id->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('quantities.' . $item->produto->id); ?>')<?php endif; ?> }" class="flex justify-center  md:gap-x-1">
            

            <button @click="quantity = Math.max(0, quantity - 1)" id="subqnde" type="button" class="px-2 py-1 text-sm font-medium text-center inline-flex items-center text-white bg-gray-400 rounded-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/>
                </svg>
            </button>

            <div class="w-16 text-center">
                <input
                    x-model="quantity"
                    @input="quantity = quantity.replace(/[^0-9]/g, '')"
                    class="block w-16 p-1 md:p-2 text-center text-blue-300 border border-slate-600 rounded-lg bg-slate-700 sm:text-xs focus:ring-gray-500 focus:border-gray-500 dark:bg-slate-700 dark:border-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-slate-500 dark:focus:border-slate-500"
                    placeholder="000"
                    required>
            </div>
            
            <button @click="quantity = quantity + 1" id="addqnde" type="button" class="px-2 py-1 text-sm font-medium text-center inline-flex items-center text-white bg-gray-400 rounded-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                  </svg>
            </button>                        
        </div>

        <a href="#" title="Remover item do pedido" wire:click="delItem(<?php echo e($item->id); ?>)" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remover</a>
       
        </div>

        
        
        <!--Input quantidade fim -->
    
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->


    <!-- Alpine.js Modal -->
    <div x-show="openModal" @click.away="openModal = false" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-slate-600 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div @click.away="openModal = false" x-show="openModal" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full p-2">
            <div class="m-auto">
                <img :src="imgModal" alt="Imagem do modal" class="mx-auto w-full max-h-80 md:max-h-96 md:w-80 rounded-lg" oncontextmenu="return false;">
            </div>
            <div class="text-center bg-gray-300 p-2 rounded-sm">
                <h1 x-text="referenciaModal" class="font-semibold">0000</h1>
            </div>
        </div>
    </div>
    <!--Alpine.js Modal - Fim -->
    
</div><?php /**PATH C:\laragon\www\PrintView2\resources\views/components/pedidos/sm/editor/itensPedidoSM.blade.php ENDPATH**/ ?>