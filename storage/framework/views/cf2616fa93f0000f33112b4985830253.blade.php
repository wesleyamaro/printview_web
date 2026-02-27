<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['class','xShow'])
<x-wireui::icons.outline.eye-off :class="$class" :x-show="$xShow" >

{{ $slot ?? "" }}
</x-wireui::icons.outline.eye-off>