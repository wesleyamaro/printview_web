<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;


use Illuminate\Support\Facades\Blade;

class Tab extends Component
{
   /*  public string $uuid;

    public function __construct(public ?string $name = null, public ?string $label = null, public ?string $icon = null) {
        $this->uuid = Str::uuid();
    }

    public function render(): View|Closure|string
    {
        return <<<'HTML'
                    @aware(['tabContainer' =>  '', 'selected' => ''])
                    <a
                        @click="
                            @if($selected)
                                selected = '{{ $name }}'
                            @else
                                $wire.selectedTab = '{{ $name }}'
                            @endif
                            "
                        :class="{ 'tab-active': selected === '{{ $name }}' }"
                        {{ $attributes->whereDoesntStartWith('class') }}
                        {{ $attributes->class(['
                            tab tab-lifted
                            px-3
                            text-gray-600
                            dark:text-gray-300 
                            border-b-2
                            border-b-gray-400
                            dark:border-t-gray-700
                            dark:border-x-gray-700
                            dark:border-b-gray-700
                            rounded-t-lg
         
                            font-semibold'
                            ]) }}>

                        @if($icon)
                            <x-icon :name="$icon" class="mr-2 w-4 hidden md:flex" />
                        @endif

                        {{ $label }}
                    </a>

                    <div wire:key="{{ $name }}-{{ rand() }}">
                        <!-- <template x-teleport="#{{ $tabContainer }}"> -->
                        
                        <template x-teleport="#{{ $tabContainer }}">
                                <div class="py-5" x-show="selected === '{{ $name }}'">
                                    {{ $slot }}
                                </div>
                                @endteleport
                        </template>
                    </div>
                HTML;
    } */


    public string $uuid;

    public function __construct(
        public ?string $name = null,
        public ?string $label = null,
        public ?string $icon = null
    ) {
        $this->uuid = "mary" . md5(serialize($this));
        /* $this->uuid =  md5(serialize($this)); */
    }

    public function tabLabel(): string
    {
        return $this->icon
            ? Blade::render("<x-icon-wire name='" . $this->icon . "' class='mr-2  whitespace-nowrap' label='" . $this->label . "' />")
            : $this->label;
    }

    public function render(): View|Closure|string
    {
        return <<<'HTML'
                    <a
                        class="hidden"
                        :class="{ 'tab-active': selected === '{{ $name }}' }"
                        x-init="tabs.push({ name: '{{ $name }}', label: {{ json_encode($tabLabel()) }} })"
                    ></a>

                    <div x-show="selected === '{{ $name }}'" role="tabpanel" {{ $attributes->class(" py-5 px-1") }}>
                        {{ $slot }}
                    </div>
                HTML;
    }
    
}
