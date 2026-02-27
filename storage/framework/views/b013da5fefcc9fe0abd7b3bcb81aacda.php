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
<?php if (isset($component)) { $__componentOriginal6e93a02b2887a5389f471ecee79535ef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6e93a02b2887a5389f471ecee79535ef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui::components.icons.outline.selector','data' => ['class' => $class]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('wireui::icons.outline.selector'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($class)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6e93a02b2887a5389f471ecee79535ef)): ?>
<?php $attributes = $__attributesOriginal6e93a02b2887a5389f471ecee79535ef; ?>
<?php unset($__attributesOriginal6e93a02b2887a5389f471ecee79535ef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6e93a02b2887a5389f471ecee79535ef)): ?>
<?php $component = $__componentOriginal6e93a02b2887a5389f471ecee79535ef; ?>
<?php unset($__componentOriginal6e93a02b2887a5389f471ecee79535ef); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\PrintView2\storage\framework\views/747c0d7ead314a5aec6724ea5fd74b81.blade.php ENDPATH**/ ?>