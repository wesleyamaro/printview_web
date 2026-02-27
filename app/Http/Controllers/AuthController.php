<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator; // Para validação


class AuthController extends Controller
{
    //Register user
    //BLOQUEIO DE REGISTER NO APP POR SEGURANÇA - SE QUISER LIBERAR TEM QUE DESCOMENTAR ISSO
    /*public function register(Request $request)
    {
        // Validação dos dados recebidos
        $attrs = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
    
        // Criando o usuário
        $user = User::create([
            'name' => $attrs['name'],
            'email' => $attrs['email'],
            'password' => bcrypt($attrs['password']),
            'bloqueio' => 1, // Inicia o cliente bloqueado
        ]);
    
        // Buscando as permissões do usuário (se aplicável)
        // Verifique se você já tem esse relacionamento ou como define as permissões
        $permissions = $user->permissions ?? [];  // Ajuste esse trecho conforme a sua implementação
    
        // Retornando os dados do usuário e o token gerado
        return response([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'profile_photo_path' => $user->profile_photo_path, // Certifique-se de que o campo existe
                'bloqueio' => $user->bloqueio,
                'permissions' => $permissions,
            ],
            'token' => $user->createToken('secret')->plainTextToken,
        ]);
    }*/


    public function login(Request $request)
    {
        Log::info('iniciou login!'); 
        // Validação dos campos de entrada
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Tentativa de autenticação
        if (!Auth::attempt($attrs)) {
            return response()->json([
                'message' => 'Credenciais inválidas.',
            ], 403);
            Log::error('Erro ao fazer login! Credenciais invalidas'); // Adicione esta linha para verificar o usuário
        }

        // Usuário autenticado
        $user = auth()->user();
        
        if($user->bloqueio == 1){
            return response()->json([
                'message' => 'Usuário bloqueado.',
            ], 403);
            Log::error('Erro ao fazer login! Usuario bloqueado'); // Adicione esta linha para verificar o usuário
        }

        // Gerar token de acesso
        $token = $user->createToken('secret')->plainTextToken;

        // Recuperar permissões do usuário
        $permissions = $user->regras->pluck('nome');

        // Retornar dados do usuário, token e permissões
        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'profile_photo_path' => $user->profile_photo_path, // Certifique-se de que o campo existe no seu modelo de usuário
                'bloqueio' => $user->bloqueio,
                'permissions' => $permissions,
            ],
            'token' => $token,
        ], 200);
        
        Log::info('login sucesso!'. $user->name); // Adicione esta linha para verificar o usuário
    }


    /* public function getUserPermissions()
    {
    $user = Auth::user();
    $permissions = $user->permissions; // Assumindo que o modelo User tenha um relacionamento de permissões

    return response()->json([
    'user' => $user,
    'permissions' => $permissions,
    ]);
    } */

    public function getUserPermissions()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuário não autenticado.',
            ], 401);
        }
       

        $permissions = $user->permissions()->pluck('nome'); // Extrai apenas as regras de permissão
        
         
        if($user->bloqueio == 1){
            $permissions = [];
            return response()->json([
                'message' => 'Usuário bloqueado.',
            ], 403);
        }

        return response()->json([
            'permissions' => $permissions,
        ]);
    }

    public function refreshPermissions(Request $request)
    {
        $user = auth()->user(); // Recupera o usuário autenticado com base no token
        //Log::info(auth()->user()); // Adicione esta linha para verificar o usuário
        $permissions = $user->permissions->pluck('nome'); // Recupera as permissões
        
        /* if($user->bloqueio == 1){
            $permissions = [];
            return response()->json([
                'message' => 'Usuário bloqueado.',
            ], 403);
        }*/
        
        Log::info($permissions); // Adicione esta linha para verificar o usuário
        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'profile_photo_path' => $user->profile_photo_path,
                'bloqueio' => $user->bloqueio,
                'permissions' => $permissions,
            ],
        ], 200);
    }
    
    
    
    //BLOQUEIO E LIBERACAO USUARIOS
    public function updateStatus(Request $request, User $user)
    {
        // 1. Validação da Requisição
        $validator = Validator::make($request->all(), [
            'isDisable' => 'required|integer|in:0,1', // 'isDisable' é o nome do campo enviado pelo Flutter
        ], [
            'isDisable.required' => 'O campo status é obrigatório.',
            'isDisable.integer' => 'O status deve ser um número inteiro.',
            'isDisable.in' => 'O status deve ser 0 (ativo) ou 1 (bloqueado).',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ], 422); // 422 Unprocessable Entity para erros de validação
        }

        // 2. Atualiza o campo 'bloqueio' no banco de dados
        // Mapeia 'isDisable' do Flutter para 'bloqueio' no Laravel
        try {
            $user->bloqueio = $request->input('isDisable');
            $user->save();

            // 3. Retorna uma resposta de sucesso
            return response()->json([
                'message' => 'Status do usuário atualizado com sucesso.',
                'user' => $user->only(['id', 'name', 'email', 'bloqueio']) // Retorna apenas dados relevantes
            ], 200); // 200 OK para sucesso
        } catch (\Exception $e) {
            // Logar o erro para depuração
            \Log::error("Erro ao atualizar status do usuário {$user->id}: " . $e->getMessage());
            return response()->json([
                'message' => 'Erro interno do servidor ao atualizar o status.',
                'error' => $e->getMessage()
            ], 500); // 500 Internal Server Error em caso de exceção
        }
    }

    //Logout user
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout success.',
        ], 200);
    }

    //get user details
    public function user()
    {
        return response([
            'user' => auth()->user(),
        ], 200);
    }
}
