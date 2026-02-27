  <!--Div info inicio -->
  <div class="col-span-full">
      <h1 class="text-orange-600 dark:text-orange-400">Lista de correias</h1>

      <div class="flex flex-col space-y-1 mb-3">

          <div
              class="md:flex items-center gap-x-2 flex-column flex-wrap md:flex-row space-y-4 md:space-y-0  p-2 bg-white dark:bg-slate-900 rounded-lg">


              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead
                      class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="p-4 hidden md:table-cell">
                              <div class="flex items-center">
                                  <input id="checkbox-all-search" type="checkbox"
                                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                  <label for="checkbox-all-search" class="sr-only">checkbox</label>
                              </div>
                          </th>
                          <th scope="col" class="px-3 py-3">
                              Referência
                          </th>
                          <th scope="col" class="px-3 py-3 ">
                            {{ isset($itenspedidoList[0]->medida) && $itenspedidoList[0]->medida ? 'Medidas' : 'Cor Correia' }}  
                          </th>
                          <th scope="col" class="px-3 py-3 text-center">
                              Quantidade
                          </th>

                      </tr>
                  </thead>
                  <tbody class="divide-y dark:divide-gray-700 min-h-55v overflow-y-auto overflow-x-auto soft-scrollbar">
                      @forelse ($itenspedidoList as $item)
                          <tr
                              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                              <td class="w-4 p-2 hidden md:table-cell">
                                  <div class="flex items-center">
                                      <input id="checkbox-table-search-1" type="checkbox"
                                          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                      <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                  </div>
                              </td>



                              <td class="px-3 py-2">
                                  <div class=" font-semibold text-blue-600 dark:text-blue-400">
                                      {{ $item->produto->referencia }}
                                  </div>
                              </td>



                              <td class="px-3 py-2">
                                  
                                  <div class="w-64 md:w-full">
                                      <input wire:model="correiacor.{{ $item->produto->id }}"
                                          wire:key="{{ $item->produto->id }}" type="text" id="small-input"
                                          placeholder="Qual cor correia?"
                                          {{-- oninput="this.value = this.value.replace(/[0-9]/g, '')" --}}
                                          class="capitalize text-xs block w-full p-1.5 text-blue-600 dark:text-blue-400 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                  </div>
                                  
                                  {{--
                                  <div class="w-64 md:w-full {{ isset($itenspedidoList[0]->medida) && $itenspedidoList[0]->medida ? 'hidden' : '' }}">
                                      <input wire:model="correiacor.{{ $item->produto->id }}"
                                          wire:key="{{ $item->produto->id }}" type="text" id="small-input"
                                          placeholder="Qual cor correia?"
                                          oninput="this.value = this.value.replace(/[0-9]/g, '')"
                                          class="capitalize text-xs block w-full p-1.5 text-blue-600 dark:text-blue-400 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                  </div>

                                  <div class="w-64 md:w-full {{ isset($itenspedidoList[0]->medida) && $itenspedidoList[0]->medida ? '' : 'hidden' }}">
                                    <input wire:model="medida.{{ $item->produto->id }}"
                                        wire:key="{{ $item->produto->id }}" type="text" id="small-input"
                                        placeholder="Qual a medida?"
                                        oninput="this.value = this.value.replace(/[0-9]/g, '')"
                                        class="capitalize text-xs block w-full p-1.5 text-blue-600 dark:text-blue-400 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                </div> --}}
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
