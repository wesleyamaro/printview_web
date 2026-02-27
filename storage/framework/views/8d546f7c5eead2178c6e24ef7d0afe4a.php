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
<?php if (isset($component)) { $__componentOriginalc130838b7415ee12155d0add1c49fe9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc130838b7415ee12155d0add1c49fe9a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'wireui::components.icons.outline.chevron-right','data' => ['class' => $class]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('wireui::icons.outline.chevron-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($class)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc130838b7415ee12155d0add1c49fe9a)): ?>
<?php $attributes = $__attributesOriginalc130838b7415ee12155d0add1c49fe9a; ?>
<?php unset($__attributesOriginalc130838b7415ee12155d0add1c49fe9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc130838b7415ee12155d0add1c49fe9a)): ?>
<?php $component = $__componentOriginalc130838b7415ee12155d0add1c49fe9a; ?>
<?php unset($__componentOriginalc130838b7415ee12155d0add1c49fe9a); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\PrintView2\storage\framework\views/118658cd2a72cc58be02dc93ae12fb18.blade.php ENDPATH**/ ?>