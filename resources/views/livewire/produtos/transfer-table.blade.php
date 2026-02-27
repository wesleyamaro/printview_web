<div>
    @can('TESTE', $permissao)
        @include('livewire.produtos.componentes.produtos_list_002') <!-- Modelo novo - Produtos List 002 -->
    @else
        @include('livewire.produtos.componentes.produtos_list_001') <!-- Modelo antigo - Produtos List 001 -->
    @endcan
</div>
