<?php

namespace App\Http\Controllers;

use App\Http\Controllers\OrderController;
use App\Models\CarrinhoCompra;
use App\Models\Pedido;
use App\Models\ItemPedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();

        $query = Pedido::with(['itens.produto', 'user']); // Incluí 'itens.produto' para carregar o produto junto com os itens

        // Verifica se o usuário tem permissão para ver todos os pedidos
        $hasEditorPermission = Auth::user()->rules->contains('nome', 'VER TODOS - PEDIDOS');

        // Aplica filtros adicionais se o usuário não tem permissão de editor
        if (!$hasEditorPermission) {
            $query->where('user_id', $user->id);
            Log::info('Usuário acessou com permissão restrita: ' . $user->id);
        }

        // Filtro por número do pedido
        /*if ($request->has('order_number')) {
            $orderNumber = $request->input('order_number');
            $query->where('pedido_modelo', $orderNumber)
                    ->orWhere('id', $orderNumber); // Adiciona a verificação pelo pedido_id
        }*/
        
        if ($request->has('order_number')) {
            $orderNumber = $request->input('order_number');
            $query->where(function ($q) use ($orderNumber) {
                $q->where('pedido_modelo', 'LIKE', "%{$orderNumber}%")
                  ->orWhere('id', 'LIKE', "%{$orderNumber}%");
            });
        }
        
        //Pesquisa pelo nome da prefeitura
        if ($request->has('prefeitura')) {
            $prefeituraName = $request->input('prefeitura');
            $query->where('prefeitura', 'like', "%{$prefeituraName}%" ); 
        }
        
        // Filtro por Grupo - Feminino, masculino, infantil
        if ($request->has('grupo')) {
            $grupo = $request->input('grupo');
            $query->where('grupo', $grupo);
        }
        
        // Filtro por tipo que pertence ao produto
        if ($request->has('tipo')) {
            $tipo = $request->input('tipo');
            $query->whereHas('itens.produto', function ($q) use ($tipo) {
                $q->where('tipo', $tipo);
            });
        }
        
        // Por periodo
        if ($request->has('startDate') && $request->has('endDate')) {
            $query->whereBetween('created_at', [
                $request->input('startDate'),
                $request->input('endDate')
            ]);
        }

        // Filtro por status
        /*if ($request->has('order_number') && !is_null($request->input('order_number'))) {
            if ($request->has('status')) {
                $status = $request->input('status');
                $query->where('status', 'like', "%{$status}%");
                Log::info('Filtrando por status: ' . $status);
            } else {
                // Se nenhum status for especificado, mostrar 'cadastrado' e 'aberto'
                
                if (!$hasEditorPermission) { //Se o usuario nao tiver permisao ver todos os pedidos liste aberto e cadastrados
                    $query->whereIn('status', ['aberto', 'cadastrado']);
                }else{
                    //$query->where('status', 'aberto'); //Apenas aberto para deixar mais limpo a area
                    $query->whereIn('status', ['aberto', 'cadastrado']);
                }
                Log::info('Nenhum status especificado, filtrando por "cadastrado" e "aberto".');
            }
        }*/

   
                /*if ($request->has('status')) {
                    $status = $request->input('status');
                    $query->where('status', 'like', "%{$status}%");
                    Log::info('Filtrando por status: ' . $status);
                }*/
                
                if ($request->has('status')) {
                    $status = $request->input('status');

                    if(!$hasEditorPermission){
                        if($status == 'aberto' || $status == 'cadastrado'){
                            $query->whereIn('status', ['aberto', 'cadastrado']);
                        }else{
                            $query->where('status', 'like', "%{$status}%");
                        }
                    }else{
                        $query->where('status', 'like', "%{$status}%");
                    }
                    Log::info('Filtrando por status: ' . $status);
                }
                else {
                    // Se nenhum status for especificado, mostrar 'cadastrado' e 'aberto'
                    
                    if (!$hasEditorPermission) { //Se o usuario nao tiver permisao ver todos os pedidos liste aberto e cadastrados
                        if($request->has('order_number')){
                            //$query->whereIn('status', ['aberto', 'cadastrado']);
                        }else{
                            $query->whereIn('status', ['aberto', 'cadastrado']);
                        }
                    }else{
                        //$query->where('status', 'aberto'); //Apenas aberto para deixar mais limpo a area
                        if($request->has('order_number')){
                            //$query->whereIn('status', ['aberto', 'cadastrado']);
                        }else{
                            $query->whereIn('status', ['aberto', 'cadastrado']);
                        }
                    }
                    Log::info('Nenhum status especificado, filtrando por "cadastrado" e "aberto".');
                }                

        // Filtro por user_id (apenas se o usuário tiver permissão de editor ou se for o próprio user_id)
        if ($request->has('user_id') && $hasEditorPermission) { // Apenas editores podem filtrar por user_id diferente do seu
            $userId = $request->input('user_id');
            $query->where('user_id', $userId);
            Log::info('Filtrando por user_id: ' . $userId);
        } elseif ($request->has('user_id') && !$hasEditorPermission && $request->input('user_id') != $user->id) {
            // Se um usuário sem permissão de editor tentar filtrar por outro user_id, ignore ou retorne erro
            Log::warning('Tentativa de filtrar por user_id diferente sem permissão de editor. User ID: ' . $user->id);
            // Opcional: Você pode retornar um erro ou simplesmente ignorar o filtro
        }

        $perPage = 50;
        $orders = $query->orderBy('created_at', 'asc')->paginate($perPage);

        $ordersWithData = $orders->map(function ($order) {
            $user = $order->user;

            // Mapear os itens do pedido
            /*$itensDoPedido = $order->itens->map(function ($item) {
                return [
                    'id' => $item->id,
                    'produto_id' => $item->produto_id,
                    'referencia' => $item->produto->referencia ?? null, // Usar null coalescing para evitar erro se produto for null
                    'image_produto' => $item->produto->imagem ?? null,
                    'filter' => $item->produto->filtros ?? null,
                    'imagem_cliente' => $item->imagem_cliente,
                    'quantidade' => $item->quantidade,
                    'correia_cor' => $item->correiacor,
                    'medida' => $item->medida,
                    'prefeitura_produto' => $item->prefeitura_produto,
                ];
            });*/
            
            $itensDoPedido = $order->itens
                ->sortBy(function ($item) {
                    return $item->produto->referencia ?? '';
                })
                ->values()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'produto_id' => $item->produto_id,
                        'referencia' => $item->produto->referencia ?? null,
                        'image_produto' => $item->produto->imagem ?? null,
                        'filter' => $item->produto->filtros ?? null,
                        'imagem_cliente' => $item->imagem_cliente,
                        'quantidade' => $item->quantidade,
                        'correia_cor' => $item->correiacor,
                        'medida' => $item->medida,
                        'prefeitura_produto' => $item->prefeitura_produto,
                    ];
                });


            return [
                'id' => $order->id,
                'brand' => $order->marca,
                'order_number' => $order->pedido_modelo,
                'grupo' => $order->grupo,
                'prefeitura' => $order->prefeitura,
                'grade' => $order->grade,
                'observation' => $order->observacao,
                'status' => $order->status,
                'cancellation_reason' => $order->motivo_cancelamento,
                'delivery_forecast' => null/*$order->previsao_entrega*/,
                'user_name' => $user ? $user->name : null,
                'user_image' => $user ? $user->profile_photo_path : "https://cdn-icons-png.flaticon.com/512/149/149071.png",
                'created_at' => $order->created_at,
                'updated_at' => $order->updated_at,
                'itens' => $itensDoPedido,
            ];
        });

        return response()->json([
            'pedidos' => $ordersWithData,
            'total' => $orders->total(),
            'current_page' => $orders->currentPage(),
            'last_page' => $orders->lastPage(),
        ]);
    }

    public function getOrders(Request $request)
    {
        $query = Order::with(['itens.product', 'user']); // Carrega os produtos junto com os itens do pedido e o usuário

        // Verifica se o usuário tem permissão para ver todos os pedidos
        $hasEditorPermission = Auth::user()->rules->contains('rule', 'EXIBIR TODOS PEDIDO');

        // Aplica filtros adicionais se o usuário não tem permissão de editor
        if (!$hasEditorPermission) {
            $query->where('user_id', Auth::id());
        }

        if ($request->has('order_number') && !is_null($request->input('order_number'))) {
            $reference = $request->input('order_number');
            $query->where('order_number', $reference);
        }

        if ($request->has('status') && !is_null($request->input('status'))) {
            $filter = $request->input('status');
            if ($filter === 'Aberto') {
                $query->where(function ($q) {
                    $q->where('status', 'aberto')
                        ->orWhere('status', 'cadastrado');
                });
            } else {
                $query->where('status', 'like', "%{$filter}%");
            }
        }

        if ($request->has('user_name') && !is_null($request->input('user_name'))) {
            $user_name = $request->input('user_name');
            $user = User::where('name', $user_name)->first();

            if ($user) {
                $query->where('user_id', $user->id);
            } else {
                return response()->json(['message' => 'Usuário não encontrado'], 404);
            }
        }

        $perPage = 50;
        $orders = $query->orderBy('created_at', 'asc')->paginate($perPage);

        $orders->getCollection()->transform(function ($order) {
            $order->user_name = $order->user->name; // Adiciona o nome do usuário ao pedido
            return $order;
        });

        // Garante que o JSON inclua as informações dos produtos e do nome do usuário
        return response()->json($orders);
    }

    public function updateStatus(Request $request, $orderId)
    {
        
        try {
            $status = $request->input('status');
            
            // Verifica se o status foi fornecido
            if (!$status) {
                return response()->json(['message' => 'Status é obrigatório'], 400);
            }

            // Validação de entrada
            if (!in_array($status, ['aberto', 'entregue', 'cancelado', 'solicitando cancelamento'])) {
                return response()->json(['message' => 'Status inválido'], 400);
            }

            $order = Pedido::where('id', $orderId)->first();

            if ($order) {
                $order->status = $status;
                
                $order->save();
                
                Log::info('Status atualizado pelo APP: ' . $status);
                
                return response()->json(['message' => 'Status alterado com sucesso'], 200);
            } else {
                return response()->json(['message' => 'Nenhum pedido encontrado'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar status', 'error' => $e->getMessage()], 500);
        }
    }

    public function createOrder(Request $request)
    {
        $user = $request->user();

        DB::beginTransaction();

        try {
            // Verificar se o usuário tem itens no carrinho
            $cartItems = CartProduct::where('user_id', $user->id)->get();

            if ($cartItems->isEmpty()) {
                return response()->json(['message' => 'Carrinho vazio'], 400);
            }

            // Criar o pedido
            $order = new Order();
            $order->brand = $request->input('brand');
            $order->order_number = $request->input('order_number');
            $order->observation = $request->input('observation');
            $order->status = 'aberto'; // Status inicial
            $order->delivery_forecast = $request->input('delivery_forecast');
            $order->user_id = $user->id;
            $order->save();

            // Mover itens do carrinho para a tabela order_items
            foreach ($cartItems as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item->product_id;
                $orderItem->user_id = $user->id;
                $orderItem->quantity = $item->quantity;
                $orderItem->image_client = $item->image_client; // Copia a imagem do cliente
                $orderItem->save();
            }

            // Limpar o carrinho do usuário
            CartProduct::where('user_id', $user->id)->delete();

            DB::commit();

            return response()->json(['message' => 'Pedido criado com sucesso!', 'order' => $order], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Erro ao criar o pedido', 'error' => $e->getMessage()], 500);
        }
    }

    //USADO NO SISTEMA CRHONOS
    /*  public function getItensOrders(Request $request)
    {
    $query = Order::with(['itens.product', 'user']); // Carrega os produtos junto com os itens do pedido e o usuário

    if ($request->has('order_number') && !is_null($request->input('order_number'))) {
    $reference = $request->input('order_number');
    $query->where('order_number', $reference);
    }

    $perPage = 50;
    $orders = $query->orderBy('created_at', 'asc')->paginate($perPage);

    $orders->getCollection()->transform(function ($order) {
    $order->user_name = $order->user->name; // Adiciona o nome do usuário ao pedido
    return $order;
    });

    // Garante que o JSON inclua as informações dos produtos e do nome do usuário
    return response()->json($orders);
    } */

    public function getItensOrders(Request $request)
    {
        $query = Order::with(['itens.product', 'user']); // Carrega os produtos junto com os itens do pedido e o usuário

        if ($request->has('order_number') && !is_null($request->input('order_number'))) {
            $reference = $request->input('order_number');
            $query->where('order_number', $reference);
        }

        $orders = $query->orderBy('created_at', 'asc')->get(); // Obtém todos os pedidos sem paginação

        // Mapeia os pedidos para o formato desejado
        $formattedOrders = $orders->map(function ($order) {
            return [
                'id' => $order->id,
                'brand' => $order->brand,
                'order_number' => $order->order_number,
                'observation' => $order->observation,
                'user_id' => $order->user_id,
                'user_name' => $order->user->name,
                'itens' => $order->itens->map(function ($item) {
                    return [
                        'quantity' => $item->quantity,
                        'belt_color' => $item->belt_color,
                        'reference' => $item->product->reference,
                        'gender' => $item->product->gender,
                        'image' => $item->product->image,
                    ];
                }),
            ];
        });

        // Garante que o JSON inclua as informações dos produtos e do nome do usuário
        return response()->json($formattedOrders);
    }

}
