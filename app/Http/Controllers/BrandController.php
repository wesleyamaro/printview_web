<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\User;
use App\Models\BrandUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class BrandController extends Controller
{
    public function index(Request $request)
    {
        $query = BrandUser::join('marcas', 'brand_users.brand_id', '=', 'marcas.id')
            ->where('brand_users.user_id', auth()->id())
            ->orderBy('marcas.referencia', 'asc')
            ->select('marcas.id as brand_id', 'marcas.descricao as brand_descricao') // Select only the ID and description from 'marcas'
            ->get();
    
        return response()->json([
            'brands' => $query,
        ]);
    }
    
    /*
    public function brandUser(Request $request)
    {
        $user = auth()->user();

        // If no user is authenticated, return an appropriate error.
        if (!$user) {
            return response()->json(['message' => 'User not authenticated.'], 401);
        }

        // Get IDs of brands directly associated with the authenticated user
        $associatedBrandIds = $user->brands()->pluck('marcas.id');

        // Get brands directly associated with the authenticated user
        $associatedBrands = $user->brands()
                                 ->select('marcas.id as brand_id', 'marcas.descricao as brand_descricao')
                                 ->orderBy('marcas.referencia', 'asc')
                                 ->get();

        // Get all brands that are NOT associated with the authenticated user
        $notAssociatedBrands = Marca::whereNotIn('id', $associatedBrandIds)
                                  ->select('id as brand_id', 'descricao as brand_descricao')
                                  ->orderBy('referencia', 'asc')
                                  ->get();

        return response()->json([
            'associatedBrands' => $associatedBrands,
            'brandsNotAssociated' => $notAssociatedBrands, // Renamed for clarity
        ]);
    }*/
    
    /*public function brandUser(Request $request)
    {
        $user = auth()->user();

        // If no user is authenticated, return an appropriate error.
        if (!$user) {
            return response()->json(['message' => 'User not authenticated.'], 401);
        }

        // Get IDs of brands directly associated with the authenticated user
        // We pluck the IDs first to use them for the 'not associated' query
        $associatedBrandIds = $user->brands()->pluck('marcas.id');

        // Get brands directly associated with the authenticated user
        // Explicitly select only the 'id' and 'descricao' from the 'marcas' table.
        // By not selecting any pivot table columns, the 'pivot' attribute will not appear.
        $associatedBrands = $user->brands()
                                 ->select('marcas.id as brand_id', 'marcas.descricao as brand_descricao')
                                 ->orderBy('marcas.referencia', 'asc')
                                 ->get();

        // Get all brands that are NOT associated with the authenticated user
        $notAssociatedBrands = Marca::whereNotIn('id', $associatedBrandIds)
                                  ->select('id as brand_id', 'descricao as brand_descricao')
                                  ->orderBy('referencia', 'asc')
                                  ->get();

        return response()->json([
            'associatedBrands' => $associatedBrands,
            'brandsNotAssociated' => $notAssociatedBrands,
        ]);
    }*/
    
    /* Funciona porem no user autenticado
    public function brandUser(Request $request)
    {
        $user = auth()->user();

        // If no user is authenticated, return an appropriate error.
        if (!$user) {
            return response()->json(['message' => 'User not authenticated.'], 401);
        }

        // Get IDs of brands directly associated with the authenticated user
        // We pluck the IDs first to use them for the 'not associated' query
        $associatedBrandIds = $user->brands()->pluck('marcas.id');

        // Get brands directly associated with the authenticated user
        // Explicitly select only the 'id' and 'descricao' from the 'marcas' table.
        // By not selecting any pivot table columns, the 'pivot' attribute will not appear.
        $associatedBrands = $user->brands()
                                 ->select('marcas.id as brand_id', 'marcas.descricao as brand_descricao')
                                 ->orderBy('marcas.referencia', 'asc')
                                 ->get();

        // Get all brands that are NOT associated with the authenticated user
        $notAssociatedBrands = Marca::whereNotIn('id', $associatedBrandIds)
                                  ->select('id as brand_id', 'descricao as brand_descricao')
                                  ->orderBy('referencia', 'asc')
                                  ->get();

        return response()->json([
            'associatedBrands' => $associatedBrands,
            'brandsNotAssociated' => $notAssociatedBrands,
        ]);
    }*/
    public function brandUser(Request $request)
    { 
        // 1. Validar e obter o email da requisição
        

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
        $associatedBrandIds = $user->brands()->pluck('marcas.id');

        // Get brands directly associated with the user found by email
        $associatedBrands = $user->brands()
                                 ->select('marcas.id as brand_id', 'marcas.descricao as brand_descricao')
                                 ->where('marcas.id','<>', 99999)
                                 ->where('isCliente', false)
                                 ->orderBy('marcas.descricao', 'asc')
                                 ->get();

        // Get all brands that are NOT associated with the user found by email
        $notAssociatedBrands = Marca::whereNotIn('id', $associatedBrandIds)
                                     ->select('id as brand_id', 'descricao as brand_descricao', 'isCliente as is_cliente')
                                     ->where('id','<>', 99999)
                                     ->where('isCliente', false)
                                     ->orderBy('descricao', 'asc')
                                     ->get();

        return response()->json([
            'associatedBrands' => $associatedBrands,
            'brandsNotAssociated' => $notAssociatedBrands,
        ]);
    }
    
    /*
    // Associar marca ao usuário
    public function associarBrandUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'brand_id' => 'required|exists:marcas,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $brandId = $request->brand_id;
        
        Log::info('MARCA ASSOCIADA: '.$user . ' Marca: '.$brandId);
        //return response()->json('Usuario encontrado: '.$user . ' Marca: '.$brandId);

        // Já está associado?
        if ($user->brands()->where('brand_id', $brandId)->exists()) {
            return response()->json(['message' => 'Essa marca já está associada ao usuário.'], 409);
        }

        $user->brands()->attach($brandId);

        return response()->json(['message' => 'Marca associada com sucesso!'], 200);
    }

    // Desassociar marca do usuário
    public function desassociarBrandUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'brand_id' => 'required|exists:marcas,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $brandId = $request->brand_id;
        
        Log::info('MARCA DESASSOCIADA: '.$user . ' Marca: '.$brandId);
        
        //return response()->json('Usuario encontrado: '.$user . ' Marca: '.$brandId);

        // Verifica se a marca tá mesmo associada
        if (! $user->brands()->where('brand_id', $brandId)->exists()) {
            return response()->json(['message' => 'Essa marca não está associada a esse usuário.'], 404);
        }

        $user->brands()->detach($brandId);

        return response()->json(['message' => 'Marca desassociada com sucesso!'], 200);
    }
    
    */
    
    public function associarBrandUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'brand_ids' => 'required|array',
            'brand_ids.*' => 'exists:marcas,id',
        ]);
    
        $user = User::findOrFail($request->user_id);
        $brandIds = $request->brand_ids;
    
        // Remove duplicatas que já estão associadas
        $brandIdsToAssociate = array_diff($brandIds, $user->brands()->pluck('brand_id')->toArray());
    
        $user->brands()->attach($brandIdsToAssociate);
    
        return response()->json(['message' => 'Marcas associadas com sucesso!'], 200);
    }
    
    public function desassociarBrandUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'brand_ids' => 'required|array',
            'brand_ids.*' => 'exists:marcas,id',
        ]);
    
        $user = User::findOrFail($request->user_id);
        $brandIds = $request->brand_ids;
    
        $user->brands()->detach($brandIds);
    
        return response()->json(['message' => 'Marcas desassociadas com sucesso!'], 200);
    }


}
