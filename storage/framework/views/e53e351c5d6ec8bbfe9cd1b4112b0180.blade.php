<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['label'])
<x-button-wire :label="$label" {{ $attributes }}>

{{ $slot ?? "" }}
</x-button-wire>