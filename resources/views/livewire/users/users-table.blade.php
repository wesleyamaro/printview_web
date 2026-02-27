<div>
    
    <x-slot name="header">
        <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
            <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m11.479 1.712 2.367 4.8a.532.532 0 0 0 .4.292l5.294.769a.534.534 0 0 1 .3.91l-3.83 3.735a.534.534 0 0 0-.154.473l.9 5.272a.535.535 0 0 1-.775.563l-4.734-2.49a.536.536 0 0 0-.5 0l-4.73 2.487a.534.534 0 0 1-.775-.563l.9-5.272a.534.534 0 0 0-.154-.473L2.158 8.48a.534.534 0 0 1 .3-.911l5.294-.77a.532.532 0 0 0 .4-.292l2.367-4.8a.534.534 0 0 1 .96.004Z"/>
            </svg>
            {{ __('Lista de usuários ativos') }}
        </h2>
    </x-slot>

    <div class="w-full md:w-10/12 px-2 mx-auto mt-2 sm:px-2 lg:p-3 bg-gray-300 dark:bg-slate-800  rounded-lg"> 


        <div class="block md:flex items-center justify-between w-full mb-5">
            <div class="md:w-96">                        
                <x-select autocomplete="off" z-index="z-50" label="Encontre o usuário." placeholder="Selecione um usuário"
                    wire:model.live="selectedUser" empty-message="Cliente não encontrado">
                    @foreach ($users as $user)
                        <x-select.user-option 
                        wire:key="{{ $user->id }}"
                        src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"
                        
                        label="{{ $user->name }}" 
                        value="{{ $user->id }}" 
                        description="{{ $user->email }}"/>                       
                    @endforeach
                </x-select>
            </div>
            <div class="mt-2 md:mt-0">
                <h1 class="text-gray-600 dark:text-gray-400 font-bold text-sm">Usuário(s): <span class="text-cyan-600 dark:text-cyan-400">{{ $totalUsers }}</span></h1>
            </div>

            <div>
                <span class="text-red-600 dark:text-red-400">Usuários em vermelhos estão bloqueados.</span>
            </div>
        </div>
        
        <div class="shadow-md sm:rounded-lg overflow-y-auto hide-scrollbar max-h-70v md:max-h-70v">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead
                    class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            Cliente
                        </th>
                        <th scope="col" class="px-3 py-3 text-center">
                            Permissões
                        </th>
                        {{-- <th scope="col" class="px-2 py-3">
                            Status
                        </th> --}}
                        <th scope="col" class="px-2 py-3">
                            Cadastrado
                        </th>
                        <th scope="col" class="px-6 py-3 text-end">
                            Ação
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userList as $usuario)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-8 h-8 rounded-full" src="{{ $usuario->profile_photo_path ? asset('storage/' . $usuario->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}" alt="Foto"> 
                            <div class="ml-2">                  
                                <h1 class="capitalize truncate text-sm md:text-base {{ $usuario->bloqueio ? 'text-red-600 dark:text-red-400 font-semibold' : 'text-cyan-600 dark:text-cyan-400' }} uppercase">{{ $usuario->name }}</h1>                               
                                <h1 class="text-xs md:text-sm font-normal text-gray-500">{{ $usuario->email }}</h1> 
                            </div>         
                        </th>
                        {{-- <td class="px-2 py-4 text-gray-500">
                            <h1 class="">{{$usuario->regra_user->isEmpty() ? 'Nenhuma regra associada' : 'Regras associadas'}}</h1>
                        </td> --}}
                        <td class="px-3 py-4 text-center">
                            <h1 class="{{ $usuario->regra_user->isEmpty() ? 'text-red-500' : 'text-green-500' }}">
                                {{ $usuario->regra_user->isEmpty() ? 'Sem permissão' : 'Liberado' }}
                            </h1>
                        </td>
                                               
                        {{-- <td class="px-2 py-4 text-gray-500">
                            <h1 class="">{{$usuario->bloqueio ? 'Bloqueado' : 'Nada consta'}}</h1>
                        </td> --}}

                        <td class="px-2 py-4 uppercase text-gray-500">
                            {{ \Carbon\Carbon::parse($usuario->created_at)->format('d/m/Y') }}
                        </td> 
                        <td class="px-2 py-5 flex gap-x-4 justify-end">
                            @can('EDIT-USER', $permissao)
                            <a href="#" wire:click="showModalEditUser({{$usuario->id}})" wire:key="{{$usuario->id}}" class="text-blue-600 dark:text-blue-400">Editar</a>
                            @endcan
                            @can('DELET-USER', $permissao)
                            <a href="#" wire:click="showConfirmDeleteUser({{$usuario->id}})" wire:key="{{$usuario->id}}" class="text-red-600 dark:text-red-400">Deletar</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach


                <x-modal wire:model="myModal">
                    <div class="border-8 border-gray-200 dark:border-slate-900">
                    <div name="title" class="flex text-white p-5 bg-blue-600">
                        <svg class="w-6 h-6 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                          </svg>
                          
                        Editar Usuário
                    </div>
                
                    <div name="content" class="p-5 mt-3">
                        <div class="mb-4">
                            <x-label for="name" value="Nome" />
                            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="name" />
                            <x-input-error for="name" class="mt-2" />
                        </div>
          
                        <div class="mb-4">
                            <x-label for="email" value="Email" />
                            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="email" />
                            <x-input-error for="email" class="mt-2" />
                        </div>


                        <div class="mb-4 flex items-center">                  
                            {{-- <x-checkbox-wire id="bloqueio" label="Bloquear" wire:model="bloqueio" value="bloqueio" /> --}}         
                            <x-toggle-wire id="color-negative" name="toggle" label="Bloquear (usuários bloqueados não conseguiram fazer login no sistema)" style="color: {{ $bloqueio ? 'red' : 'inherit' }};"  xl wire:model="bloqueio"/>
                            <x-input-error for="name" class="mt-2" />
                        </div>
                    </div>
                
                    <div name="footer" class="p-5">                      
                
                        <x-button class="ml-2" wire:click="updateUser" wire:loading.attr="disabled">
                            Salvar
                        </x-button>

                        <x-secondary-button wire:click="$toggle('myModal')" wire:loading.attr="disabled">
                            Cancelar
                        </x-secondary-button>
                    </div>
                    </div>
                </x-modal>
                

            </tbody>
        </table>
    </div>

</div>
