<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/* use App\Livewire\Admin\PermissaoUser; */

use App\Livewire\Users\PermissaoSistema;
use App\Livewire\Users\TopCliente;
use App\Livewire\Users\LiberarMarca;
use App\Livewire\Users\BloquearReferencia;
use App\Livewire\Cadastros\Filtros;
use App\Livewire\Cadastros\Marcas;
use App\Livewire\Cadastros\CreateTransfer;
use App\Livewire\Produtos\TransferTable;
use App\Livewire\Produtos\MaisVendidos;
use App\Livewire\CarrinhoCompra;
/* use App\Livewire\Pedidos; */
use App\Livewire\Novidades;
use App\Livewire\Pedidos\PedidoTable;
use App\Livewire\Users\BloqueioUser;
use App\Livewire\Users\LiberarCliente;
use App\Livewire\Users\RegistrarUser;

use App\Livewire\Produtos\TermopatchTable;
use App\Livewire\Cadastros\CreateTermopatch;

use App\Livewire\Users\LogUsers;
use App\Livewire\Users\UsersTable;

use App\Livewire\Users\PagamentoSistema;

use App\Livewire\Prefeitura\CarrinhoPrefeitura;
use App\Livewire\Prefeitura\PedidosPrefeitura;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/privacidade', function () {
        return view('politicade-privacidade-printview');
    })->name('privacidade');
    

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    /* Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); */

 

     
    
    
    /* Route::middleware('can:MENU,null')->group(function () {
        Route::get('/', Novidades::class)->name('novidades');
    }); */

    Route::middleware('can:PAGAMENTO,null')->group(function () {
        Route::get('/pagamentos', PagamentoSistema::class)->name('pagamentos');
    });

    Route::middleware('can:MENU-PEDIDO,null')->group(function () {
        Route::get('/', PedidoTable::class)->name('pedidos');
    });

 
    Route::middleware('can:MENU-NOVIDADE,null')->group(function () {
        /*Route::get('/', Novidades::class)->name('novidades');*/
        Route::get('/novidades', Novidades::class)->name('novidades');
    });

    Route::middleware('can:MENU-CARRINHO,null')->group(function () {
        Route::get('/carrinho-compra', CarrinhoCompra::class)->name('carrinho_compra');
    });   

    Route::middleware('can:MENU-PEDIDO,null')->group(function () {
        Route::get('/pedidos', PedidoTable::class)->name('pedidos');
    });

    Route::middleware('can:MENU-MAIS-VENDIDO,null')->group(function () {
        Route::get('/mais-vendido', MaisVendidos::class)->name('mais_vendido');
    });

    Route::middleware('can:SUBMENU-TRANSFER,null')->group(function () {
        /* Route::get('/produtos/transfer', TransferTable::class)->name('produto_transfer'); */
        Route::get('/produtos/{tipo}', TransferTable::class)->name('produtos');
    });

    Route::middleware('can:SUBMENU-TOP-CLIENTE,null')->group(function () {
        Route::get('/top-cliente', TopCliente::class)->name('top_cliente');
    });

    Route::middleware('can:SUBMENU-BLOQUEIO-REFERENCIA,null')->group(function () {
        Route::get('/users/bloquear-referencia', BloquearReferencia::class)->name('bloquear_referencia');
    });
    Route::middleware('can:SUBMENU-LIBERAR-MARCA,null')->group(function () {
        Route::get('/users/liberar-marca', LiberarMarca::class)->name('liberar_marca');
    });

    Route::middleware('can:SUBMENU-PERMISSAO-SISTEMA,null')->group(function () {
        Route::get('/users/permissao-sistema', PermissaoSistema::class)->name('permissao_sistema');
    });

    Route::middleware('can:SUBMENU-BLOQUEIO-USER,null')->group(function () {
        Route::get('/users/bloqueio-user', BloqueioUser::class)->name('bloqueio_user');
    });

    //CREATES
    Route::middleware('can:SUBMENU-CREATE-FILTRO,null')->group(function () {
        Route::get('/cadastros/filtros', Filtros::class)->name('cadastro_filtros');
    });
    Route::middleware('can:SUBMENU-CREATE-MARCA,null')->group(function () {
        Route::get('/cadastros/marcas', Marcas::class)->name('cadastro_marcas');
    });
    Route::middleware('can:SUBMENU-CREATE-TRANSFER,null')->group(function () {
        Route::get('/cadastros/transfer', CreateTransfer::class)->name('cadastro_transfer');
    });
    
    Route::middleware('can:SUBMENU-CREATE-TERMOPATCH,null')->group(function () {
        Route::get('/cadastros/termopatch', CreateTermopatch::class)->name('cadastro_termopatch');
    });

 
    Route::middleware('can:SUBMENU-LIBERAR-CLIENTE,null')->group(function () {
        Route::get('/users/liberar-cliente', LiberarCliente::class)->name('liberar_cliente');
    });

    Route::middleware('can:SUBMENU-REGISTRAR-USER,null')->group(function () {
        Route::get('/users/registrar-user', RegistrarUser::class)->name('registrar_user');
    });
    
    Route::middleware('can:SUBMENU-TERMOPATCH,null')->group(function () {
        Route::get('/produtos/termopatch', TermopatchTable::class)->name('produto_termopatch');
        //Route::get('/produtos/{$tipo}', TransferTable::class)->name('produto_termopatch');
    });
    
    Route::middleware('can:LOG-USER,null')->group(function () {
        Route::get('/logs/user', LogUsers::class)->name('logs_user');
    });

    Route::middleware('can:LIST-USER,null')->group(function () {
        Route::get('/users/list', UsersTable::class)->name('list_user');
    });
    
    //PREFEIRA - INICIO
    Route::middleware('can:PREFEITURA,null')->group(function () {
        Route::get('/carrinho-prefeitura', CarrinhoPrefeitura::class)->name('carrinho_prefeitura');
    });
    Route::middleware('can:PREFEITURA,null')->group(function () {
        Route::get('/pedido-prefeitura', PedidosPrefeitura::class)->name('pedido_prefeitura');
    });




//ROTA EXIBIR REPORT
Route::get('/pedidos/report/{id}', [PedidoTable::class, 'configPrint'])->name('pedidos.report');

    //PREFEIRA - FIM
});
