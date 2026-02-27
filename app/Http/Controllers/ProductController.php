<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProductController;
use App\Models\Produto;
use App\Models\Marca;
use App\Models\brandUsers;

use App\Models\Pedido;
use App\Models\ItemPedido;

use App\Models\CarrinhoCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon; // Importe a classe Carbon para manipulação de datas


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    // No seu ProdutoController.php do Laravel

   /* public function index(Request $request)
    {
        // 1. Validação da Requisição
        $request->validate([
            'reference' => 'nullable|string',
            'filter' => 'nullable|string',
            'brand_id' => 'nullable|integer', // CORRIGIDO de 'brandId' para 'brand_id'
            'genero' => 'nullable', 'string', // Adicionado \Illuminate\Validation\Rule
            'typeProduct' => 'nullable|string',
            'page' => 'nullable|integer|min:1',
        ]);
        
        $user = auth()->user();
        Log::info('User produto: ' . $user->name);
    
        //$query = Produto::query();
        
      
      // Get the brands associated with the user
        $userBrands = $user->brands()->pluck('brand_id'); // Assuming a 'brands' relationship on your User model
    
       Log::info('Marcas do usuário: ' . $userBrands->implode(','));

        if ($userBrands->isEmpty()) {
            Log::info('Usuário sem marcas associadas, retornando lista vazia.');
            return response()->json([
                'products' => [],
                'current_page' => 1,
                'last_page' => 1,
            ]);
        }
        
        Log::info('Buscando produtos...');

        
        
    
        $query = Produto::query();
    
        $query->whereHas('marca.user_brand', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->whereDoesntHave('blockedUsers', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        });
        

        
        if ($request->has('typeProduct') && !empty($request->input('typeProduct'))) {
            $tipo = $request->input('typeProduct');
            $query->where('tipo', $tipo);
        }
    
        // 2. Filtro de Referência (mantido como está, parece correto)
        if ($request->has('reference') && !empty($request->input('reference'))) {
            $referenciasInput = $request->input('reference');
            $referencias = array_map('trim', explode(',', $referenciasInput));
            $query->whereIn('referencia', $referencias);
        }
    
        // 3. Filtro de Filtros (filter) (mantido como está)
        if ($request->has('filter') && !empty($request->input('filter'))) {
            $filter = $request->input('filter');
            $query->where('filtros', 'like', "%{$filter}%");
        }
    
        // 4. Filtro de Marca (brand_id) - Nome do parâmetro ajustado
        if ($request->has('brand_id') && !empty($request->input('brand_id'))) { // CORRIGIDO de 'brandId' para 'brand_id'
            $brandIdValue = $request->input('brand_id'); // CORRIGIDO de 'brandId' para 'brand_id'
            $query->where('marca_id', $brandIdValue); // Assumindo que a coluna no DB é 'marca_id'
        }

    
        // 5. Filtro de Gênero (mantido como está)
        if ($request->has('gender') && !empty($request->input('gender'))) {
            $genero = $request->input('gender');
            $query->where('genero', $genero);
        }
    
        // 6. Filtro de Descrição fixo (mantido como está)
        //$query->where('genero', '<>', 'indefinido');
    
        $perPage = 100;
        //$products = $query->paginate($perPage);
        //$products = $query->orderBy('referencia', 'desc')->paginate($perPage);
        //$products = $query->orderBy('id', 'desc')->paginate($perPage);
        
        // 6. Filtro de Descrição fixo (mantido como está)
        //$query->where('genero', '<>', 'indefinido');
        
    

        
        
        // Nova lógica de ordenação
        $products = $query->orderByRaw('
            CAST(
                CASE
                    WHEN referencia LIKE "INF-%" THEN SUBSTRING(referencia, 5) -- Pega a parte numérica após "INF-"
                    ELSE referencia                                       -- Usa a referência completa se não tiver "INF-"
                END AS UNSIGNED
            ) DESC, -- Ordena numericamente (parte extraída ou a própria referência)
            referencia DESC -- Desempate: Se as partes numéricas forem iguais, ordena a string original
        ')->paginate($perPage);

        
    
        return response()->json([
            'products' => $products->items(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
        ]);
    }*/
    
    
    /*public function index(Request $request)
    {
        // 1. Validação da Requisição
        $request->validate([
            'reference' => 'nullable|string',
            'filter' => 'nullable|string',
            'brand_id' => 'nullable|integer',
            'gender' => 'nullable|string', // Corrigido 'genero' para 'nullable|string'
            'typeProduct' => 'nullable|string',
            'page' => 'nullable|integer|min:1',
        ]);

        $user = auth()->user();

        // Get the brands associated with the user
        $userBrands = $user->brands()->pluck('brand_id'); // Assuming a 'brands' relationship on your User model

        Log::info('Marcas do usuário: ' . $userBrands->implode(','));

        if ($userBrands->isEmpty()) {
            Log::info('Usuário sem marcas associadas, retornando lista vazia.');
            return response()->json([
                'products' => [],
                'current_page' => 1,
                'last_page' => 1,
            ]);
        }

        $query = Produto::query();

        // Filtra produtos relacionados às marcas do usuário e que não estão bloqueados
        $query->whereHas('marca.user_brand', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->whereDoesntHave('blockedUsers', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        });

        if ($request->has('typeProduct') && !empty($request->input('typeProduct'))) {
            $tipo = $request->input('typeProduct');
            $query->where('tipo', $tipo);
        }

        // 2. Filtro de Referência
        if ($request->has('reference') && !empty($request->input('reference'))) {
            $referenciasInput = $request->input('reference');
            $referencias = array_map('trim', explode(',', $referenciasInput));
            $query->whereIn('referencia', $referencias);
        }

        // 3. Filtro de Filtros (filter)
        if ($request->has('filter') && !empty($request->input('filter'))) {
            $filter = $request->input('filter');
            $query->where('filtros', 'like', "%{$filter}%");
        }

        // 4. Filtro de Marca (brand_id)
        if ($request->has('brand_id') && !empty($request->input('brand_id'))) {
            $brandIdValue = $request->input('brand_id');
            $query->where('marca_id', $brandIdValue);
        }

        // 5. Filtro de Gênero
        if ($request->has('gender') && !empty($request->input('gender'))) { // Mude 'gender' para 'genero' aqui
            $genero = $request->input('gender'); // E aqui
            //dd($genero);
            $query->where('genero', $genero);
        }

        // --- Adição para exibir apenas um registro por referência ---
        // Se você quiser um critério específico para "qual" produto de uma referência pegar,
        // adicione um orderBy aqui ANTES do groupBy. Ex: orderBy('marca_id') para pegar de uma marca específica
        // ou orderBy('created_at', 'desc') para pegar o mais recente.
        $query->orderByRaw('
            CAST(
                CASE
                    WHEN referencia LIKE "INF-%" THEN SUBSTRING(referencia, 5)
                    ELSE referencia
                END AS UNSIGNED
            ) DESC,
            referencia DESC
        ');

        // Seleciona todas as colunas que você precisa, incluindo a referência.
        // É importante selecionar as colunas que você quer exibir, para não sobrecarregar a query.
        // Se o Laravel reclamar de colunas não agrupadas, você pode precisar listar explicitamente.
        // Para uma solução mais robusta com `groupBy` e `paginate`, é comum usar subqueries.
        // No entanto, para o seu caso de "apenas um de cada", `distinct` em uma subquery ou
        // um agrupamento mais sofisticado pode ser necessário.
        // A abordagem mais simples com `groupBy` e `get()` seguido de `unique()` é:
        // $productsCollection = $query->get()->unique('referencia');
        // Mas isso pegaria TUDO e depois filtraria em memória, o que não é bom para muitos registros.

        // Abordagem mais eficiente: Subquery para obter um único ID por referência,
        // e depois buscar esses produtos.
        $subQuery = clone $query; // Clona a query base para a subquery
        $uniqueReferencesIds = $subQuery
            ->selectRaw('MIN(id) as id') // Pega o ID mínimo para cada referência (ou MAX, ou outro critério)
            ->groupBy('referencia')
            ->pluck('id'); // Pega apenas os IDs resultantes

        // Agora, use esses IDs para buscar os produtos paginados
        $perPage = $request->input('per_page', 100); // Define um padrão ou pega da requisição
        $products = Produto::whereIn('id', $uniqueReferencesIds)
                            ->orderByRaw('
                                CAST(
                                    CASE
                                        WHEN referencia LIKE "INF-%" THEN SUBSTRING(referencia, 5)
                                        ELSE referencia
                                    END AS UNSIGNED
                                ) DESC,
                                referencia DESC
                            ')
                            ->paginate($perPage);


        return response()->json([
            'products' => $products->items(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
        ]);
    }*/
    
    
    //OFICIAL E FUNCIONAL
    public function index(Request $request)
    {
        // 1. Validação da Requisição
        $request->validate([
            'reference' => 'nullable|string',
            'filter' => 'nullable|string',
            'brand_id' => 'nullable|integer',
            'gender' => 'nullable|string',
            'typeProduct' => 'nullable|string',
            'page' => 'nullable|integer|min:1',
        ]);
    
        $user = auth()->user();
    
        // Get the brands associated with the user
        $userBrands = $user->brands()->pluck('brand_id');
    
        Log::info('Marcas do usuário: ' . $userBrands->implode(','));
    
        if ($userBrands->isEmpty()) {
            Log::info('Usuário sem marcas associadas, retornando lista vazia.');
            return response()->json([
                'products' => [],
                'current_page' => 1,
                'last_page' => 1,
            ]);
        }
    
        $query = Produto::query();
    
        // Filtra produtos relacionados às marcas do usuário e que não estão bloqueados
        $query->whereHas('marca.user_brand', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->whereDoesntHave('blockedUsers', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        });
    
        if ($request->has('typeProduct') && !empty($request->input('typeProduct'))) {
            $tipo = $request->input('typeProduct');
            $query->where('tipo', $tipo);
        }
    
        // 2. Filtro de Referência
        if ($request->has('reference') && !empty($request->input('reference'))) {
            $referenciasInput = $request->input('reference');
            $referencias = array_map('trim', explode(',', $referenciasInput));
            $query->whereIn('referencia', $referencias);
            // REMOVA a lógica de subquery para pegar um único produto por referência
            // quando a referência é o critério principal de busca.
            // Assim, todos os produtos com a mesma referência, incluindo diferentes gêneros, serão retornados.
        /*} else {
            // --- Adição para exibir apenas um registro por referência, SE NÃO HOUVER FILTRO DE REFERÊNCIA ---
            // Aplique a lógica de "apenas um registro por referência" SOMENTE quando não há uma referência específica
            // sendo buscada. Isso permite que a busca por referência traga todos os gêneros.
            $subQuery = clone $query;
            $uniqueReferencesIds = $subQuery
                ->selectRaw('MIN(id) as id')
                ->groupBy('referencia')
                ->pluck('id');
    
            // Garante que a query principal filtrará pelos IDs únicos APENAS se não houver filtro de referência
            if (!$uniqueReferencesIds->isEmpty()) {
                $query->whereIn('id', $uniqueReferencesIds);
            }
        }*/
        
        } else {
            // Só aplica a lógica de pegar 1 produto por referência SE não tiver filtros específicos como brand_id ou gender
            if (
                !$request->has('brand_id') &&
                !$request->has('gender') &&
                !$request->has('filter') &&
                !$request->has('typeProduct')
            ) {
                $subQuery = clone $query;
                $uniqueReferencesIds = $subQuery
                    ->selectRaw('MIN(id) as id')
                    ->groupBy('referencia')
                    ->pluck('id');
        
                if (!$uniqueReferencesIds->isEmpty()) {
                    $query->whereIn('id', $uniqueReferencesIds);
                }
            }
        }

    
        // 3. Filtro de Filtros (filter)
        if ($request->has('filter') && !empty($request->input('filter'))) {
            $filter = $request->input('filter');
            $query->where('filtros', 'like', "%{$filter}%");
        }
    
        // 4. Filtro de Marca (brand_id)
        if ($request->has('brand_id') && !empty($request->input('brand_id'))) {
            $brandIdValue = $request->input('brand_id');
            $query->where('marca_id', $brandIdValue);
        }
    
        // 5. Filtro de Gênero
        if ($request->has('gender') && !empty($request->input('gender'))) {
            $genero = $request->input('gender');
            $query->where('genero', $genero);
        }
    
        // Ordemação
        $query->orderByRaw('
            CAST(
                CASE
                    WHEN referencia LIKE "INF-%" THEN SUBSTRING(referencia, 5)
                    ELSE referencia
                END AS UNSIGNED
            ) DESC,
            referencia DESC
        ');
    
        $perPage = $request->input('per_page', 100);
        $products = $query->paginate($perPage);
    
        return response()->json([
            'products' => $products->items(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
        ]);
    }
    
    
    //NOVIDADES DA SEMANA - INICIO
    public function novidades(Request $request)
    {
        // 1. Validação da Requisição
        $request->validate([
            'reference' => 'nullable|string',
            'filter' => 'nullable|string',
            'brand_id' => 'nullable|integer',
            'genero' => 'nullable|string',
            'page' => 'nullable|integer|min:1',
            'period' => 'nullable|in:day,week', // New validation for novelty period
        ]);

        $user = auth()->user();
        Log::info('User produto: ' . $user->name);

        // Get the brands associated with the user
        $userBrands = $user->brands()->pluck('brand_id');

        Log::info('Marcas do usuário: ' . $userBrands->implode(','));

        if ($userBrands->isEmpty()) {
            Log::info('Usuário sem marcas associadas, retornando lista vazia.');
            return response()->json([
                'products' => [],
                'current_page' => 1,
                'last_page' => 1,
            ]);
        }

        Log::info('Buscando produtos...');

        $query = Produto::query();

        $query->whereHas('marca.user_brand', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->whereDoesntHave('blockedUsers', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        });

        // --- NEW: Novelty Filtering ---
        if ($request->has('period')) {
            $period = $request->input('period');
            if ($period === 'day') {
                $query->whereDate('created_at', Carbon::today());
                Log::info('Filtering for today\'s new products.');
            } elseif ($period === 'week') {
                $query->where('created_at', '>=', Carbon::now()->subWeek());
                Log::info('Filtering for this week\'s new products.');
            }
        } else {
            // Default to showing all products if no period is specified,
            // or you can set a default "week" if you prefer.
            // Example: $query->where('created_at', '>=', Carbon::now()->subWeek());
            Log::info('No specific novelty period requested, showing all recent products (or as per other filters).');
        }
        // --- END NEW ---

        // 2. Filtro de Referência
        if ($request->has('reference') && !empty($request->input('reference'))) {
            $referenciasInput = $request->input('reference');
            $referencias = array_map('trim', explode(',', $referenciasInput));
            $query->whereIn('referencia', $referencias);
        }

        // 3. Filtro de Filtros (filter)
        if ($request->has('filter') && !empty($request->input('filter'))) {
            $filter = $request->input('filter');
            $query->where('filtros', 'like', "%{$filter}%");
        }

        // 4. Filtro de Marca (brand_id)
        if ($request->has('brand_id') && !empty($request->input('brand_id'))) {
            $brandIdValue = $request->input('brand_id');
            $query->where('marca_id', $brandIdValue);
        }

        // 5. Filtro de Gênero
        if ($request->has('gender') && !empty($request->input('gender'))) {
            $genero = $request->input('gender');
            $query->where('genero', $genero);
        }

        // 6. Filtro de Descrição fixo
        $query->where('genero', '<>', 'indefinido');
        
        //7. Tipo de Produto
        $query->where('tipo',  'transfer');

        $perPage = 100;
        // Order by created_at in descending order to show newest first
        $products = $query->orderBy('created_at', 'desc')->paginate($perPage);
        

        return response()->json([
            'products' => $products->items(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
        ]);
    }
    //NOVIDADES DA SEMANA - FIM
    
    
    public function addCart(Request $request, $id)
    {
        $user = auth()->user();
        Log::info('User: ' . $user->id); // Adicione esta linha para verificar o usuário
        $produto = Produto::find($id);
    
        if (!$produto) {
            Log::info('Produto nao encontrado ao add Cart'); // Adicione esta linha para verificar o usuário
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    
        $itemCarrinho = CarrinhoCompra::where('user_id', $user->id)
            ->where('produto_id', $id)
            ->first();
        
    
        if ($itemCarrinho) {
            $itemCarrinho->increment('quantidade');
        } else {
            CarrinhoCompra::create([
                'quantidade' => 120,
                'produto_id' => $id,
                'user_id' => $user->id,
            ]);
        }
    
        return response()->json(['message' => 'Item adicionado ao carrinho com sucesso']);
    }

  
    
   /*public function getProdutosMaisVendidos(Request $request)
    {
            $user = auth()->user();
            if (!$user) {
                return response()->json(['message' => 'Não autorizado.'], 401);
            }
        
            $doisMesesAtras = Carbon::now()->subMonths(2);
        
            $selectedMarca = $request->input('marca_id');
            $generoFilter = $request->input('genero');
            $search = $request->input('search');
            
            Log::info('Filtros Genero: ' . $generoFilter);
        
            // 1. Subquery para consolidar as vendas por REFERÊNCIA de produto
            // e contar as ocorrências em item_pedidos
            $consolidatedSales = DB::table('item_pedidos as ip')
                ->select('p.genero', 'p.referencia', DB::raw('COUNT(ip.produto_id) as total_de_pedidos')) // Contagem por referencia
                ->join('produtos as p', 'ip.produto_id', '=', 'p.id')
                ->join('pedidos as ped', 'ip.pedido_id', '=', 'ped.id')
                ->join('marcas as m', 'p.marca_id', '=', 'm.id')
                ->join('brand_users as ub', 'm.id', '=', 'ub.brand_id')
                ->where('ub.user_id', $user->id)
                ->where('p.tipo', 'transfer')
                ->where('ped.created_at', '>=', $doisMesesAtras)
                ->whereNotExists(function ($query) use ($user) {
                    $query->select(DB::raw(1))
                        ->from('blocked_transfers')
                        ->whereRaw('blocked_transfers.transfer_id = p.id')
                        ->where('blocked_transfers.user_id', $user->id);
                })
                ->when($selectedMarca, function ($query, $marca) {
                    // Nota: Se você filtrar por marca aqui, produtos com a mesma referencia de outras marcas serão excluídos.
                    // Pense se essa é a intenção ao consolidar por referencia.
                    return $query->where('p.marca_id', $marca);
                })
                ->when($generoFilter, function ($query, $genero) {
                    return $query->where('p.genero', $genero);
                })
                ->when($search, function ($query, $s) {
                    return $query->where(function ($q) use ($s) {
                        $q->where('p.referencia', 'like', '%' . $s . '%')
                            ->orWhere('p.filtros', 'like', '%' . $s . '%');
                    });
                })
                ->groupBy('p.genero', 'p.referencia') // Agrupando por gênero E referência
                ->orderByDesc('total_de_pedidos');
        
            // 2. Rankeamento dos produtos consolidados por gênero e referência
            $rankedProductsBuilder = DB::query()
                ->select('genero', 'referencia', 'total_de_pedidos')
                ->fromSub($consolidatedSales, 'ranked_consolidated_products')
                ->selectRaw('ROW_NUMBER() OVER (PARTITION BY genero ORDER BY total_de_pedidos DESC) as rn');
        
            // 3. Pegar as referências dos produtos onde o rank é menor ou igual a 50
            $finalProductReferences = DB::table(DB::raw('(' . $rankedProductsBuilder->toSql() . ') as sub'))
                ->mergeBindings($rankedProductsBuilder)
                ->where('rn', '<=', 50)
                ->pluck('referencia'); // Pega as referências, não os IDs ainda
        
            // 4. Carregar um produto de cada referência encontrada
        $produtoList = collect();
        foreach ($finalProductReferences as $referencia) {
            $produto = Produto::where('referencia', $referencia)
                             ->where('tipo', 'transfer') // <-- Adicione esta linha aqui!
                             ->when($user->brands()->pluck('brand_id')->isNotEmpty(), function ($query) use ($user) {
                                 // Garante que a marca do produto selecionado pertence ao usuário
                                 $query->whereHas('marca.user_brand', function ($q) use ($user) {
                                     $q->where('users.id', $user->id);
                                 });
                             })
                             ->whereDoesntHave('blockedUsers', function ($query) use ($user) {
                                 $query->where('users.id', $user->id);
                             })
                             ->first(); // Pega apenas o primeiro produto encontrado para essa referência
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
    
        
    
        return response()->json([
            'products' => $produtoList,
        ]);
    }*/
    
    
    
   
   public function getProdutosMaisVendidos(Request $request)
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
            /*->where('p.tipo', 'transfer')*/
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
                /*->where('tipo', 'transfer')*/
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
                    'tipo' => $produto->tipo,
                    'medida' => $produto->medida,
                ]);
            }
        }
    }

    return response()->json([
        'products' => $produtoList,
    ]);
}

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
