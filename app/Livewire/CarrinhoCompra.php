<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Produto;
use App\Models\CarrinhoCompra as Carrinho;
use App\Models\Pedido;
use App\Models\ItemPedido;
use Illuminate\Support\Facades\DB;
use App\Models\TransferTable;
use Livewire\Attributes\On; 

use Livewire\Attributes\Rule; 
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use App\Models\UserAction;
use Illuminate\Support\Facades\Auth;

use WireUi\Traits\Actions;
/* use WireUi\Traits\WireUiActions; */

use Illuminate\Support\Facades\Storage;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use Intervention\Image\Facades\Image;


class CarrinhoCompra extends Component
{

 use Actions;
 /* use WireUiActions; */

 use WithFileUploads;

 public $tipoProduto = 'transfer'; // verifica o tipo de produto do carrinho

/* #[Rule('required|min:2')]  */
public $quantidade = []; // Initialize it as an empty array

public $produtos_carts; // Carrinho de compras

/* #[Rule('image', message: 'Apenas imagens são permitidas.')]
#[Rule('max:5024', message: 'O tamanho da imagem é maior do que o permitido.')]  */
public $imagens;

#[Rule('required|min:2')] 
public $marca;

#[Rule('required')] 
public $grupo;

#[Rule('required|min:4')] 
public $grade;

public $observacao;

public $correiacor = [];

/* #[Rule('required|min:2')]  */
public $prefeitura; // Usado para as prefeituras

public $medida = []; //Usado para os termopatchs

public $prefeitura_produto = []; //Usado para as prefeituras

public $valor_cart;

#[Rule('max:5024', message: 'O tamanho da imagem exede o permitido.')] 
public $imagem;

public $carrinho; // Itens do carrinho temporário

public $myModalimg = false;


