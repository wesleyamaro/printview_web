<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Regra;
use App\Models\User;
use App\Models\RegraUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $query = RegraUser::join('regras', 'regra_users.regra_id', '=', 'regras.id')
            ->where('regra_users.user_id', auth()->id())
            ->orderBy('regras.nome', 'asc')
            ->select('regras.id as regra_id', 'regras.nome as regra_nome') // Select only the ID and description from 'marcas'
            ->get();
    
        return response()->json([
            'regras' => $query,
        ]);
    }
    
    /*public function permissaoUser(Request $request)
    { 
        // 1. User autenticado
        $userAuth = auth()->user();
        

        $email = $request->input('email');

        // 2. Encontrar o usuário com base no email
        $user = User::where('email', $email)->first();
        
        //return response()->json('Usuario encontrado: '.$user);

        // Se o usuário não for encontrado (embora a validação 'exists' já cuide disso, é bom ter uma checagem extra)
        if (!$user) {
            return response()->json(['message' => 'User not found with the provided email.'], 404);
        }

        // 3. O restante da lógica permanece o mesmo, mas agora usando o $user encontrado
        // Get IDs of brands directly associated with the user found by email
        $associatedRegraIds = $user->regras()->pluck('regras.id');

        // Get brands directly associated with the user found by email
        $associatedRegras = $user->regras()
                                 ->select('regras.id as regra_id', 'regras.label as regra_nome')
                                 ->where('regras.classe', 'cliente')
                                 ->orderBy('regras.nome', 'asc')
                                 ->get();

        // Get all brands that are NOT associated with the user found by email
        $notAssociatedRegras = Regra::whereNotIn('id', $associatedRegraIds)
                                     ->select('id as regra_id', 'label as regra_nome')
                                     ->where('regras.classe','cliente')
                                     ->orderBy('nome', 'asc')
                                     ->get();

        return response()->json([
            'associatedPermissoes' => $associatedRegras,
            'permissoesNotAssociated' => $notAssociatedRegras,
        ]);
    }*/
    
    public function permissaoUser(Request $request)
    {
        // 1. User autenticado
        $userAuth = Auth::user(); // Usando a fachada Auth para obter o usuário autenticado

        $email = $request->input('email');

        // 2. Encontrar o usuário com base no email
        $user = User::where('email', $email)->first();

        // Se o usuário não for encontrado (embora a validação 'exists' já cuide disso, é bom ter uma checagem extra)
        if (!$user) {
            return response()->json(['message' => 'User not found with the provided email.'], 404);
        }

        // Variável para controlar se o filtro de classe deve ser aplicado
        $shouldApplyClassFilter = true;

        // Se o usuário autenticado for admin@gmail.com, não aplicar o filtro de classe
        if ($userAuth && $userAuth->email === 'wesleyamaro5@gmail.com') {
            $shouldApplyClassFilter = false;
        }

        // 3. O restante da lógica permanece o mesmo, mas agora usando o $user encontrado
        // Get IDs of brands directly associated with the user found by email
        $associatedRegraIds = $user->regras()->pluck('regras.id');

        // Get brands directly associated with the user found by email
        $associatedRegrasQuery = $user->regras()
                                    ->select('regras.id as regra_id', 'regras.label as regra_nome');

        if ($shouldApplyClassFilter) {
            $associatedRegrasQuery->where('regras.classe', 'cliente');
        }

        $associatedRegras = $associatedRegrasQuery->orderBy('regras.nome', 'asc')->get();


        // Get all brands that are NOT associated with the user found by email
        $notAssociatedRegrasQuery = Regra::whereNotIn('id', $associatedRegraIds)
                                            ->select('id as regra_id', 'label as regra_nome');

        if ($shouldApplyClassFilter) {
            $notAssociatedRegrasQuery->where('regras.classe', 'cliente');
        }

        $notAssociatedRegras = $notAssociatedRegrasQuery->orderBy('nome', 'asc')->get();

        return response()->json([
            'associatedPermissoes' => $associatedRegras,
            'permissoesNotAssociated' => $notAssociatedRegras,
        ]);
    }
    
    
    // Associar regra ao usuário
    public function associarPermissaoUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'regra_id' => 'required|exists:regras,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $regraId = $request->regra_id;
        
        Log::info('REGRA ASSOCIADA: '.$user . ' Marca: '.$regraId);
        //return response()->json('Usuario encontrado: '.$user . ' Marca: '.$brandId);

        // Já está associado?
        if ($user->regras()->where('regra_id', $regraId)->exists()) {
            return response()->json(['message' => 'Essa regra já está associada ao usuário.'], 409);
        }

        $user->regras()->attach($regraId);

        return response()->json(['message' => 'Regra associada com sucesso!'], 200);
    }

    // Desassociar regra do usuário
    public function desassociarPermissaoUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'regra_id' => 'required|exists:regras,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $regraId = $request->regra_id;
        
        Log::info('REGRA DESASSOCIADA: '.$user . ' Marca: '.$regraId);
        
        //return response()->json('Usuario encontrado: '.$user . ' Marca: '.$brandId);

        // Verifica se a marca tá mesmo associada
        if (! $user->regras()->where('regra_id', $regraId)->exists()) {
            return response()->json(['message' => 'Essa regra não está associada a esse usuário.'], 404);
        }

        $user->regras()->detach($regraId);

        return response()->json(['message' => 'Marca desassociada com sucesso!'], 200);
    }

}
