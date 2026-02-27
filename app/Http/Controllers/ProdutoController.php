<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{





public function getByReference(Request $request)
{
    // Recupera os parâmetros adicionais do request
    $genero = $request->input('genero');
    $marca = $request->input('marca');

    // Monta a query com os filtros fornecidos
    $produto = Produto::where('referencia', $request->referencia)
        ->when($genero, function ($query) use ($genero) {
            return $query->where('genero', $genero);
        })
        ->when($marca, function ($query) use ($marca) {
            return $query->where('marca_id', $marca);
        })
        ->first();

    // Se não encontrou o produto, retorna um erro
    if (!$produto) {
        return response()->json(['message' => 'Produto não encontrado'], 404);
    }

    // Retorna o produto encontrado
    return response()->json($produto);
}


/*

// Método buscar produto por referência - V2
public function getByReference($referencia)
{
    // Tenta encontrar o produto por referência
    $produto = Produto::where('referencia', $referencia)->first();

    // Se não encontrou o produto, retorna um erro
    if (!$produto) {
        return response()->json(['message' => 'Produto não encontrado'], 404);
    }
    // Retorna o produto encontrado
    return response()->json($produto);
}
*/

    

//Esse pesquisa por Marca / referencia / filtros
/*
public function search(Request $request)
{
    try {
         // Adicione logs para depuração
    //\Log::info('Consulta recebida no método search.');
    
    $search = $request->input('query');
    $searchMarca = $request->input('querymarca');
    
    Log::info($search);
    
    if (!empty($searchMarca)) {
   
            
       $produtos = Produto::join('marcas', 'produtos.marca_id', '=', 'marcas.id')
        ->when(!empty($searchMarca), function ($query) use ($searchMarca) {
            // Remove os zeros à esquerda de $searchMarca
            $searchMarcaWithoutZeros = ltrim($searchMarca, '0');
            
            $query->where('marcas.referencia', 'LIKE', "%{$searchMarcaWithoutZeros}%");
        })
        ->where(function ($query) use ($search) {
            $query->where('produtos.referencia', 'LIKE', "%{$search}%")
                  ->orWhere('produtos.filtros', 'LIKE', "%{$search}%");
        })
        ->select('produtos.*')
        ->get();




    } else {
       
        $produtos = Produto::where('referencia', 'LIKE', "%{$search}%")
            ->orWhere('filtros', 'LIKE', "%{$search}%")
            ->get();
    }
        //\Log::info('Pesquisa estama sucesso');
    return response()->json($produtos);
    
    } catch (\Exception $e) {
        //\Log::info('Pesquisa estampas falhou');
        return response()->json(['error' => $e->getMessage()], 500);
    }
}*/


public function search(Request $request)
{
    try {
       $search = $request->input('query');
        $searchMarca = $request->input('querymarca');

        $produtos = Produto::when(!empty($searchMarca), function ($query) use ($searchMarca, $search) {
            // Remove os zeros à esquerda de $searchMarca
            $searchMarcaWithoutZeros = ltrim($searchMarca, '0');
            
            $query->join('marcas', 'produtos.marca_id', '=', 'marcas.id')
                ->where(function ($subquery) use ($searchMarcaWithoutZeros, $search) {
                    $subquery->where('marcas.referencia', 'LIKE', "%{$searchMarcaWithoutZeros}%");

                    if (!empty($search)) {
                        $subquery->orWhere('produtos.referencia', 'LIKE', "%{$search}%")
                                 ->orWhere('produtos.filtros', 'LIKE', "%{$search}%");
                    }
                });
        })
        ->when(empty($searchMarca), function ($query) use ($search) {
            $query->where(function ($subquery) use ($search) {
                $subquery->where('produtos.referencia', 'LIKE', "%{$search}%")
                         ->orWhere('produtos.filtros', 'LIKE', "%{$search}%");
            });
        })
        ->select('produtos.*')
        ->get();
        //Log::info('Pesquisa estama sucesso');

        
        return response()->json($produtos);

    } catch (\Exception $e) {
        //Log::info('Pesquisa estampas falhou');
        return response()->json(['error' => $e->getMessage()], 500);
    }
}



public function index(Request $request)

{
          
            //$user = Auth::user();
            $user = 1;

           
    
            $produtos = Produto::whereHas('marca.user_brand', function ($query) use ($user) {
                $query->where('users.id', $user);
            })->whereDoesntHave('blockedUsers', function ($query) use ($user) {
                $query->where('users.id', $user);
            });
    
            $selectedMarca = $request->get('selectedMarca');
            $genero = $request->get('genero');
            $search = $request->get('search');

            \Log::info($user);
            \Log::info($selectedMarca);
            \Log::info($genero);
            \Log::info($search);
    
            if ($selectedMarca) { 
                $produtos->where('marca_id', $selectedMarca)
                    ->where(function ($query) use ($genero, $search) {
                        if (!empty($genero)) {
                            $query->where('genero', $genero);
                        }
    
                        $query->where('referencia', 'like', '%' . $search . '%')
                            ->orWhere('filtros', 'like', '%' . $search . '%');
                        
                        if (!empty($genero)) {
                            $query->where('genero', $genero);
                        }
                    });
            } else {
                $produtos->where(function ($query) use ($genero, $search) {
                    if (!empty($genero)) {
                        $query->orWhere('genero', $genero);
                    }
                    if ($search) {
                        $query->where('filtros', 'like', '%' . $search . '%')
                            ->orWhere('referencia', 'like', '%' . $search . '%');
                    }
                });
            }
    
            $produtos->orderBy('created_at', 'desc');
            $produtos = $produtos->paginate(50);
            \Log::info($produtos);
            return response()->json($produtos);
        } 
    
        
public function searchProduto(Request $request)
{
    $user = Auth::user(); // Obtém o usuário autenticado

    // Inicia a consulta para produtos
    $produtos = Produto::whereHas('marca.user_brand', function ($query) use ($user) {
        $query->where('users.id', $user); // Filtra produtos que pertencem à marca do usuário
    })->whereDoesntHave('blockedUsers', function ($query) use ($user) {
        $query->where('users.id', $user); // Exclui produtos bloqueados pelo usuário
    });

    // Obtém os parâmetros de pesquisa do request
    $selectedMarca = $request->get('selectedMarca');
    $genero = $request->get('genero');
    $search = $request->get('search');

    // Aplica os filtros de pesquisa
    if ($selectedMarca) {
        $produtos->where('marca_id', $selectedMarca); // Filtra por marca selecionada
    }
    if (!empty($genero)) {
        $produtos->where('genero', $genero); // Filtra por gênero
    }
    if ($search) {
        $produtos->where('filtros', 'like', '%' . $search . '%') // Filtra por termo de pesquisa nos filtros
                 ->orWhere('referencia', 'like', '%' . $search . '%'); // ou na referência
    }

    // Ordena os produtos e aplica a paginação
    $produtos->orderBy('created_at', 'desc');
    $produtos = $produtos->paginate(50);

    // Retorna os produtos como resposta JSON
    return response()->json($produtos);
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
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
