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
<?php if (isset($component)) { $__componentOriginale8a6fc52473f6833c6369e281bec4c4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale8a6fc52473f6833c6369e281bec4c4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui::components.icons.outline.chevron-left','data' => ['class' => $class]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('wireui::icons.outline.chevron-left'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($class)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale8a6fc52473f6833c6369e281bec4c4b)): ?>
<?php $attributes = $__attributesOriginale8a6fc52473f6833c6369e281bec4c4b; ?>
<?php unset($__attributesOriginale8a6fc52473f6833c6369e281bec4c4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale8a6fc52473f6833c6369e281bec4c4b)): ?>
<?php $component = $__componentOriginale8a6fc52473f6833c6369e281bec4c4b; ?>
<?php unset($__componentOriginale8a6fc52473f6833c6369e281bec4c4b); ?>
<?php endif; ?><?php /**PATH /home/u637911780/domains/printview.shop/storage/framework/views/f09b898c5c5af3a389ad74a307428ca2.blade.php ENDPATH**/ ?>