  <!--Div info inicio -->
  <div class="col-span-full">
    <h1 class="text-orange-600 dark:text-orange-400">Lista de correias</h1>

    <div class="flex flex-col space-y-1 mb-3">

       

      <div class="md:flex items-center gap-x-2 flex-column max-h-55v overflow-y-auto overflow-x-auto  flex-wrap md:flex-row space-y-4 md:space-y-0  p-2 bg-white dark:bg-slate-900 rounded-lg">


        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4 hidden md:table-cell">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Referência
                    </th>
                    
                    {{-- @can('EDIT-PEDIDO', $permissao)
                    <th scope="col" class="px-6 py-3">
                        Cor correia
                    </th>
                    @endcan --}}
                    <th scope="col" class="px-3 py-3 text-center">
                        Cor correia
                    </th>

                    <th scope="col" class="px-3 py-3">
                      Quantidade
                  </th>
                                        
                </tr>
            </thead>
            <tbody>
                @forelse ($itenspedidoList as $item)                 
                
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="w-4 p-2 hidden md:table-cell">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>



                        <td class="px-3 py-2">
                            <div class="flex items-center justify-center font-semibold text-blue-600 dark:text-blue-400">
                                {{ $item->produto->referencia }}
                            </div>
                        </td>
                        


                      <td>
                        
                      {{-- <div class="w-full">
                        <select wire:model.live="correiacor.{{ $item->produto->id }}" wire:key="{{ $item->produto->id }}"  class=" block w-full p-1 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-blue-300 dark:focus:ring-slate-500 dark:focus:border-slate-500">
                        <option  selected>{{ $item->correiacor }}</option>
                        <option value="{{ $item->produto->id }}-Amarelo">Amarelo</option>
                        <option value="{{ $item->produto->id }}-Azul">Azul</option>
                        <option value="{{ $item->produto->id }}-Branco">Branco</option>
                        <option value="{{ $item->produto->id }}-Dourado">Dourado</option>
                        <option value="{{ $item->produto->id }}-Preto">Preto</option>
                        <option value="{{ $item->produto->id }}-Prata">Prata</option>
                        <option value="{{ $item->produto->id }}-Pink">Pink</option>
                        <option value="{{ $item->produto->id }}-Rosa">Rosa</option>
                        <option value="{{ $item->produto->id }}-Rosa">Roxa</option>
                        <option value="{{ $item->produto->id }}-Transparente">Transparente</option>
                        <option value="{{ $item->produto->id }}-Vermelho">Vermelho</option>
                        <option value="{{ $item->produto->id }}-Verde">Verde</option>
                        </select>
                      </div> --}}
                      
                        <div class="flex items-center justify-center">
                            {{ $item->correiacor }}
                         </div>

                      </td>
    

                        <td class="px-3 py-2">
                            <div class="flex items-center justify-center">
                                {{-- {{ $item->sum('quantidade') }} --}}
                                {{ $item->quantidade }}
                            </div>
                        </td>

                    </tr>

                @empty
                    <div class="col-span-full">
                        <h1 class="text-red-500">Nenhum item encontrado.</h1>
                    </div>
                @endforelse
                
            </tbody>
        </table>
    </div>


    </div>

</div>
<!--Div info fim -->