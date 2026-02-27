<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\Regra;
use Illuminate\Support\Facades\Gate;
use App\Models\User;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
      //USADA SOMENTE PRA LIBERAR UMA FUNCAO DE TESTE
      Gate::define('TESTE', function ($user, $permissao) {
        return $user->regras->contains('nome', 'TESTE');
      });
      
      //OCULTA A QUANTIDADE NOS PEDIDOS
      Gate::define('OCUTAR-QNDE-ITEM-PEDIDO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'OCUTAR QNDE ITEM PEDIDO');
      });

      Gate::define('PAGAMENTO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'PAGAMENTO');
      });

      Gate::define('ADMIN', function ($user, $permissao) {
        return $user->regras->contains('nome', 'ADMIN');
      });

      Gate::define('EDITOR', function ($user, $permissao) {
        return $user->regras->contains('nome', 'EDITOR');
      });
      
      Gate::define('EDIT-CLIENTE-PEDIDO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'EDITAR CLIENTE PEDIDO');
      });

      Gate::define('EDIT-USER', function ($user, $permissao) {
        return $user->regras->contains('nome', 'EDITAR USERS');
      });
      Gate::define('DELET-USER', function ($user, $permissao) {
        return $user->regras->contains('nome', 'DELETAR USERS');
      });
      Gate::define('LIST-USER', function ($user, $permissao) {
        return $user->regras->contains('nome', 'LISTA USERS');
      });
      
      //Ver logs de usuário no sistema
      Gate::define('LOG-USER', function ($user, $permissao) {
        return $user->regras->contains('nome', 'LOG USERS');
      });
     
      Gate::define('ALLPEDIDO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'VER TODOS - PEDIDOS');
      });
      
      Gate::define('ENTREGAR-PEDIDO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'ENTREGAR - PEDIDO');
      });
      
      Gate::define('IMPRIMIR-TODOS-PEDIDOS', function ($user, $permissao) {
            return $user->regras->contains('nome', 'IMPRIMIR TODOS PEDIDOS'); //Imprimi todos os pedidos com quantidade de itens e totaol de pares
        });

       //Pode enviar mais de uma imagem no mesmo pedido
      Gate::define('MULTIPLE-UPLOAD', function ($user, $permissao) {
        return $user->regras->contains('nome', 'ENVIAR - MULTIPLAS IMG PEDIDO');
      });
      
      Gate::define('QNDE-MAISVENDIDOS', function ($user, $permissao) {
        return $user->regras->contains('nome', 'QNDE - MAIS VENDIDOS');
      });
      
      Gate::define('VALOR-CART', function ($user, $permissao) {
        return $user->regras->contains('nome', 'VALOR - CART');
      });
      
      Gate::define('CORREIA-PEDIDO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'CORREIA - PEDIDO');
      });


      Gate::define('MENU', function ($user, $permissao) {
        return $user->regras->contains('nome', 'MENU');
      });
      Gate::define('MENU-MAIS-VENDIDO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'MENU - MAIS VENDIDO');
      });
      Gate::define('MENU-NOVIDADE', function ($user, $permissao) {
        return $user->regras->contains('nome', 'MENU - NOVIDADE');
      });
      Gate::define('MENU-PRODUTOS', function ($user, $permissao) {
        return $user->regras->contains('nome', 'MENU - PRODUTO');
      });
      Gate::define('MENU-CARRINHO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'MENU - CARRINHO');
      });
      Gate::define('MENU-PEDIDO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'MENU - PEDIDO');
      });
      Gate::define('MENU-CADASTRO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'MENU - CADASTRO');
      });
      Gate::define('MENU-GERENCIAR-USER', function ($user, $permissao) {
        return $user->regras->contains('nome', 'MENU - GERENCIAR USER');
      });

      

      //SUB MENUS
      Gate::define('SUBMENU-TRANSFER', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - TRANSFER');
      });
      Gate::define('SUBMENU-TERMOPATCH', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - TERMOPATCH');
      });
      Gate::define('SUBMENU-SINTETICO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - SINTETICO');
      });

      Gate::define('SUBMENU-TOP-CLIENTE', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - TOP CLIENTE');
      });

      Gate::define('SUBMENU-BLOQUEIO-REFERENCIA', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - BLOQUEIO REFERENCIA');
      });
      Gate::define('SUBMENU-LIBERAR-MARCA', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - LIBERAR MARCA');
      });

      Gate::define('SUBMENU-PERMISSAO-SISTEMA', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - PERMISSAO SISTEMA');
      });
      Gate::define('SUBMENU-BLOQUEIO-USER', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - BLOQUEIO USER');
      });

      Gate::define('SUBMENU-LIBERAR-CLIENTE', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - LIBERAR CLIENTE');
      });

      //CREATES
      Gate::define('SUBMENU-CREATE-MARCA', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - CADASTRAR MARCA');
      });
      Gate::define('SUBMENU-CREATE-FILTRO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - CADASTRAR FILTRO');
      });
      Gate::define('SUBMENU-CREATE-TRANSFER', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - CADASTRAR TRANSFER');
      });
      Gate::define('SUBMENU-CREATE-TERMOPATCH', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - CADASTRAR TERMOPATCH');
      });
      

      Gate::define('SUBMENU-REGISTRAR-USER', function ($user, $permissao) {
        return $user->regras->contains('nome', 'SUBMENU - REGISTRAR USUÁRIO');
      });

      //CREATES, EDIT E DELETE
      Gate::define('DEL-PEDIDO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'DELETAR - PEDIDO');
      });
      Gate::define('EDIT-PEDIDO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'EDITAR PEDIDO');
      });
      Gate::define('EDIT-STATUS-PEDIDO', function ($user, $permissao) {
        return $user->regras->contains('nome', 'EDITAR STATUS PEDIDO');
      });
      
      
      Gate::define('DEL-TRANSFER', function ($user, $permissao) {
        return $user->regras->contains('nome', 'DELETAR - TRANSFER');
      });
      Gate::define('EDIT-TRANSFER', function ($user, $permissao) {
        return $user->regras->contains('nome', 'EDITAR - TRANSFER');
      });
      Gate::define('EDIT-MARCA', function ($user, $permissao) {
        return $user->regras->contains('nome', 'EDITAR - MARCA');
      });
      Gate::define('DEL-MARCA', function ($user, $permissao) {
        return $user->regras->contains('nome', 'DELETAR - MARCA');
      });
      Gate::define('EDIT-TERMOPATCH', function ($user, $permissao) {
        return $user->regras->contains('nome', 'EDITAR - TERMOPATCH');
      });
      Gate::define('DEL-TERMOPATCH', function ($user, $permissao) {
        return $user->regras->contains('nome', 'DELETAR - TERMOPATCH');
      });
      
      Gate::define('MULTIFILTER', function ($user, $permissao) {
        return $user->regras->contains('nome', 'FILTRO MULTIPLO');
      });
      
      
      
       //PREFEITURA - INICIO
      Gate::define('PREFEITURA', function ($user, $permissao) {
        return $user->regras->contains('nome', 'PREFEITURA');
      });
      //PREFEITURA - FIM
      
    }
}
