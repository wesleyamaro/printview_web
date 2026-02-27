<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProdutoController; // Adicionei a referência ao ProductsController
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PermissionController;

use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware(['guest:'.config('fortify.guard')])
    ->name('password.email');






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
Route::post('login', function(Request $request){
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if(!auth()->attempt($credentials)){
        return response()->json(['message' => 'Invalid credentials'], 401); 
         
         Log::info('Login ou senha invalidos');

    }

    $token = auth()->user()->createToken('authToken')->plainTextToken;
    \Log::info('Login Aprovado');
    return response()->json(['token' => $token]);

});*/
Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/user/permissions', [AuthController::class, 'getUserPermissions']);
Route::get('/refresh-permissions', [AuthController::class, 'refreshPermissions'])->middleware('auth:sanctum');

Route::put('/users/{user}/status', [AuthController::class, 'updateStatus']);

    

Route::get('/products', [ProductController::class, 'index'])->middleware('auth:sanctum');

//Mais vendidos
Route::get('/maisvendidos', [ProductController::class, 'getProdutosMaisVendidos'])->middleware('auth:sanctum');


//Novidades
Route::get('/novidades', [ProductController::class, 'novidades'])->middleware('auth:sanctum');



Route::post('/cart/{id}', [ProductController::class, 'addCart'])->middleware('auth:sanctum');

Route::put('/cart/{id}', [CartController::class, 'update'])->middleware('auth:sanctum');



Route::get('/cart', [CartController::class, 'index'])->middleware('auth:sanctum');

Route::delete('/cart/{id}', [CartController::class, 'destroy'])->middleware('auth:sanctum');

Route::delete('/cart', [CartController::class, 'destroyAllCart'])->middleware('auth:sanctum'); //deletar todo o carrinho

Route::post('/upload', [CartController::class, 'uploadCustomImages'])->middleware('auth:sanctum'); // Upload de imagens personalizadas para o carrinho

Route::put('/updatelote', [CartController::class, 'updateLote'])->middleware('auth:sanctum'); // Update em lote




Route::get('/order', [OrderController::class, 'index'])->middleware('auth:sanctum'); //Exibe os pedidos
Route::put('/update-status-order/{id}', [OrderController::class, 'updateStatus'])->middleware('auth:sanctum'); //Atualiza o status de um pedido



Route::get('/filtros', [FilterController::class, 'index']);
//Route::get('/brand', [BrandController::class, 'index']);

Route::get('/brands', [BrandController::class, 'index'])->middleware('auth:sanctum');

Route::post('/brandUser', [BrandController::class, 'brandUser'])->middleware('auth:sanctum');

//Adicionar ou remover marcas user
Route::post('/associarBrandUser', [BrandController::class, 'associarBrandUser'])->middleware('auth:sanctum');
Route::post('/desassociarBrandUser', [BrandController::class, 'desassociarBrandUser'])->middleware('auth:sanctum'); 



//PERMISSOES USUARIOS
Route::post('/permissaoUser', [PermissionController::class, 'permissaoUser'])->middleware('auth:sanctum');

//Adicionar ou remover marcas user
Route::post('/associarPermissaoUser', [PermissionController::class, 'associarPermissaoUser'])->middleware('auth:sanctum');
Route::post('/desassociarPermissaoUser', [PermissionController::class, 'desassociarPermissaoUser'])->middleware('auth:sanctum'); 




Route::get('/users', [ClienteController::class, 'index'])->middleware('auth:sanctum');

//CREATE PEDIDO
Route::post('/confirmarorder', [CartController::class, 'confirmarPedido'])->middleware('auth:sanctum');

/*
Route::post('login', function(Request $request){
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if(!auth()->attempt($credentials)){
        \Log::info('Login ou senha invalidos');
        return response()->json(['message' => 'Invalid credentials'], 401);
    }else{
          $token = auth()->user()->createToken('authToken')->plainTextToken;
        \Log::info('Login Aprovado');
    return response()->json(['token' => $token, 'message' => 'Login successful']);
    }

});*/

//Consultar transfers
Route::get('/produto/index', [ProdutoController::class, 'index'])->middleware('auth:sanctum');


Route::get('/produtos/search', [ProdutoController::class, 'search'])->middleware('auth:sanctum');

Route::post('/autenticar', [Controller::class, 'autenticar'])->middleware('auth:sanctum');

Route::get('/produtos/searchProduto', [ProdutoController::class, 'searchProduto'])->middleware('auth:sanctum');




//CONSULTAS APIs V2
Route::get('/v2/produtos', [ProdutoController::class, 'getByReference'])->middleware('auth:sanctum');
Route::get('/v2/marcas', [Controller::class, 'getAllBrands'])->middleware('auth:sanctum'); //Exibe as marcas


Route::get('/v2/produtos/{id}', [ProdutoController::class, 'getByReference'])->middleware('auth:sanctum'); //Exibe um produto específico

Route::get('/v2/pedidos/{id}', [PedidoController::class, 'getByPedidoV2'])->middleware('auth:sanctum'); //Exibe um produto específico



//NOVO CRHONOS
Route::get('/v5/pedidos/{id}', [PedidoController::class, 'getByPedidoId'])->middleware('auth:sanctum'); //Busca por ID no novo chronos





Route::get('/v3/pedidos/{id}', [PedidoController::class, 'getByPedidoV3'])->middleware('auth:sanctum'); //Exibe um produto específico
Route::get('/v4/pedidos/{id}', [PedidoController::class, 'getByPedidoV4'])->middleware('auth:sanctum'); //Exibe um produto específico

Route::get('/v4/users/{id}', [Controller::class, 'getUserId'])->middleware('auth:sanctum'); //Exibe um user específico
Route::get('/v2/users', [Controller::class, 'getUserAll'])->middleware('auth:sanctum'); //Exibe um user específico

Route::get('/v2/clientes', [Controller::class, 'getAllCliente'])->middleware('auth:sanctum'); //Carrega a lista de clientes
Route::get('/v4/clientes', [ClienteController::class, 'getAllCliente'])->middleware('auth:sanctum'); //Carrega a lista de clientes







Route::get('/version', function () {
    return response()->json([
        'version' => '1.0.3',
        'mandatory' => false,
        'android_url' => 'https://play.google.com/store/apps/details?id=seu.app',
        'ios_url' => 'https://play.google.com/store/apps/details?id=seu.app'
    ]);
});