 public $idproduto, $itemid;
 
public function clearImagem(){
    $this->imagem = null;
}
public function mount()
{
    $this->carregarQuantidade();
}

#[On('atualizarCart')] //Esse dispatch está vindo do TransferTable
public function carregarQuantidade()
{
    $itensCarrinho = Carrinho::where('user_id', auth()->id())
        ->with('produto')
        ->get();

    $this->quantidade = $itensCarrinho->pluck('quantidade', 'produto_id')->toArray();
    $this->correiacor = $itensCarrinho->pluck('correiacor', 'produto_id')->toArray();
    $this->medida = $itensCarrinho->pluck('medida', 'produto_id')->toArray();
    $this->prefeitura_produto = $itensCarrinho->pluck('prefeitura_produto', 'produto_id')->toArray();

    // Protege o acesso ao primeiro item
    $primeiroItem = $itensCarrinho->first();

    $this->tipoProduto = $primeiroItem?->produto?->tipo ?? null;

    //dd($this->tipoProduto);
}



/* public function carregarQuantidade(){
    // Busque quantidades iniciais do banco de dados usando seu modelo
    $initialQuantities = Carrinho::where('user_id', auth()->id())
        ->pluck('quantidade', 'produto_id')
        ->toArray();
        
         $initialCor = Carrinho::where('user_id', auth()->id())
        ->pluck('correiacor', 'produto_id')
        ->toArray();
        $initialMedida = Carrinho::where('user_id', auth()->id())
        ->pluck('medida', 'produto_id')
        ->toArray();

        $initialPre = Carrinho::where('user_id', auth()->id())
        ->pluck('prefeitura_produto', 'produto_id')
        ->toArray();

    // Inicialize a propriedade Livewire com quantidades buscadas
    $this->quantidade = $initialQuantities;
    
    $this->correiacor = $initialCor;
    $this->medida = $initialMedida;
    $this->prefeitura_produto = $initialPre;
} */

public $imageUrl = '';
public function openModal($imageUrl)
{
    $this->myModalimg = true;
    $this->imageUrl = $imageUrl;
    //abri imagem do pedido maior
}

//ADICIONAR PRODUTO AO CARRINHO -INICIO
public function imgCliente(){

}
public function updatedImagem(){
    
    $this->dialog()->confirm([
        'title' => 'Você está certo?',
        'description' => 'Adicionar imagem?',
        'icon' => 'question',
        'accept' => [
            'label' => 'Sim, adicionar minha imagem',
            'method' => 'adicionarAoCarrinho',
            'params' => 'Saved',
        ],
        'reject' => [
            'label' => 'Cancelar',
            'method' => 'cancel',
        ],
    ]);
}
public function cancel(){
    $this->imagem = null;

}



// Update cor correia inicio
public function updatedCorreiacor($value, $produtoId) {
 
    $user_id = auth()->id();
    $itemCarrinho = Carrinho::where('produto_id', $produtoId)
        ->where('user_id', $user_id)
        ->first();
    
    if ($itemCarrinho) {
        $itemCarrinho->correiacor = $value;

        $itemCarrinho->save();
        /* if ($itemCarrinho->correiacor != "") {
            $itemCarrinho->save();
        } */
    }
}
// Update cor correia fim

#region ATUALIZA MEDIDA TERMOPATCH
public function updatedMedida($value, $produtoId) {
 
    $user_id = auth()->id();
    $itemCarrinho = Carrinho::where('produto_id', $produtoId)
        ->where('user_id', $user_id)
        ->first();
    
    if ($itemCarrinho) {
        $itemCarrinho->medida = $value;

        $itemCarrinho->save();
    }
}
#endregion

#region ATUALIZA PRODUTO PREFEITURA
public function updatedPrefeituraProduto($value, $produtoId) {
 
    $user_id = auth()->id();
    $itemCarrinho = Carrinho::where('produto_id', $produtoId)
        ->where('user_id', $user_id)
        ->first();
    
    if ($itemCarrinho) {
        $itemCarrinho->prefeitura_produto = $value;

        $itemCarrinho->save();
    }
}
#endregion



//FAZ UPLOAD DE MULTIPLAS ESTAMPAS
public function updatedImagens(){

    $this->dispatch('showConfirmAddImgCart', title: 'Adicionar imagens ao carrinho?');
}



//Esse codigo e mais funcional e corrige o bug de imagem com mesma referência incluida pelo cliente em sessoes diferente
/* public function adicionarAoCarrinhoAll() {
    $validated = $this->validate(
        [
            'imagens.*' => 'image|max:50240', // Validação para múltiplos arquivos
        ],
        [
            'imagens.*.image' => 'Apenas imagens são permitidas.',
            'imagens.*.max' => 'O tamanho da imagem excede o permitido.',
        ]
    );
    $user = auth()->user();

    if ($this->imagens) {
        foreach ($this->imagens as $imagem) {
            $numeroAleatorio = rand(1, 1000);
            $nomeImagem =  $user->id . '-' . $numeroAleatorio . '.' . $imagem->getClientOriginalExtension();
            $imagem->storeAs('public/produtos/imagens_pedidos/' . $user->email . '', $nomeImagem);

            // Alterar as permissões do diretório
            chmod(storage_path('app/public/produtos/imagens_pedidos/' . $user->email), 0755);

            // Recuperar o primeiro produto com a descrição 'n usar' que ainda não está no carrinho do usuário
            $produtoNaoNoCarrinho = Produto::where('descricao', 'n usar')
            ->whereNotIn('id', function($query) use ($user) {
                $query->select('produto_id')
                    ->from(with(new Carrinho)->getTable())
                    ->where('user_id', $user->id);
            })
            ->first();

            if ($produtoNaoNoCarrinho) {
            $ultimoProdutoId = $produtoNaoNoCarrinho->id;
            } else {
            // Tratar o caso quando não há mais produtos disponíveis
            $this->notification()->error(
                $title = 'Error!',
                $description = 'Não há mais produtos disponíveis!'
            );
            }



            $produto = Produto::find($ultimoProdutoId);

            if ($produto) {
                Carrinho::create([
                    'produto_id' => $ultimoProdutoId,
                    'quantidade' => 120,
                    'imagem_cliente' => $user->email . '/' . $nomeImagem,
                    'user_id' => $user->id,
                ]);
            } else {
                // Tratar o caso quando o produto não existe
                $this->notification()->error(
                    $title = 'Error!',
                    $description = 'Você atingui o limite maximo!'
                );
            }

        }
    }

    $this->imagens = [];

    $this->notification()->success(
        $title = 'Sucesso!',
        $description = 'Imagens adicionadas com sucesso!'
    );
    
    $this->carregarQuantidade();
} */


//CONVERTE E SALVA A IMAGENS DO CLIENTE
/* public function adicionarAoCarrinhoAll() {
    $validated = $this->validate(
        [
            'imagens.*' => 'image|max:50240', // Validação para múltiplos arquivos
        ],
        [
            'imagens.*.image' => 'Apenas imagens são permitidas.',
            'imagens.*.max' => 'O tamanho da imagem excede o permitido.',
        ]
    );
    $user = auth()->user();

    if ($this->imagens) {
        foreach ($this->imagens as $imagem) {
            $numeroAleatorio = rand(1, 9000);
            $nomeImagem =  $user->id . '-' . $numeroAleatorio . '.webp'; // Altere a extensão para .webp
  
            $caminhoImagem = storage_path('app/public/produtos/imagens_pedidos/' . $user->email . '/' . $nomeImagem);

            $imagemWebp = Image::make($imagem)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('webp', 75)
                ->save($caminhoImagem);


            
                
                // Recuperar o primeiro produto com a descrição 'n usar' que ainda não está no carrinho do usuário
            $produtoNaoNoCarrinho = Produto::where('descricao', 'n usar')
            ->whereNotIn('id', function($query) use ($user) {
                $query->select('produto_id')
                    ->from(with(new Carrinho)->getTable())
                    ->where('user_id', $user->id);
            })
            ->first();

            if ($produtoNaoNoCarrinho) {
            $ultimoProdutoId = $produtoNaoNoCarrinho->id;
            } else {
            // Tratar o caso quando não há mais produtos disponíveis
            $this->notification()->error(
                $title = 'Error!',
                $description = 'Não há mais produtos disponíveis!'
            );

        }

            $produto = Produto::find($ultimoProdutoId);

            if ($produto) {
                Carrinho::create([
                    'produto_id' => $ultimoProdutoId,
                    'quantidade' => 120,
                    'imagem_cliente' => $user->email . '/' . $nomeImagem,
                    'user_id' => $user->id,
                ]);
            } else {
                // Tratar o caso quando o produto não existe
                $this->notification()->error(
                    $title = 'Error!',
                    $description = 'Você atingui o limite maximo!'
                );
            }
        }
    }

    $this->imagens = [];

    $this->notification()->success(
        $title = 'Sucesso!',
        $description = 'Imagens adicionadas com sucesso!'
    );

    $this->carregarQuantidade();
} */

#[On('confirmAddImgCart')]
public function adicionarAoCarrinhoAll() {
    $validated = $this->validate([
        'imagens.*' => 'image|max:50240', // Validação para múltiplos arquivos
    ], [
        'imagens.*.image' => 'Apenas imagens são permitidas.',
        'imagens.*.max' => 'O tamanho da imagem excede o permitido.',
    ]);

    $user = auth()->user();
    
    $isPrefeitura = Auth::user()->regra_user->contains('regra_id', 110); // 110 = PREFEITURA

   
    if ($this->imagens) {
        foreach ($this->imagens as $imagem) {
            /*$numeroAleatorio = rand(1, 90000);
            $nomeImagem = $user->id . '-' . $numeroAleatorio . '.webp';*/ // Altere a extensão para .webp
            
            $cartId = Carrinho::max('id') + 1; // Obter o próximo ID do carrinho
            $numeroAleatorio = rand(1, 90000);
            $nomeImagem = $user->id . '-' . $cartId . '-' . $numeroAleatorio . '.webp';
            $caminhoImagem = storage_path('app/public/produtos/imagens_pedidos/' . $user->email . '/' . $nomeImagem);

            // Alterar as permissões do diretório
            $diretorioImagens = storage_path('app/public/produtos/imagens_pedidos/' . $user->email);
            if (!is_dir($diretorioImagens)) {
                mkdir($diretorioImagens, 0755, true);
            }
            chmod($diretorioImagens, 0755);

            $imagemWebp = Image::make($imagem)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('webp', 75)
                ->save($caminhoImagem);

            // Recuperar o primeiro produto com a descrição 'n usar' que ainda não está no carrinho do usuário
            $produtoNaoNoCarrinho = Produto::where('descricao', 'n usar')
                ->whereNotIn('id', function($query) use ($user) {
                    $query->select('produto_id')
                        ->from(with(new Carrinho)->getTable())
                        ->where('user_id', $user->id);
                })
                ->first();

            if ($produtoNaoNoCarrinho) {
                $ultimoProdutoId = $produtoNaoNoCarrinho->id;
            } else {
                // Tratar o caso quando não há mais produtos disponíveis
                $this->notification()->error(
                    $title = 'Error!',
                    $description = 'Não há mais produtos disponíveis!'
                );
            }

            $produto = Produto::find($ultimoProdutoId);
            if ($produto) {
                Carrinho::create([
                    'produto_id' => $ultimoProdutoId,
                    'quantidade' => $isPrefeitura ? 1 : 120,
                    'imagem_cliente' => $user->email . '/' . $nomeImagem,
                    'user_id' => $user->id,
                ]);
            } else {
                // Tratar o caso quando o produto não existe
                $this->notification()->error(
                    $title = 'Error!',
                    $description = 'Você atingui o limite maximo!'
                );
            }
        }
    }

    $this->imagens = [];
    $this->notification()->success(
        $title = 'Sucesso!',
        $description = 'Imagens adicionadas com sucesso!'
    );
    $this->carregarQuantidade();
}
//CONVERTE E SALVA A IMAGENS


public function atualizarQuantidade($produtoId)
{
    // Atualize a quantidade na propriedade Livewire
    // Isso atualizará o campo de entrada em tempo real
    $this->quantidade[$produtoId] = $this->quantidade[$produtoId];

    // Você também pode salvar a quantidade atualizada no banco de dados aqui
    // Para simplificar, vamos supor que você tenha um modelo chamado CarrinhoCompra
    $user_id = auth()->id();

    $itemCarrinho = Carrinho::where('produto_id', $produtoId)
        ->where('user_id', $user_id)
        ->first();
    
    if ($itemCarrinho) {
        $itemCarrinho->quantidade = $this->quantidade[$produtoId];
       
        if ($itemCarrinho->quantidade != "") {
            $itemCarrinho->save();
        }
    }
}

public function addsumqnde($produtoId)
{
    // Atualize a quantidade na propriedade Livewire
    // Isso atualizará o campo de entrada em tempo real
    $this->quantidade[$produtoId] = $this->quantidade[$produtoId]  + 1;

    // Você também pode salvar a quantidade atualizada no banco de dados aqui
    // Para simplificar, vamos supor que você tenha um modelo chamado CarrinhoCompra
    $user_id = auth()->id();

    $itemCarrinho = Carrinho::where('produto_id', $produtoId)
        ->where('user_id', $user_id)
        ->first();
    
    if ($itemCarrinho) {
        $itemCarrinho->quantidade = $this->quantidade[$produtoId];
       
        if ($itemCarrinho->quantidade != "") {
            $itemCarrinho->save();
        }
    }
}

public function addsubqnde($produtoId)
{
    // Atualize a quantidade na propriedade Livewire
    // Isso atualizará o campo de entrada em tempo real
    $this->quantidade[$produtoId] = $this->quantidade[$produtoId]  - 1;

    // Você também pode salvar a quantidade atualizada no banco de dados aqui
    // Para simplificar, vamos supor que você tenha um modelo chamado CarrinhoCompra
    $user_id = auth()->id();

    $itemCarrinho = Carrinho::where('produto_id', $produtoId)
        ->where('user_id', $user_id)
        ->first();
    
    if ($itemCarrinho) {
        $itemCarrinho->quantidade = $this->quantidade[$produtoId];
       
        if ($itemCarrinho->quantidade != "") {
            $itemCarrinho->save();
        }
    }
}





public $valoritens;

public function updateItemCart()
{
    $user_id = auth()->id();
    $this->produtos_carts = Carrinho::where('user_id', $user_id)->get();

    $novaQuantidade  = $this->valoritens;

    foreach ($this->produtos_carts as $item) {
        $itemPedido = Carrinho::find($item->id);
        if ($itemPedido) {
            $itemPedido->quantidade = $novaQuantidade;
            $itemPedido->save();

            $this->dispatch('success', title: 'Quantidade alterada!',timer: 1500 );
        } else {
            $this->dispatch('error', title: 'Error!',description: 'Ocorreu um erro inesperado! Entre em contato.',timer: 3000 );
        }
    }
    

    $this->carregarQuantidade();
    $this->reset('valoritens');
}

//REMOVE ITEM DO CARRINHO -INICIO

   
    public function showConfirmeRemoveItem($produtoId, $itemId/* , $referencia = '' */){
        $this->idproduto = $produtoId;
        $this->itemid = $itemId;
        

        /* $this->notification()->confirm([
            'title' => 'Você está certo?',
            'description' => 'Remover item do carrinho?',
            'acceptLabel' => 'Sim, remover item.',
            'method' => 'removerItemDoCarrinho',
            'params' => 'Deleted',
        ]); */
        $this->dispatch('showDeleteItemCart', title: 'Remover item do carrinho?');
    }
    #[On('deleteItemCart')]
    public function removerItemDoCarrinho() {
       
        $itemCarrinho = Carrinho::where('produto_id', $this->idproduto)->first();

          //Remover imagem cliente - INICIO
          $user  = auth()->user();
          // Encontre o item no carrinho de compras pelo ID
          $itemCarrinho = Carrinho::find($this->itemid);
          
          if ($itemCarrinho) {
              // Remova a imagem do storage
              if ($itemCarrinho->imagem_cliente) {
                  Storage::delete('public/produtos/imagens_pedidos/' /* .$user->email.'/' */. $itemCarrinho->imagem_cliente);
              }
      
              // Remova o item do carrinho de compras
              $itemCarrinho->delete();
          }
          //Remover imagem cliente


        if ($itemCarrinho) {
            $itemCarrinho->delete();        
        }
        
        $this->dispatch('carregarItensCart'); //Select os itens do carrinho TRANSFERTABLE

        $this->notification()->success(
            $title = 'Sucesso!',
            $description = 'Item deletado!'
        );
    }
     //REMOVER ITEM DO CARRINHO -FIM


