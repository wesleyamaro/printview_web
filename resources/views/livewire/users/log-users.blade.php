<div>
    
    <div class="w-full md:w-10/12 m-auto mt-5 p-1 md:p-5 rounded-md dark:bg-slate-800">

        <div class="flex gap-x-2 items-end  p-1 md:p-2 dark:bg-slate-700 rounded-md my-2 w-auto">

            <div>
                <x-input-wire wire:model.live="search" icon="search" placeholder="pesquise o log..." />
            </div>
                
            <div class="w-96">
                <x-select autocomplete="off" z-index="z-50"  placeholder="Selecione um usuário" 
                    wire:model.live="userSelected" empty-message="Cliente não encontrado">
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

            <div class="flex gap-x-3  md:w-4/12">
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

        
        

            <div class="relative overflow-y-auto soft-scrollbar {{-- max-h-65v --}} max-h-[30rem] shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                            Tipo ação
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Descrição
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Usuário
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($logList as $log)

                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            {{-- <th scope="row" class="{{ $log->action_type === 'delete' ? 'text-red-500' : ($log->action_type === 'cancelamento' ? 'text-yellow-300' : ($log->action_type === 'update' ? 'text-cyan-500' : ($log->action_type === 'create' ? 'text-green-400' : '' ))) }}
                              text-xs md:text-sm uppercase px-6 py-4 font-medium">
                              {{$log->action_type}}
                            </th> --}}

                            <th scope="row" class="
                            @switch($log->action_type)
                                @case('delete')
                                    text-red-500
                                    @break
                                @case('cancelado')
                                    text-yellow-300
                                    @break
                                @case('status')
                                    text-pink-500
                                    @break
                                @case('entregue')
                                    text-green-500
                                    @break
                                @case('update')
                                    text-blue-500
                                    @break
                                @case('pedido')
                                    text-lime-600 dark:text-lime-400
                                    @break
                                @case('add item')
                                    text-purple-600 dark:text-purple-400
                                    @break
                                @case('registrou')
                                    text-cyan-400
                                    @break
                                @default
                                    {{-- Caso não corresponda a nenhum dos valores anteriores --}}
                                @endswitch
                            text-xs md:text-sm uppercase px-6 py-4 font-medium">
                            {{ $log->action_type }}
                        </th>


                            <td class="px-6 py-4 text-nowrap text-xs md:text-sm uppercase">
                                {{$log->description}}
                            </td>
                            <td class="px-6 py-4 text-nowrap text-xs md:text-sm">
                                {{$log->created_at->format('d/m/Y H:i'); }}
                            </td>
                            <td class="px-6 py-4 text-nowrap text-xs md:text-sm uppercase">
                                {{$log->users->name}}
                            </td>

                        </tr>

                    @empty
                    <tr class="">
                            <td class="px-6 py-4 text-red-500">
                                Nenhum log encontrado...
                            </td>
                        </tr>
                    @endforelse
                      
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end p-2 dark:bg-slate-800">                   
                {{ $logList->links() }}
            </div>

        </div>

</div>
