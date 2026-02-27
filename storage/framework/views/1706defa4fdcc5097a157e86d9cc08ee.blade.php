<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>

<x-input-wire  {{ $attributes }}>
<x-slot name="prepend" >{{ $prepend }}</x-slot>
<x-slot name="append" >{{ $append }}</x-slot>
{{ $slot ?? "" }}
</x-input-wire>