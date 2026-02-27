<div class="flex gap-x-3 justify-between md:w-full">   
    <div class="hidden md:flex w-full md:w-48">
        <x-input-wire wire:model.live="search" icon="search" label="Pedido" placeholder="Nº pedido..."/>
    </div>
    <div class="md:hidden w-full md:w-48">
        <x-input-wire wire:model.live="search" icon="search"  placeholder="Pesquisar pedido..."/>
    </div>


    
    @can('ALLPEDIDO', $permissao)
    <div class="hidden md:flex w-full md:w-4/12">
        <div class="md:w-96">
                <x-select autocomplete="off" z-index="z-50" label="Pesquise por cliente" placeholder="Selecione um usuário"
                    wire:model.live="selectedUser" empty-message="Cliente não encontrado">
                    @foreach ($userList as $user)
                        <x-select.user-option 
                        wire:key="{{ $user->id }}"
                        src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                        
                        label="{{ $user->name }}" 
                        value="{{ $user->id }}" 
                        description="{{ $user->email }}"/>                       
                    @endforeach
                </x-select>
            </div>
    </div>
    @endcan

    @can('ALLPEDIDO', $permissao)
        <div class="hidden md:flex gap-x-2 space-y-2 md:space-y-0 w-auto">

            <div class="flex gap-x-3  md:w-9/12">
                <x-datetime-picker
                    id="display-format1"
                    label="Período inicial"
                    placeholder="Data Inicial"
                    display-format="DD/MM/YYYY"
                    wire:model.live="data_inicial"
                    class="w-60"
                />
                <x-datetime-picker
                    id="display-format2"
                    label="Período final"
                    placeholder="Data Final"
                    display-format="DD/MM/YYYY"
                    wire:model.live="data_final"
                    class="w-60"
                />

            </div>

        </div>
    @endcan


    <div class="hidden md:flex w-full md:w-60">
        @can('ALLPEDIDO', $permissao)
            <x-select label="Status pedido" wire:model.live="selectedStatus" placeholder="Selecione o status" :options="['Aberto', 'cadastrado' ,'Cancelado', 'parcialmente entregue',  'Entregue']"/>           
        @elsecan('MENU-PEDIDO', $permissao)
            <x-select label="Status pedido" wire:model.live="selectedStatus" placeholder="Selecione o status" :options="['Aberto', 'Cancelado',  'Entregue']"/> 
        @endcan

    </div>

    <div class="md:hidden w-full md:w-40">
         @can('ALLPEDIDO', $permissao)
        <x-select wire:model.live="selectedStatus" placeholder="Selecione o status" :options="['Aberto', 'cadastrado' , 'Cancelado', 'parcialmente entregue', 'Entregue']"/>
        @elsecan('MENU-PEDIDO', $permissao)
        <x-select wire:model.live="selectedStatus" placeholder="Selecione o status" :options="['Aberto',  'Cancelado',  'Entregue']"/>
        @endcan
    </div>

</div>

