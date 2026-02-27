<?php

namespace App\Livewire\Produtos;

use Livewire\Component;
use App\Models\Produto;
use App\Models\BlockedTransfer;
use App\Models\BrandUser;
use App\Models\Marca;
use App\Models\Filtro;
use App\Models\User;
use App\Models\CarrinhoCompra;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use WireUi\Traits\Actions;

class TransferTable extends Component
{

    use Actions;
    use WithPagination;

    public $selectedMarca;
    public $search;
    public $genero;
    
    public $searchRef;
    /* public $searchMarca; */

   /*  public $quantidadeCart; */

    public $quantidadeCart;
   

    public $marcaList;
    public $filtroList = [];
    
    public $perPage = 50;
    public $order = 'desc';

    public $carrinho = []; // Itens do carrinho temporário


    public $tipo; // Receberá automaticamente o parâmetro da rota
    


    public function mount()
    {
        $user = auth()->user();
        $this->marcaList = $user->brands()->orderBy("descricao","asc")->get();
        $this->filtroList =  Filtro::orderBy('filtro')->get();
    }

    public function buscarEstampa()
    {
        $this->render();
        $this->dispatch('closed-modal');      
    }
    public function resetFilters()
    {
        $this->reset('search');
        $this->reset('selectedMarca');    
        /* $this->reset('searchMarca'); */
        $this->reset('genero');  
    }


    //Adiciona produtos ao carrinho - inicio
    public function addCarrinho($produtoId) {
       
        $user = auth()->user();
        
        $produto = Produto::find($produtoId);
        
        // Verifica se o produto já está no carrinho do usuário
        $itemCarrinho = CarrinhoCompra::where('user_id', $user->id)
            ->where('produto_id', $produtoId)
            ->first();
    
        if ($itemCarrinho) {
            // Se o produto já estiver no carrinho, aumenta a quantidade em 1
            $itemCarrinho->increment('quantidade');
        } else { 
            // Caso contrário, cria um novo item no carrinho com quantidade 1
            CarrinhoCompra::create([
                'produto_id' => $produtoId,
                'quantidade' => 120,
                'quantidade' => 120,
                'user_id' => $user->id,
            ]);
        } 
    
        if (!in_array($produtoId, $this->carrinho)) {
            $this->carrinho[] = $produtoId;
        }
        //$this->myModal = false;
        $this->dispatch('produto-addCart', $produto); 
        $this->dispatch('showAddCart'); //Avisa que o produto foi adicionado ao carrinho

        $this->notification()->success(
            $title = 'Sucesso!',
            $description = 'Produto adicionado ao carrinho.'
        );
        
        $this->dispatch('atualizarCart', $itemCarrinho); //Select os itens do carrinho
        
    }

    //Carrega itens do carrinho
    #[On('carregarItensCart')] //Vem do CarrinhoCompra
    public function carregarItensCart(){
        $user = auth()->user();
        $this->quantidadeCart =  CarrinhoCompra::where('user_id', $user->id)->count();
    }
 

     //Paginate auto
     public function loadMore()
     {
         $this->perPage += 50;
     }



/*
    public function render()
{
    $user = auth()->user();

    $produtos = Produto::whereHas('marca.user_brand', function ($query) use ($user) {
        $query->where('users.id', $user->id);
    })->whereDoesntHave('blockedUsers', function ($query) use ($user) {
        $query->where('users.id', $user->id);
    });

    if (!empty($this->genero)) {
        $this->resetPage(); //Reseta o paginate
    }

    if ($this->search || $this->searchRef) {
        $this->resetPage(); //Reseta o paginate
    }

    if ($this->selectedMarca) {
        $produtos->where('marca_id', $this->selectedMarca);
    }

    $produtos->where(function ($query) {
        if (!empty($this->genero)) {
            $query->where('genero', $this->genero);
        }

        if ($this->search) {
            $query->where('filtros', 'like', '%' . $this->search . '%');
        }

        if ($this->searchRef) {
            $query->where('referencia', $this->searchRef);
        }
    });

    //$produtos->where('disabled', '!=', 1);
    $produtos->orderBy('created_at', 'desc');
    $produtos = $produtos->paginate($this->perPage);

    $this->carregarItensCart();

    return view('livewire.produtos.transfer-table', [
        'produtoList' => $produtos,
        'quantidadeCart' => $this->quantidadeCart,
    ]);
}*/

public function loadProducts()
{
    // Exemplo de uso no componente
    /* if($this->tipo === 'transfer') {
        // Lógica para transfers
    } elseif($this->tipo === 'termopatch') {
        // Lógica para termopatchs
    } */

    
}


//Com esse codigo pode pesquisar mais de uma referencia separando por virgurla
public function render()
{
    
    $user = auth()->user();

    $produtos = Produto::whereHas('marca.user_brand', function ($query) use ($user) {
        $query->where('users.id', $user->id);
    })->whereDoesntHave('blockedUsers', function ($query) use ($user) {
        $query->where('users.id', $user->id);
    });

    if($this->tipo === 'transfer') {
        $produtos->where('tipo', 'transfer');
    } elseif($this->tipo === 'termopatch') {
        $produtos->where('tipo', 'termopatch');
    }
    if (!empty($this->genero)) {
        $this->resetPage(); // Reseta o paginate
    }

    if ($this->search || $this->searchRef) {
        $this->resetPage(); // Reseta o paginate
    }

    if ($this->selectedMarca) {
        $produtos->where('marca_id', $this->selectedMarca);
    }

    $produtos->where(function ($query) {
        if (!empty($this->genero)) {
            $query->where('genero', $this->genero);
        }

        // Verifica se o usuário tem permissão para ver todos os pedidos
        $hasEditorPermission = Auth::user()->regras->contains('nome', 'VER TODOS - PEDIDOS');

        if ($this->search) {
            if ($hasEditorPermission) {
                // Converte $this->search para string, caso seja um array
                if (is_array($this->search)) {
                    $this->search = implode(',', $this->search); // Junta os valores do array em uma string separada por vírgulas
                }

                // Separa os filtros por vírgula
                $filtros = explode(',', $this->search);

                $query->where(function ($subQuery) use ($filtros) {
                    foreach ($filtros as $filtro) {
                        $subQuery->orWhere('filtros', 'like', '%' . trim($filtro) . '%');
                    }
                });
            } else {
                // Caso contrário, aplica o filtro diretamente
                if (is_array($this->search)) {
                    $this->search = implode('', $this->search); // Junta o array caso seja necessário
                }
                $query->where('filtros', 'like', '%' . $this->search . '%');
            }
        }

        if ($this->searchRef) {
            // Separa as referências por vírgula
            if (is_array($this->searchRef)) {
                $this->searchRef = implode(',', $this->searchRef);
            }
            $referencias = explode(',', $this->searchRef);
            // Aplica o filtro para cada referência
            $query->whereIn('referencia', $referencias);
        }
    });

    $produtos->orderBy('created_at', $this->order);
    $produtos = $produtos->paginate($this->perPage);

    $this->carregarItensCart();

    return view('livewire.produtos.transfer-table', [
        'produtoList' => $produtos,
        'quantidadeCart' => $this->quantidadeCart,
    ]);
}



            
}
