<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response; // Importa a classe Response do pacote Symfony
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    
    public function index()
    {
        // Tenta encontrar o pedido por referência, carregando as relações necessárias
        $clientes = User::all();
    
        // Se não encontrou o pedido, retorna um erro
        if (!$clientes) {
            return response()->json(['message' => 'Clientes não encontrado'], 404);
        }
    
        // Retorna o pedido encontrado com os itens do pedido, nome da marca e nome do usuário
        //return response()->json($clientes);
        return response()->json([
            'users' => $clientes,
        ]);
    }
}
