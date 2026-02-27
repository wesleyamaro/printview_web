<div>


    <div class="flex items-center justify-between bg-green-700  rounded-lg mb-3">
        <!--[if BLOCK]><![endif]--><?php if(session()->has('error')): ?>
            <div class="flex items-center w-full  h-10 alert bg-red-600 text-white">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

     <?php $__env->slot('header', null, []); ?> 
        <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
            <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2"/>
            </svg>
            <?php echo e(__('Cadastrar transfer')); ?>

        </h2>
     <?php $__env->endSlot(); ?>



        <div class="w-full md:w-10/12  mx-auto sm:px-2 lg:p-3 bg-white dark:bg-slate-800 rounded-lg">


            
            <div x-data="{ tab: 'first' }">
                <!--TAB - INICIO-->
                <div class="flex">
                    <button :class="{ 'active': tab === 'first', 'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600'
                    : tab === 'first', 'border-b-2 border-gray-300 dark:border-slate-600'
                    : tab !== 'first' }" @click="tab = 'first'" 
                    class="text-gray-600 dark:text-gray-400 py-1 px-3 rounded-t-lg">
                        Cadastrar
                    </button>
        
                    <button :class="{ 'active': tab === 'second', 'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600'
                    : tab === 'second', 'border-b-2 border-gray-300 dark:border-slate-600'
                    : tab !== 'second' }" @click="tab = 'second'" 
                    class="text-gray-600 dark:text-gray-400 py-1 px-3 rounded-t-md">
                        Transfers
                    </button>
            
                    <button :class="{ 'active': tab === 'terceiro', 'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600'
                    : tab === 'terceiro', 'border-b-2 border-gray-300 dark:border-slate-600'
                    : tab !== 'terceiro' }" @click="tab = 'terceiro'" 
                    class="text-gray-600 dark:text-gray-400 py-1 px-3 rounded-t-md">
                        Filtros
                    </button>
                    
                    <button :class="{ 'active': tab === 'quarto', 'text-orange-600 dark:text-orange-500 border-t-2 border-x-2 border-b-0 border-gray-300 dark:border-slate-600'
                    : tab === 'quarto', 'border-b-2 border-gray-300 dark:border-slate-600'
                    : tab !== 'quarto' }" @click="tab = 'quarto'" 
                    class="text-gray-600 dark:text-gray-400 py-1 px-3 rounded-t-md">
                        Transfers usados nos pedidos
                    </button>
                </div>
                <!--TAB - FIM-->
                
                <!--TABS - INICIO-->
                <div class="bg-gray-200 dark:bg-slate-800 p-2 rounded-b-lg">
                    <div x-show="tab === 'first'" >
                        <div class="mt-2">
                            <?php echo $__env->make('components.cadastros.cad-transfer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                
                    <div x-show="tab === 'second'">
                        <div class="mt-2">
                            <?php echo $__env->make('components.cadastros.transfers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
        
                    <div x-show="tab === 'terceiro'">
                        <div class="">
                            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('cadastros.filtros', ['lazy' => true]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3897658818-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                        </div>
                    </div>
                    
                    <div x-show="tab === 'quarto'">
                        <div class="">
                            <?php echo $__env->make('components.cadastros.transfers.transfers_used_pedido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
                <!--TABS - FIM-->

            </div>


        </div>
    

</div>
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/livewire/cadastros/create-transfer.blade.php ENDPATH**/ ?>