    public function questiondeleteAllCart(){
        /* $this->dispatch('showDelete'); */
        /* $this->notification()->confirm([
            'title' => 'Você está certo?',
            'description' => 'Remover todos os registros?',
            'acceptLabel' => 'Sim, limpar carrinho.',
            'method' => 'deleteAllCart',
            'params' => 'Deleted',
        ]); */
        $this->dispatch('showDeleteAllCart', title: 'Remover todos os itens do carrinho?');
    }

    #[On('deleteAllCart')] 
    public function deleteAllCart()
    {
        $user = auth()->user();

        if ($user) {
            Carrinho::where('user_id', $user->id)->delete();

            /* $this->notification()->success(
                $title = 'Sucesso!',
                $description = 'Carrinho limpo!'
            ); */
            $this->dispatch('success', title: 'Carrinho limpo!', );
            
        } else {
            session()->flash('message', 'Você precisa estar autenticado para realizar essa ação.');
        }
        $this->dispatch('render');

        $this->dispatch('carregarItensCart'); //Select os itens do carrinho TRANSFERTABLE
        
    }

    #[On('produto-addCart')] 
    public function updatedCarrinho($produto = null){
        //ESSE CODIGO É PARA ATUALIZAR O CARRINHO DE COMPRAS NA VIEW PRODUTOS
               
    }

