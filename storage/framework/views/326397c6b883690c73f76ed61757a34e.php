<div class="mb-2 p-2 rounded-md bg-gray-200 dark:bg-slate-900">

    <!-- Camada 1 - inicio-->
    <div class="flex justify-between">
        <div class="flex justify-between gap-x-2">
            <div class="">                              
                <span class="text-sm md:text-base font-bold text-gray-600 dark:text-gray-400">
                    Itens: <?php echo e($produtos_cart->count()); ?>

                </span>
            </div>
        </div>

        

        <div>
            <?php if (isset($component)) { $__componentOriginal53cf851b4d6af185b0b5e0467ca69b92 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal53cf851b4d6af185b0b5e0467ca69b92 = $attributes; } ?>
<?php $component = WireUi\View\Components\Button::resolve(['icon' => 'trash','label' => 'Limpar carrinho','spinner' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'questiondeleteAllCart','wire:loading.attr' => 'disabled','negative' => true,'xs' => true]); ?>
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

    </div>
    <!-- Camada 1 - fim-->

    <!-- Camada 2 - inicio-->
    <div x-data="{ isOpen: false, valorAplicar: '' }" class="mt-3">
        <button @click="isOpen = !isOpen"  type="button" class="w-full px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
            Atualizar quantidade de todos
        </button>
        <div x-show="isOpen" class="popover" id="popover" @click.away="isOpen = false">    
            <div class="mb-3 mt-5">
                <?php if (isset($component)) { $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e = $attributes; } ?>
<?php $component = WireUi\View\Components\Input::resolve(['label' => 'Qnde a ser aplicado a todos os itens do carrinho'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-wire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(WireUi\View\Components\Input::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'valoritens','wire:model' => 'valoritens','oninput' => 'this.value = this.value.replace(/[^0-9]/g, \'\')','placeholder' => '0000','class' => 'text-center']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e)): ?>
<?php $attributes = $__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e; ?>
<?php unset($__attributesOriginalf2cba1c7f87bbadef8ee9a6866b4816e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e)): ?>
<?php $component = $__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e; ?>
<?php unset($__componentOriginalf2cba1c7f87bbadef8ee9a6866b4816e); ?>
<?php endif; ?>
            </div>            
            <div class="flex justify-between gap-x-4">
                <button onclick="aplicarQuantidade()" wire:click="updateItemCart"  class="bg-blue-500 text-white px-4 py-2 rounded" type="button">Aplicar quantidade</button>
                <button @click="isOpen = false" class="bg-yellow-500 text-white px-4 py-2 rounded" type="button">Fechar</button>   
            </div>         
        </div>
    </div>
    <!-- Camada 2 - fim-->

</div>

<!--[if BLOCK]><![endif]--><?php if(session()->has('error')): ?>
    <div class="alert bg-red-600 text-white mb-2">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

<div  class="px-1 md:px-0 bg-gray-50 dark:bg-gray-800 md:p-2 rounded-lg ">
  
    
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $produtos_cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div x-data="{ isOpen: false }" class="flex items-center justify-between py-2 gap-x-3 text-center border-dashed border-b-2 border-gray-300 dark:border-gray-600">
        <div class="w-3/12 text-center">
            <img @click="openModal = true; 
            imgModal = '<?php echo e(!empty($item->imagem_cliente) ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produto->imagem}")); ?>'; 
            referenciaModal = '<?php echo e($item->produto->referencia); ?>'";
            class="cursor-pointer w-10 rounded-lg m-auto" 
            src="<?php echo e(!empty($item->imagem_cliente) ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produto->imagem}")); ?>"          
            class="cursor-pointer w-10 rounded-lg m-auto" src="<?php echo e(!empty($item->imagem_cliente) ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}") : url("storage/{$item->produto->imagem}")); ?>" alt="imagem"/>
            <h1 class="truncate text-gray-600 dark:text-gray-100 text-xs md:text-sm text-center w-full uppercase"><?php echo e($item->produto->referencia); ?></h1>
        </div>


 
        



            

           
        


        

        <div class="block md:w-6/12 sm:w-full text-center items-center">
            
            <form class="max-w-xs mx-auto">
                <div class="relative flex items-center max-w-[8rem]">
                    <button wire:click="addsubqnde(<?php echo e($item->produto->id); ?>)" type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-1.5 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                        </svg>
                    </button>

                    <input name="quantidade" id="quantidade<?php echo e($item->produto->id); ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '')"  type="text" wire:model.live="quantidade.<?php echo e($item->produto->id); ?>" wire:keydown="atualizarQuantidade(<?php echo e($item->produto->id); ?>)" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 w-14 h-8 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block py-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-blue-300 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="000" required>
                    
                    <button wire:click="addsumqnde(<?php echo e($item->produto->id); ?>)" type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-1.5 h-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                </div>
                
            </form>

        </div>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('CORREIA-PEDIDO', $permissao)): ?>
        <div class="w-64 md:w-full">
    
             
             <input wire:model.live="correiacor.<?php echo e($item->produto->id); ?>" wire:key="<?php echo e($item->produto->id); ?>"  type="text" id="small-input" placeholder="Qual cor correia?"  oninput="this.value = this.value.replace(/[0-9]/g, '')" class="capitalize text-xs block w-full p-1.5 text-blue-600 dark:text-blue-400 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-gray-500 dark:focus:border-gray-500">
             
         </div>
         <?php endif; ?>
        

        

        <div class="w-3/12 text-center flex items-end justify-center">
            <a class="text-red-500 cursor-pointer" wire:click="showConfirmeRemoveItem(<?php echo e($item->produto->id); ?>,<?php echo e($item->id); ?>)">
                <svg class="w-4 h-4 text-red-500 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                </svg>
            </a>
        </div>


    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
 




<script>
    function aplicarQuantidade() {
        // Obtenha o valor digitado no input com id="valoritens"
        var valorItens = document.getElementById('valoritens').value;

        // Itera sobre os inputs com name="quantidade" e atualiza seus valores
        var inputsQuantidade = document.querySelectorAll('[name="quantidade"]');
        inputsQuantidade.forEach(function(input) {
            input.value = valorItens;
        });

        // Fecha o popover
        fecharPopover();

    }
    function fecharModal() {
        // Emite um evento personalizado para fechar o modal
        document.dispatchEvent(new CustomEvent('fechar-modal'));
    }

    function fecharPopover() {
        
        document.dispatchEvent(new CustomEvent('fechar-modal'));
         // Acessa a variável isOpen associada ao componente Alpine.js
         var componente = document.querySelector('[x-data="{ isOpen: false }"]');
        
        // Modifica o valor da propriedade isOpen para false
        if (componente) {
            componente.__x.$data.isOpen = false;
        }
    }
</script>






<!-- Alpine.js Modal -->
 <div x-show="openModal" @click.away="openModal = false" class="z-50 fixed inset-0 overflow-y-auto" style="display: none;">     
    <div class="flex items-start justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-slate-600 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div @click.away="openModal = false" x-show="openModal" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full p-2" style="width: 100%;">
            <div class="m-auto max-h-50v w-10/12">
                <img :src="imgModal" alt="Imagem do modal" class="mx-auto w-full max-h-80 md:max-h-96 md:w-80 md:h-700p rounded-lg" oncontextmenu="return false;">
            </div>
            <div class="text-center bg-gray-300 p-2 rounded-sm">
                <h1 x-text="referenciaModal" class="font-semibold">0000</h1>
            </div>
        </div>
    </div>
</div>

</div><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/components/cart/cart-itens.blade.php ENDPATH**/ ?>