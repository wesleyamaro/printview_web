<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['class','xOn:click']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['class','xOn:click']); ?>
<?php foreach (array_filter((['class','xOn:click']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginalaa9fd315619395062b5c629e5880c853 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa9fd315619395062b5c629e5880c853 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui::components.icons.outline.calendar','data' => ['class' => $class,'xOn:click' => $xOnClick]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('wireui::icons.outline.calendar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($class),'x-on:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($xOnClick)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaa9fd315619395062b5c629e5880c853)): ?>
<?php $attributes = $__attributesOriginalaa9fd315619395062b5c629e5880c853; ?>
<?php unset($__attributesOriginalaa9fd315619395062b5c629e5880c853); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa9fd315619395062b5c629e5880c853)): ?>
<?php $component = $__componentOriginalaa9fd315619395062b5c629e5880c853; ?>
<?php unset($__componentOriginalaa9fd315619395062b5c629e5880c853); ?>
<?php endif; ?><?php /**PATH /home/u637911780/domains/printview.shop/storage/framework/views/687585f150a2db7a423dd6c367585297.blade.php ENDPATH**/ ?>