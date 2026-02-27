<?php

namespace App\Livewire\Produtos;

use Livewire\Component;

use App\Models\Produto;
use App\Models\ItemPedido;

use App\Models\Marca;
use App\Models\CarrinhoCompra;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use WireUi\Traits\Actions;
use Carbon\Carbon; // Importe a classe Carbon para manipulação de datas

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class MaisVendidos extends Component
{

    use Actions;
    use WithPagination; 

    public $search = '';

    public $marcaList;
    public $selectedMarca ='';
    
    public $filtro = '';

    public $searchMarca = '';
    public $imagem = '';
    public $referencia;
    public $genero = '';
    public $id_produtoinfo;
    public bool $myModalCart = false;
    public $carrinho = []; // Itens do carrinho temporário
    public bool $myModal = false;
    
    
    public  $quantidadeCart = 0;

    //public $qtpagina = 10; // Defina o número inicial de itens por página
    public $page = 1;
    public $items = [];


    public $perPage = 100;


    public function mount()
    {
        $user = auth()->user();
        $this->marcaList = $user->brands()->get();
    }

    //Adiciona produtos ao carrinho - inicio
    public function addCarrinho($produtoId) {
        $user = auth()->user();
        
        $produto = Produto::find($produtoId);
        
        // Verifica se o produto já está no carrinho do usuário
        $itemCarrinho = CarrinhoCompra::where('user_id', $user->id)
            ->where('produto_id', $produtoId)
            ->first();
    
        if ($itemCarrinho) {
            // Se o produto já estiver no carrinho, aumenta a quantidade em 1
            $itemCarrinho->increment('quantidade');
        } else { 
            // Caso contrário, cria um novo item no carrinho com quantidade 1
            CarrinhoCompra::create([
                'produto_id' => $produtoId,
                'quantidade' => 120,
                'quantidade' => 120,
                'user_id' => $user->id,
            ]);
        } 
    
        if (!in_array($produtoId, $this->carrinho)) {
            $this->carrinho[] = $produtoId;
        }
        $this->myModal = false;
        $this->dispatch('produto-addCart', $produto);
        /* $this->dispatch('showAddCart'); */
        
        /*
        $this->notification()->success(
            $title = 'Sucesso!',
            $description = 'Produto adicionado ao carrinho.'
        );*/
        $this->dispatch('success',  title: 'Produto adicionado ao carrinho.', );
    }
    //ADICIONAR PRODUTO AO CARRINHO -FIM



    public function resetFilters()
    {
        $this->reset('search');
        $this->reset('selectedMarca');    
        $this->reset('searchMarca');
        $this->reset('genero');  
    }
      //Paginate auto
      public function loadMore()
      {
          $this->perPage += 50;
      }
      
      public function buscarEstampa()
      {
          $this->render();
          $this->myModalCart = false;
      }

      public function changeGenero($genero)
      {
          $this->genero = $genero;
          $this->render();
      }
      
      
      
      /*public function render()
    {
        $user = auth()->user();

        // Inicia a query base com as condições de usuário e bloqueio
        $produtosQuery = ItemPedido::query()
            ->whereHas('produto', function ($query) use ($user) {
                $query->whereHas('marca.user_brand', function ($query) use ($user) {
                    $query->where('users.id', $user->id);
                });
            })
            ->whereDoesntHave('produto.blockedUsers', function ($query) use ($user) {
                $query->where('users.id', $user->id);
            });

        // Aplica o filtro de marca se houver uma selecionada
        if ($this->selectedMarca) {
            $produtosQuery->whereHas('produto', function ($query) {
                $query->where('marca_id', $this->selectedMarca);
            });
        }

        // Aplica o filtro de gênero se houver um selecionado
        if (!empty($this->genero)) {
            $produtosQuery->whereHas('produto', function ($query) {
                $query->where('genero', $this->genero);
            });
        }

        // Aplica o filtro de busca (referencia ou filtros) se houver um termo de busca
        if ($this->search) {
            $searchTerm = '%' . $this->search . '%';
            $produtosQuery->whereHas('produto', function ($query) use ($searchTerm) {
                $query->where('referencia', 'like', $searchTerm)
                      ->orWhere('filtros', 'like', $searchTerm);
            });
        }

        // Agrupa, conta, ordena e limita os resultados
        $produtos = $produtosQuery->groupBy('produto_id')
            ->selectRaw('produto_id, COUNT(*) as vezes_pedido')
            ->orderByDesc('vezes_pedido') // Use orderByDesc para clareza
            ->take(50)
            ->get();

        return view('livewire.produtos.mais-vendidos', [
            'produtoList' => $produtos,
            'quantidadeCart' => CarrinhoCompra::where('user_id', $user->id)->count(),
        ]);
    }*/
    
    
    //BUSCA NOS ULTIMOS 3 MESES
    
    public function render()
    {
        $user = auth()->user();

        // Calcula a data de 2 meses atrás
        $tresMesesAtras = Carbon::now()->subMonths(2);

        // Inicia a query base com as condições de usuário, bloqueio e o filtro de data
        $produtosQuery = ItemPedido::query()
            ->whereHas('pedido', function ($query) use ($tresMesesAtras) {
                // Adiciona a condição para buscar pedidos nos últimos 3 meses
                $query->where('created_at', '>=', $tresMesesAtras);
            })
            ->whereHas('produto', function ($query) use ($user) {
                $query->whereHas('marca.user_brand', function ($query) use ($user) {
                    $query->where('users.id', $user->id);
                });
            })
            ->whereDoesntHave('produto.blockedUsers', function ($query) use ($user) {
                $query->where('users.id', $user->id);
            });

        // Aplica o filtro de marca se houver uma selecionada
        if ($this->selectedMarca) {
            $produtosQuery->whereHas('produto', function ($query) {
                $query->where('marca_id', $this->selectedMarca);
            });
        }

        // Aplica o filtro de gênero se houver um selecionado
        if (!empty($this->genero)) {
            $produtosQuery->whereHas('produto', function ($query) {
                $query->where('genero', $this->genero);
            });
        }

        // Aplica o filtro de busca (referencia ou filtros) se houver um termo de busca
        if ($this->search) {
            $searchTerm = '%' . $this->search . '%';
            $produtosQuery->whereHas('produto', function ($query) use ($searchTerm) {
                $query->where('referencia', 'like', $searchTerm)
                      ->orWhere('filtros', 'like', $searchTerm);
            });
        }

        // Agrupa, conta, ordena e limita os resultados
        $produtos = $produtosQuery->groupBy('produto_id')
            ->selectRaw('produto_id, COUNT(*) as vezes_pedido')
            ->orderByDesc('vezes_pedido')
            ->take(50)
            ->get();

        return view('livewire.produtos.mais-vendidos', [
            'produtoList' => $produtos,
            'quantidadeCart' => CarrinhoCompra::where('user_id', $user->id)->count(),
        ]);
    }
    
    
    /*public function render()
    {
         $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'Não autorizado.'], 401);
        }
    
        $doisMesesAtras = Carbon::now()->subMonths(2);
        $selectedMarca = $request->input('marca_id');
        $search = $request->input('search');
    
        $generos = ['infantil', 'feminino', 'masculino'];
        $produtoList = collect();
    
        foreach ($generos as $genero) {
            // Subquery consolidando vendas por referência e gênero
            $consolidatedSales = DB::table('item_pedidos as ip')
                ->select('p.referencia', DB::raw('COUNT(ip.produto_id) as total_de_pedidos'))
                ->join('produtos as p', 'ip.produto_id', '=', 'p.id')
                ->join('pedidos as ped', 'ip.pedido_id', '=', 'ped.id')
                ->join('marcas as m', 'p.marca_id', '=', 'm.id')
                ->join('brand_users as ub', 'm.id', '=', 'ub.brand_id')
                ->where('ub.user_id', $user->id)
                ->where('p.tipo', 'transfer')
                ->where('ped.created_at', '>=', $doisMesesAtras)
                ->where('p.genero', $genero)
                ->whereNotExists(function ($query) use ($user) {
                    $query->select(DB::raw(1))
                        ->from('blocked_transfers')
                        ->whereRaw('blocked_transfers.transfer_id = p.id')
                        ->where('blocked_transfers.user_id', $user->id);
                })
                ->when($selectedMarca, function ($query, $marca) {
                    return $query->where('p.marca_id', $marca);
                })
                ->when($search, function ($query, $s) {
                    return $query->where(function ($q) use ($s) {
                        $q->where('p.referencia', 'like', '%' . $s . '%')
                            ->orWhere('p.filtros', 'like', '%' . $s . '%');
                    });
                })
                ->groupBy('p.referencia')
                ->orderByDesc('total_de_pedidos');
    
            // Rankeamento
            $rankedProductsBuilder = DB::query()
                ->select('referencia', 'total_de_pedidos')
                ->fromSub($consolidatedSales, 'ranked_consolidated_products')
                ->selectRaw('ROW_NUMBER() OVER (ORDER BY total_de_pedidos DESC) as rn');
    
            // Pegar top 50
            $topReferences = DB::table(DB::raw('(' . $rankedProductsBuilder->toSql() . ') as sub'))
                ->mergeBindings($rankedProductsBuilder)
                ->where('rn', '<=', 50)
                ->pluck('referencia');
    
            // Carregar um produto de cada referência
            foreach ($topReferences as $referencia) {
                $produto = Produto::where('referencia', $referencia)
                    ->where('tipo', 'transfer')
                    ->where('genero', $genero)
                    ->when($user->brands()->pluck('brand_id')->isNotEmpty(), function ($query) use ($user) {
                        $query->whereHas('marca.user_brand', function ($q) use ($user) {
                            $q->where('users.id', $user->id);
                        });
                    })
                    ->whereDoesntHave('blockedUsers', function ($query) use ($user) {
                        $query->where('users.id', $user->id);
                    })
                    ->first();
    
                if ($produto) {
                    $produtoList->push([
                        'id' => $produto->id,
                        'referencia' => $produto->referencia,
                        'genero' => $produto->genero,
                        'filtro' => $produto->filtros,
                        'imagem' => $produto->imagem,
                    ]);
                }
            }
        }
        
         return view('livewire.produtos.mais-vendidos', [
            'produtoList' => $produtoList,
            'quantidadeCart' => CarrinhoCompra::where('user_id', $user->id)->count(),
        ]);
    
    
    }*/
    
    /*
    
    public function getProdutosMaisVendidos(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'Não autorizado.'], 401);
        }

        // Calcula a data de 2 meses atrás (mantendo o mesmo período)
        $doisMesesAtras = Carbon::now()->subMonths(2);

        $selectedMarca = $request->input('marca_id');
        $generoFilter = $request->input('genero');
        $search = $request->input('search');

        // 1. Primeiro, encontre os IDs dos produtos mais vendidos
        // (com base na contagem de registros em item_pedidos)
        $topSoldProductIdsQuery = ItemPedido::query()
            ->whereHas('pedido', function ($query) use ($doisMesesAtras) {
                $query->where('created_at', '>=', $doisMesesAtras);
            })
            ->whereHas('produto', function ($query) use ($user, $selectedMarca, $generoFilter, $search) {
                // Filtros de produto aqui, aplicados aos produtos que foram vendidos
                $query->whereHas('marca.user_brand', function ($q) use ($user) {
                    $q->where('users.id', $user->id);
                })
                ->whereDoesntHave('blockedUsers', function ($q) use ($user) {
                    $q->where('users.id', $user->id);
                })
                ->when($selectedMarca, function ($q, $marca) {
                    return $q->where('marca_id', $marca);
                })
                ->when($generoFilter, function ($q, $genero) {
                    return $q->where('genero', $genero);
                })
                ->when($search, function ($q, $s) {
                    return $q->where(function ($innerQ) use ($s) {
                        $innerQ->where('referencia', 'like', '%' . $s . '%')
                               ->orWhere('filtros', 'like', '%' . $s . '%');
                    });
                });
            })
            // Agrupar e contar os itens de pedido
            ->groupBy('produto_id')
            ->selectRaw('produto_id, COUNT(*) as vezes_pedido')
            ->orderByDesc('vezes_pedido')
            ->take(50); // Pegamos os 50 IDs de produtos mais vendidos

        $topSoldProductIds = $topSoldProductIdsQuery->pluck('produto_id');

        // Se não houver produtos vendidos nos últimos 2 meses, retorna vazio
        if ($topSoldProductIds->isEmpty()) {
            return response()->json([
                'products' => [],
            ]);
        }

        // 2. Agora, filtre os produtos com esses IDs e garanta um único por referência.
        // A chave aqui é como vamos escolher "um" se houver múltiplos com a mesma referência.
        // Uma abordagem é pegar o primeiro encontrado por ID ou por uma ordem específica.

        // Pega os produtos completos dos IDs mais vendidos
        $produtosCompletos = Produto::whereIn('id', $topSoldProductIds)
            // Inclua os mesmos filtros de marca, usuário bloqueado, etc. para segurança
            ->whereHas('marca.user_brand', function ($q) use ($user) {
                $q->where('users.id', $user->id);
            })
            ->whereDoesntHave('blockedUsers', function ($q) use ($user) {
                $q->where('users.id', $user->id);
            })
            ->when($selectedMarca, function ($q, $marca) {
                return $q->where('marca_id', $marca);
            })
            ->when($generoFilter, function ($q, $genero) {
                return $q->where('genero', $genero);
            })
            ->when($search, function ($q, $s) {
                return $q->where(function ($innerQ) use ($s) {
                    $innerQ->where('referencia', 'like', '%' . $s . '%')
                           ->orWhere('filtros', 'like', '%' . $s . '%');
                });
            })
            ->get();

        // 3. Consolidar por referência: Seleciona apenas um produto por referência
        $uniqueProductsByReference = $produtosCompletos->unique('referencia');

        // Formata a saída
        $produtoList = $uniqueProductsByReference->map(function ($produto) {
            return [
                'id' => $produto->id,
                'referencia' => $produto->referencia,
                'genero' => $produto->genero,
                'filtro' => $produto->filtros, // Assumindo que 'filtros' é o campo correto
                'imagem' => $produto->imagem,
            ];
        })->values(); // O values() é para reindexar o array após o unique

        return response()->json([
            'products' => $produtoList,
        ]);
    }*/

    // Exemplo de como você poderia usar um método `updated` para resetar a paginação
    // quando uma propriedade de filtro é alterada na interface do Livewire.
    // public function updated($propertyName)
    // {
    //     if (in_array($propertyName, ['selectedMarca', 'genero', 'search'])) {
    //         $this->resetPage();
    //     }
    // }

}
