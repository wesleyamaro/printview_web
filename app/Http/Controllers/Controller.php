<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Marca;

use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
   
   public function autenticar(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            $token = $user->createToken('LaravelAuthApp')->accessToken;
             \Log::info('autenticado.');
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
             \Log::info('nao autenticado');
        }
        \Log::info('Consulta recebida no método search.');
    }
    
    
        public function getAllBrands()
    {
        // Tenta encontrar o pedido por referência, carregando as relações necessárias
        $marcas = Marca::get(); //Obtem as marcas

        // Se não encontrou, retorna um erro
        if (!$marcas) {
            return response()->json(['message' => 'Marca não encontrado'], 404);
        }

        // Retorna o pedido encontrado com os itens do pedido, nome da marca e nome do usuário
        return response()->json($marcas);
    }
    
    
    public function getUserId($id)
    {   

         $user = User::where('id', $id)->first();

        // Se não encontrou o user, retorna um erro
        if (!$user) {
            return response()->json(['message' => 'Usuario não encontrado'], 404);
        }
    
        // Retorna o pedido encontrado com os itens do pedido, nome da marca e nome do usuário
        return response()->json($user);
    }
    
    
    //Usado pra obter a lista de clientes pra o Chronos
    public function getUserAll()
    {
        // Tenta encontrar o pedido por referência, carregando as relações necessárias
        $users = User::where('bloqueio', 0)->where('tipo_user', 'CLIENTE')->get(); //Obtem apenas os que n esta bloqueado e e PRINT
    
        // Se não encontrou o pedido, retorna um erro
        if (!$users) {
            return response()->json(['message' => 'Clientes não encontrado'], 404);
        }
    
        // Retorna o pedido encontrado com os itens do pedido, nome da marca e nome do usuário
        return response()->json($users);
    }
    
    
    
    /*
  public function autenticar(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()->first()], 400);
    }

    $credentials = $request->only('email', 'password');

    // Adicione uma verificação para garantir que as credenciais sejam válidas
    if (!Auth::attempt($credentials)) {
        return response()->json(['error' => 'Credenciais inválidas'], 401);
    }

    // Authentication passed...
    $user = Auth::user();
    $token = $user->createToken('LaravelAuthApp')->accessToken;

    return response()->json(['token' => $token], 200);
}*/

}
