<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['class']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['class']); ?>
<?php foreach (array_filter((['class']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal3b8dbf524f4d4104d461fe702c259dff = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b8dbf524f4d4104d461fe702c259dff = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui::components.icons.outline.adjustments','data' => ['class' => $class]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('wireui::icons.outline.adjustments'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($class)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b8dbf524f4d4104d461fe702c259dff)): ?>
<?php $attributes = $__attributesOriginal3b8dbf524f4d4104d461fe702c259dff; ?>
<?php unset($__attributesOriginal3b8dbf524f4d4104d461fe702c259dff); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b8dbf524f4d4104d461fe702c259dff)): ?>
<?php $component = $__componentOriginal3b8dbf524f4d4104d461fe702c259dff; ?>
<?php unset($__componentOriginal3b8dbf524f4d4104d461fe702c259dff); ?>
<?php endif; ?><?php /**PATH /home/u637911780/domains/printview.shop/storage/framework/views/d0375caf32363e8736da5ce39f285d1c.blade.php ENDPATH**/ ?>