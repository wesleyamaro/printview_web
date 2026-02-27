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
<?php if (isset($component)) { $__componentOriginal944a794cf5782b7ae66ca6cad069e07e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal944a794cf5782b7ae66ca6cad069e07e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui::components.icons.outline.x-circle','data' => ['class' => $class]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('wireui::icons.outline.x-circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($class)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal944a794cf5782b7ae66ca6cad069e07e)): ?>
<?php $attributes = $__attributesOriginal944a794cf5782b7ae66ca6cad069e07e; ?>
<?php unset($__attributesOriginal944a794cf5782b7ae66ca6cad069e07e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal944a794cf5782b7ae66ca6cad069e07e)): ?>
<?php $component = $__componentOriginal944a794cf5782b7ae66ca6cad069e07e; ?>
<?php unset($__componentOriginal944a794cf5782b7ae66ca6cad069e07e); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\PrintView2\storage\framework\views/4cd391ea5057d8596f98a5c35fd0f6a4.blade.php ENDPATH**/ ?>