<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarrinhoCompra;
use App\Models\Pedido;
use App\Models\ItemPedido;
use App\Models\Produto;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\UserAction;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
  public function index(Request $request)
  {
        $user = auth()->user();
        

        Log::info('User: ' . $user->id); // Adicione esta linha para verificar o usuário

        // Carregue os produtos associados, incluindo o caminho da imagem
        $carts = CarrinhoCompra::with('produto')->where('user_id', $user->id)->get();
        Log::info('Carrinho de compras: ' . $carts);
        return response()->json([
            'carts' => $carts->map(function ($CarrinhoCompra) {
                return [
                    'id' => $CarrinhoCompra->id,
                    'quantity' => $CarrinhoCompra->quantidade,
                    'belt_color' => $CarrinhoCompra->correiacor,
                    'medida' => $CarrinhoCompra->medida,
                    'prefeitura_produto' => $CarrinhoCompra->prefeitura_produto,
                    'image_client' => $CarrinhoCompra->imagem_cliente,
                    'product' => [
                        'id' => $CarrinhoCompra->produto->id,
                        'reference' => $CarrinhoCompra->produto->referencia,
                        'image' => $CarrinhoCompra->produto->imagem, // Caminho da imagem do produto
                        'filter' => $CarrinhoCompra->produto->filtros, // Caminho da imagem do produto
                        'type' => $CarrinhoCompra->produto->tipo, // Tipo produto
                        'medida' => $CarrinhoCompra->produto->medida, // Tipo produto
                    ],
                ];
            }),
        ]);
    }
    
    public function update(Request $request, $id)
    {
        // Validação dos campos recebidos
        $request->validate([
            'quantity' => 'integer|min:1',
            'belt_color' => 'nullable|string|max:50',
            'medida' => 'nullable|string|max:50',
            'prefeitura_produto' => 'nullable|string|max:50',
        ]);
    
        $user = auth()->user();
    
        $carrinhoCompra = CarrinhoCompra::where('id', $id)
            ->where('user_id', $user->id)
            ->first();
    
        if (!$carrinhoCompra) {
            return response()->json(['message' => 'Item não encontrado'], 404);
        }
    
        $quantity = $request->input('quantity');
        $beltColor = $request->input('belt_color');
        $medida = $request->input('medida');
        $prefeituraProduto = $request->input('prefeitura_produto');
    
        if ($request->filled('quantity')) {
            $carrinhoCompra->quantidade = $quantity;
        }
    

        $carrinhoCompra->correiacor = $beltColor;
        
        $carrinhoCompra->medida = $medida;
        $carrinhoCompra->prefeitura_produto = $prefeituraProduto;
        
        Log::info('MEDIDA ENVIADA: ' . $medida);

    
        $carrinhoCompra->save();
    
        return response()->json([
            'message' => 'Item atualizado com sucesso',
            'item' => $carrinhoCompra
        ]);
    }


    #region Update em lote
    public function updateLote(Request $request)
    {
        // A validação pode permitir que os campos sejam nulos,
        // mas pelo menos um deve estar presente.
        $validatedData = $request->validate([
            'quantity' => 'sometimes|integer|min:1',
            'belt_color' => 'sometimes|string|max:50',
            'medida' => 'nullable|string|max:50',
        ]);

        // Se nenhum dado foi enviado para atualização
        if (empty($validatedData)) {
            return response()->json(['message' => 'Nenhum dado para atualizar.'], 400);
        }

        $user = auth()->user();
        
        // Prepara os dados para o update
        $updateData = [];
        if ($request->filled('quantity')) {
            $updateData['quantidade'] = $validatedData['quantity'];
        }
        if ($request->filled('belt_color')) {
            $updateData['correiacor'] = $validatedData['belt_color'];
        }
        if ($request->filled('medida')) {
            $updateData['medida'] = $validatedData['medida'];
        }

        // Executa a atualização em massa para todos os itens do carrinho do usuário
        $updatedRows = CarrinhoCompra::where('user_id', $user->id)
            ->update($updateData);

        if ($updatedRows > 0) {
            return response()->json([
                'message' => $updatedRows . ' item(s) atualizado(s) com sucesso',
            ]);
        }

        return response()->json(['message' => 'Nenhum item no carrinho para atualizar.'], 404);
    }
    #endregion

    #region Destroy
    public function destroy($id)
    {
        $user = auth()->user();
        $CarrinhoCompra = CarrinhoCompra::where('id', $id)->where('user_id', $user->id)->first();

        if (!$CarrinhoCompra) {
            return response()->json(['message' => 'Item não encontrado'], 404);
        } else {
            // Remova a imagem do storage
            if ($CarrinhoCompra->image_client) {
                Storage::delete('public/produtos/imagens_pedidos/' /* .$user->email.'/' */ . $CarrinhoCompra->image_client);
            }
            // Remova o item do carrinho de compras
            $CarrinhoCompra->delete();
        }

        return response()->json(['message' => 'Item removido com sucesso']);
    }
    #endregion    
    
    #region LIMPAR CARRINHO
    public function destroyAllCart()
    {
        $user = auth()->user();
        $carrinhos = CarrinhoCompra::where('user_id', $user->id)->get();
        
       
        if ($carrinhos->isEmpty()) {
            Log::info('Carrinho já esta vazio');
            return response()->json(['message' => 'Carrinho já está vazio'], 404);
        }

        foreach ($carrinhos as $item) {
            // Remova a imagem do storage se existir
            if ($item->imagem_cliente) {
                Log::info('Imagem Cliente: ' . $item->imagem_cliente);
                Storage::delete('public/produtos/imagens_pedidos/' . $item->imagem_cliente);
            }

            $item->delete();
        }
        Log::info('Carrinho LIMPO: ' );
        return response()->json(['message' => 'Carrinho limpo com sucesso']);
    }
    #endregion

   
    #region UPDATE IMAGEM
    public function uploadCustomImages(Request $request)
    {

        Log::info('Iniciando upload');
        
        $user = $request->user();
    
        $isPrefeitura = $user->regra_user->contains('regra_id', 110); // PREFEITURA
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imagem) {
                $cartId = CarrinhoCompra::max('id') + 1;
                $numeroAleatorio = rand(1, 90000);
                $nomeImagem = $user->id . '-' . $cartId . '-' . $numeroAleatorio . '.webp';
    
                $diretorio = "public/produtos/imagens_pedidos/{$user->email}";
                $caminho = storage_path("app/{$diretorio}/{$nomeImagem}");
    
                if (!Storage::exists($diretorio)) {
                    Log::info('Criando diretorio');
                    Storage::makeDirectory($diretorio, 0755, true);
                }
    
                // Processar imagem
                $imagemWebp = Image::make($imagem)
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode('webp', 75)
                    ->save($caminho);
    
                // Buscar produto "n usar"
                $produto = Produto::where('descricao', 'n usar')
                    ->whereNotIn('id', function ($query) use ($user) {
                        $query->select('produto_id')
                             ->from('carrinho_compras')
                              ->where('user_id', $user->id);
                    })
                    ->first();
                Log::info('Criando diretorio '. $produto);
                if (!$produto) {
                     Log::error('Não há mais produtos disponíveis!');
                    return response()->json([
                        'success' => false,
                        'message' => 'Não há mais produtos disponíveis!',
                    ], 422);
                }
                Log::error('Carrinho criado');
                // Criar item no carrinho
                CarrinhoCompra::create([
                    'produto_id' => $produto->id,
                    'quantidade' => $isPrefeitura ? 1 : 120,
                    'imagem_cliente' => "{$user->email}/{$nomeImagem}",
                    'user_id' => $user->id,
                ]);
            }
            Log::info('Imagens adicionadas ao carrinho com sucesso!');
            return response()->json([
                'success' => true,
                'message' => 'Imagens adicionadas ao carrinho com sucesso!',
            ]);
        }
    
        return response()->json([
            'success' => false,
            'message' => 'Nenhuma imagem foi enviada.',
        ], 400);
    }
    #endregion
    
    
    #region Confirmar Pedido
    public function confirmarPedido(Request $request)
    {
        $user = auth()->user();
        Log::info('Iniciou confirmacao pedido pelo APP');

        //Se user tem permissao prefeitura
        $userPrefeitura = $user->regra_user->contains('regra_id', 110); // PREFEITURA
        Log::info('User Prefeitura: ' . $userPrefeitura);


        // 1. Validação dos dados de entrada
        $validator = null;

            if($userPrefeitura){

                $validator = Validator::make($request->all(), [
                    'marca' => 'nullable|string|max:255',
                    'prefeitura' => 'required|string|max:255',
                    'grupo' => 'nullable|string|max:255',
                    'grade' => 'nullable|string|max:255',
                    'observacao' => 'nullable|string|max:1000',
                ]);

            }
            else{
            if($request->input('tipo')){ //tipo vindo do app flutter
                $validator = Validator::make($request->all(), [
                    'marca' => 'nullable|string|max:255',
                    'prefeitura' => 'nullable|string|max:255',
                    'grupo' => 'nullable|string|max:255',
                    'grade' => 'nullable|string|max:255',
                    'observacao' => 'nullable|string|max:1000',
                ]);
            }else{
                $validator = Validator::make($request->all(), [
                    'marca' => 'required|string|max:255',
                    'prefeitura' => 'nullable|string|max:255',
                    'grupo' => 'required|string|max:255',
                    'grade' => 'required|string|max:255',
                    'observacao' => 'nullable|string|max:1000',
                ]);
            }

        }


    if ($validator->fails()) {
        Log::info('Erro de validação');
        return response()->json([
            'message' => 'Erro de validação',
            'errors' => $validator->errors()
        ], 422); // Código 422 Unprocessable Entity para erros de validação
    }

        

        // 2. Verifique se o carrinho não está vazio
        $carrinhoVazio = CarrinhoCompra::where('user_id', $user->id)->count() === 0;

        if ($carrinhoVazio) {
            Log::info('Carrinho vazio');
            return response()->json([
                'message' => 'O carrinho está vazio. Não é possível criar um pedido vazio.'
            ], 400); // Código 400 Bad Request
        }

        // 3. Obtenha os itens do carrinho
        $itensCarrinho = CarrinhoCompra::where('user_id', $user->id)->get();

        // 4. Verifique se todas as quantidades são maiores ou iguais a 1
        $quantidadesValidas = $itensCarrinho->every(function ($itemCarrinho) {
            return $itemCarrinho->quantidade >= 1;
        });

        if (!$quantidadesValidas) {
            Log::info('Pedido error quantidade: Cliente errou quantidade pedido: USER: ' . $user->name);
            return response()->json([
                'message' => 'A quantidade de um ou mais itens do carrinho é inválida. Certifique-se de que todas as quantidades sejam maiores ou iguais a 1.'
            ], 400); // Código 400 Bad Request
        }

        // 5. Estipular a data de entrega
        $total_quantidade = ItemPedido::whereHas('pedido', function ($query) {
            $query->where('status', 'aberto')->orWhere('status', 'cadastrado');
        })->sum('quantidade');

        $dias_necessarios = ceil($total_quantidade / 12000);
        $data_estimada = date('Y-m-d H:i:s', strtotime("+$dias_necessarios days"));


        // 6. Crie um novo pedido
        try {
            $pedido = Pedido::create([
                'marca' => $userPrefeitura ? '' : $request->input('marca') ?? '', //Se for prefeitura marca fica vazio
                'prefeitura' => $request->input('prefeitura'),
                'grupo' => $request->input('grupo') ?? '',
                'grade' => $request->input('grade') ?? '',
                'observacao' => $request->input('observacao'),
                'status' => 'aberto',
                'previsao_entrega' => $data_estimada,
                'aplicativo' => 'sim',
                'user_id' => $user->id,
            ]);

            // 7. Adicione os itens do carrinho ao pedido
            foreach ($itensCarrinho as $itemCarrinho) {
                $itemPedido = new ItemPedido([
                    'pedido_id' => $pedido->id,
                    'produto_id' => $itemCarrinho->produto_id,
                    'quantidade' => $itemCarrinho->quantidade,
                    'imagem_cliente' => $itemCarrinho->imagem_cliente,
                    'correiacor' => $itemCarrinho->correiacor,
                    'user_id' => $user->id,
                ]);
                $itemPedido->save();
            }
            Log::info('Itens adicionados ao pedido com sucesso!');

            // 8. Limpe o carrinho
            CarrinhoCompra::where('user_id', $user->id)->delete();

            // 9. Log ação de usuário
            UserAction::create([
                'user_id' => $user->id,
                'action_type' => 'pedido',
                'description' => 'CONFIRMOU O PEDIDO PELO APP PEDIDO ID: ' . $pedido->id . '.',
            ]);
            Log::info('Pedido confirmado com sucesso pelo APP!');
            return response()->json([
                'message' => 'Pedido confirmado com sucesso pelo APP!',
                'pedido' => $pedido // Você pode retornar o pedido criado se quiser
            ], 201); // Código 201 Created

        } catch (\Exception $e) {
            Log::error('Erro ao confirmar pedido pelo App: ' . $e->getMessage());
            return response()->json([
                'message' => 'Ocorreu um erro ao processar o pedido. Por favor, tente novamente.'
            ], 500); // Código 500 Internal Server Error
        }
    }

    #endregion

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
 

    /**
     * Remove the specified resource from storage.
     */

}