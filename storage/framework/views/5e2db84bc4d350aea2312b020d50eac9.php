<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['class','xShow']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['class','xShow']); ?>
<?php foreach (array_filter((['class','xShow']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginalac573f4cb23328b0c4e7f00ccfc48fd9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac573f4cb23328b0c4e7f00ccfc48fd9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui::components.icons.outline.eye-off','data' => ['class' => $class,'xShow' => $xShow]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('wireui::icons.outline.eye-off'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($class),'x-show' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($xShow)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac573f4cb23328b0c4e7f00ccfc48fd9)): ?>
<?php $attributes = $__attributesOriginalac573f4cb23328b0c4e7f00ccfc48fd9; ?>
<?php unset($__attributesOriginalac573f4cb23328b0c4e7f00ccfc48fd9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac573f4cb23328b0c4e7f00ccfc48fd9)): ?>
<?php $component = $__componentOriginalac573f4cb23328b0c4e7f00ccfc48fd9; ?>
<?php unset($__componentOriginalac573f4cb23328b0c4e7f00ccfc48fd9); ?>
<?php endif; ?><?php /**PATH /home/u637911780/domains/printview.shop/storage/framework/views/cf2616fa93f0000f33112b4985830253.blade.php ENDPATH**/ ?>