<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['shadowless','rightIcon'])
<x-input-wire :shadowless="$shadowless" :right-icon="$rightIcon" {{ $attributes }}>

{{ $slot ?? "" }}
</x-input-wire>