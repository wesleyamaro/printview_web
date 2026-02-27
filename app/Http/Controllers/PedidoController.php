<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;


use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response; // Importa a classe Response do pacote Symfony

class PedidoController extends Controller
{
   // Método buscar produto por referência - V2
  /*   public function getByPedido($nmodelo)
    {
        // Tenta encontrar o produto por referência
        $pedido = Pedido::with('itemPedidos')->where('pedido_modelo', $nmodelo)->first();

        // Se não encontrou o produto, retorna um erro
        if (!$pedido) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        // Retorna o pedido encontrado com os itens do pedido
        return response()->json($pedido);
    } */
    
    public function getByPedidoId($id)
    {
        // Tenta encontrar o pedido por referência, carregando as relações necessárias
        $pedido = Pedido::with(['itemPedidos.produto', 'marca', 'usuario'])->where('id', $id)->first();
    
        // Se não encontrou o pedido, retorna um erro
        if (!$pedido) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }
    
        // Retorna o pedido encontrado com os itens do pedido, nome da marca e nome do usuário
        return response()->json($pedido);
    }

    public function getByPedidoV2($nmodelo)
    {
        // Tenta encontrar o pedido por referência, carregando as relações necessárias
        $pedido = Pedido::with(['itemPedidos.produto', 'marca', 'usuario'])->where('pedido_modelo', $nmodelo)->first();
    
        // Se não encontrou o pedido, retorna um erro
        if (!$pedido) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }
    
        // Retorna o pedido encontrado com os itens do pedido, nome da marca e nome do usuário
        return response()->json($pedido);
    }
    
     public function getByPedidoV3($nmodelo)
    {   
        // Tenta encontrar o pedido por referência, carregando as relações necessárias
         $pedido = Pedido::where('pedido_modelo', $nmodelo)->first();

        // Se não encontrou o pedido, retorna um erro
        if (!$pedido) {
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }
    
        // Retorna o pedido encontrado com os itens do pedido, nome da marca e nome do usuário
        return response()->json($pedido);
    }
    
     public function getByPedidoV4($nmodelo)
    {   
        // Tenta encontrar o pedido por referência, carregando as relações necessárias
         //$pedido = Pedido::with(['itemPedidos.produto','usuario'])->where('pedido_modelo', $nmodelo)->first();
         $pedido = Pedido::with(['itemPedidos.produto', 'users'])->where('pedido_modelo', $nmodelo)->first();

        // Se não encontrou o pedido, retorna um erro
        if (!$pedido) {
            //return response()->json(['message' => 'Pedido não encontrado'], 404);
            return response()->json([]);
        }
    
        // Retorna o pedido encontrado com os itens do pedido, nome da marca e nome do usuário
        return response()->json($pedido);
    }
    
}