    public function showConfirmPedido(){
        $this->dispatch('showConfirmPedido',  title: 'Seu pedido será encaminhado para nossa linha de produção.'); 
    }
    //CONFIRMAR PEDIDO

   #[On('confirmPedido')]  
    public function confirmarPedido() {
        $user = auth()->user();

        // Verifica se o usuário tem permissão para ver todos os pedidos
        $hasViewPermission = Auth::user()->regra_user->contains('regra_id', 110); // 110 = PREFEITURA

        if($hasViewPermission) {
            $this->marca = '---';
            $this->grupo = '---';
            $this->grade = '----';
        }

        if($this->tipoProduto == 'termopatch') {
            $this->marca = '---';
            $this->grupo = '---';
            $this->grade = '----';
        }

        /* if($this->tipoProduto == 'uv') {
            $this->marca = '---';
            $this->grupo = '---';
            $this->grade = '----';
        }
     */
        
    
        $this->validate();
        // Verifique se o carrinho não está vazio
        $carrinhoVazio = Carrinho::where('user_id', $user->id)->count() === 0;


        //ESSE TRCHO DE CODIGO EXTIPULA A DATA DE ENTREGA - INICIO
        //soma a quantidade de itemPedido pra estipular uma data de entrega
        $total_quantidade = ItemPedido::whereHas('pedido', function ($query) {
            $query->where('status', 'aberto')->orWhere('status', 'cadastrado');
        })->sum('quantidade');

        //arredondar dias necessários
        $dias_necessarios = ceil($total_quantidade / 12000); 

        $data_estimada = date('Y-m-d H:i:s', strtotime("+$dias_necessarios days"));

        //ESSE TRCHO DE CODIGO EXTIPULA A DATA DE ENTREGA - FIM

        if (!$carrinhoVazio) {
            // Obtém os itens do carrinho pertencentes ao usuário
            $itensCarrinho = Carrinho::where('user_id', $user->id)->get();

            // Verifique se todas as quantidades são maiores ou iguais a 1
            $quantidadesValidas = $itensCarrinho->every(function ($itemCarrinho) {
                return $itemCarrinho->quantidade >= 1;
            });

            if ($quantidadesValidas) {
                
                $pedido = Pedido::create([
                    /* 'marca' => auth()->id(), */
                    'marca' => $this->marca, // Salvar o valor da marca
                    'grupo' => $this->grupo, // Salvar o valor da marca
                    'grade' => $this->grade, // Salvar o valor da marca
                    'prefeitura' => $this->prefeitura ?? '', // Salvar o valor da marca
                    'observacao' => $this->observacao, // Salvar o valor das observações
                    'status' => 'aberto',
                    'previsao_entrega' => $data_estimada,
                    'user_id' => $user->id,
                ]);

                // Adicione os itens do carrinho ao pedido e salve na tabela itens_pedidos
                foreach ($itensCarrinho as $itemCarrinho) {
                    $itemPedido = new ItemPedido([
                        'pedido_id' => $pedido->id,
                        'produto_id' => $itemCarrinho->produto_id,
                        'quantidade' => $itemCarrinho->quantidade,
                        'imagem_cliente' => $itemCarrinho->imagem_cliente ?? '',
                        'correiacor' => $itemCarrinho->correiacor ?? '',
                        'prefeitura_produto' => $itemCarrinho->prefeitura_produto ?? '',
                        'medida' => $itemCarrinho->medida ?? '',
                        'user_id' => $user->id,
                    ]);
                    $itemPedido->save();
                }
                
                // Limpe o carrinho pertencente ao usuário
                Carrinho::where('user_id', $user->id)->delete();
                
                // Log ação de usuário
                  $userId = auth()->user()->id;
                  $userName = auth()->user()->name; 
                  UserAction::create([
                      'user_id' => $userId,
                      'action_type' => 'pedido',
                      'description' => 'CONFIRMOU o pedido id: '. $pedido->id .'.',
                  ]);
                  //Logs - fim

                $this->dispatch('success',  title: 'Pedido criado com sucesso', );
                
                 Log::info('Pedido criado: Cliente cadastrou com sucesso pedido: '. 'USER: '.  auth()->user()->name);

                 $this->reset('marca','grupo','grade','prefeitura','observacao', 'correiacor', 'prefeitura_produto', 'medida');

                $this->dispatch('carregarItensCart'); //Envia para o TRANSFERTABLE

            } else {
                Log::info('Pedido error quantidade: Cliente errou quantidade pedido: '. 'USER: '.  auth()->user()->name);
                // Se as quantidades não forem válidas, mostre uma mensagem de erro
                session()->flash('error', 'A quantidade de um ou mais itens do carrinho é inválida. Certifique-se de que todas as quantidades sejam maiores ou iguais a 1.');
            }
        } else {
            // Se o carrinho estiver vazio, você pode mostrar uma mensagem de erro ou realizar outra ação adequada ao seu aplicativo.
            session()->flash('error', 'O carrinho está vazio. Não é possível criar um pedido vazio.');
        }
    }

    //FIM CONFIRMAR PEDIDO

    public function getQuantidadeItensCarrinho()
    {
        $user = auth()->user();
        return Carrinho::where('user_id', $user->id)->count();
    }


    public function render() {
        $user = auth()->user();
        /* $this->produtos_carts = Carrinho::where('user_id', $user->id)->get(); */
        $produtos_cart = Carrinho::where('user_id', $user->id)->get();


        
        //Qualcular valor carrinho compras
        
        $total = 0;
        foreach ($produtos_cart as $produto) {
            $total += $produto->quantidade * 1.50;
        }

        $this->valor_cart = $total;
        
        //Fim calcular valor carrinho compras

        return view('livewire.carrinho-compra', compact('produtos_cart')
        /* [
            'produtos_cart' => Carrinho::where('user_id', $user->id)->get()
        ] */);
    }

}
