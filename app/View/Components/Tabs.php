<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tabs extends Component
{
 
   /*  public string $uuid;

    public function __construct(public ?string $selected = null, public string $tabContainer = '') 
    {
        $this->uuid = md5(serialize($this));
        $this->tabContainer = $this->uuid;
    }

    public function selectedTab(): ?string
    {
        if ($this->selected) {
            return "'".$this->selected."'";
        }

        if ($value = $this->attributes->whereStartsWith('wire:model')->first()) {
            return '';
        }
    }


    public function render(): View|Closure|string
    {
        return <<<'HTML'
                    <div 
                        class="flex overflow-x-hidden" 
                        x-data="{ 
                            selected:
                                @if($selected) 
                                    '{{ $selected }}'
                                @else  
                                    @entangle($attributes->wire('model')).live 
                                @endif 
                        }"
                    >
                        {{ $slot }}
                    </div>
                    <!-- <hr class=" border dark:border-gray-600"/> -->
                    <div id="{{ $tabContainer }}">
                            <!-- tab contents will be teleported in here -->                             
                    </div>                    
             HTML;
    } */


    public string $uuid;

    public function __construct(
        public ?string $selected = null
    ) {
        $this->uuid = "mary" . md5(serialize($this));
    }

    public function render(): View|Closure|string
    {
        return <<<'HTML'
                    <div
                        x-data="{
                                tabs: [],
                                selected:
                                    @if($selected)
                                        '{{ $selected }}'
                                    @else
                                        @entangle($attributes->wire('model'))
                                    @endif
                                 ,
                                 init() {
                                     // Fix weird issue when navigating back
                                     document.addEventListener('livewire:navigating', () => {
                                         document.querySelectorAll('.tab').forEach(el =>  el.remove());
                                     });
                                 }
                        }"
                        class="relative "
                    >
                        <!-- TAB LABELS -->
                        <div class="flex overflow-x-auto">
                            <template x-for="tab in tabs">
                                <a
                                    role="tab"
                                    x-html="tab.label"
                                    @click="selected = tab.name"
                                    :class="(selected === tab.name) && 'selectedtab'" 
                                    class="tab   font-semibold   border-b-2 disabletab"></a> <!-- border-b-2 border-b-base-300 -->
                            </template>
                        </div>

                        <!-- TAB CONTENT -->
                        <div role="tablist" {{ $attributes->except(['wire:model', 'wire:model.live'])->class([" block"]) }}> 
                            {{ $slot }}
                        </div>
                    </div>
                HTML;
    }

}
