<?php

namespace App\Livewire\Produtos;

use Livewire\Component;

use App\Models\BlockedTermopatch;
use App\Models\BrandUser;
use App\Models\Marca;
use App\Models\Termopatch;
use App\Models\User;
use App\Models\CarrinhoCompra;


use Livewire\WithPagination;
use Livewire\Attributes\On;
use WireUi\Traits\Actions;

class TermopatchTable extends Component
{
    use Actions;
    use WithPagination;


    public $search;
    public $genero;
    public $selectedMarca;
    public $quantidadeCart;
   

    public $marcaList;
    
    public $perPage = 100;
    public $order = 'desc';
    
    public $carrinho = []; // Itens do carrinho temporário



    public function mount()
    {
        $user = auth()->user();
        $this->marcaList = $user->brands()->get();
    }

    #[On('carregarItensCart')] //Vem do CarrinhoCompra
    public function carregarItensCart(){
        $user = auth()->user();
        $this->quantidadeCart =  CarrinhoCompra::where('user_id', $user->id)->count();
    }

    public function buscarEstampa()
    {
        $this->render();
        //$this->dispatch('closed-modal');      
    }
    
    public function resetFilters(){
        $this->search = '';       
        $this->selectedMarca = '';
    }

     //Paginate auto
     public function loadMore()
     {
         $this->perPage += 100;
     }

    public function render()
    {   
        $user = auth()->user();

        $termopatches = Termopatch::whereHas('marca.user_brand', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })->whereDoesntHave('usuarios', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        });

        // Verifica se a marca selecionada não está vazia
        if ($this->selectedMarca) {
            $this->resetPage();//Reseta o paginate
            $termopatches->where('marca_id', $this->selectedMarca)
                ->where(function ($query) {
                    
                    /* if (!empty($this->genero)) {
                        $this->resetPage();//Reseta o paginate
                        $query->where('genero', $this->genero);
                    } */

                    $query->where('referencia', 'like', '%' . $this->search . '%')
                        ->orWhere('filtros', 'like', '%' . $this->search . '%');
                    
                        /* if (!empty($this->genero)) {
                            $this->resetPage();//Reseta o paginate
                            $query->where('genero', $this->genero);
                        } */
                });
        } else {
            $termopatches->where(function ($query) {

                /* if (!empty($this->genero)) {
                    $this->resetPage();//Reseta o paginate
                    $query->orWhere('genero', $this->genero);
                } */
                if ($this->search) {
                    $this->resetPage(); //Reseta o paginate
                    $query->where('filtros', 'like', '%' . $this->search . '%')
                        ->orWhere('referencia', 'like', '%' . $this->search . '%');
                }
                
            });
        }

        $termopatches->orderBy('referencia', $this->order);
        $termopatches = $termopatches->paginate($this->perPage);
           
        /* $this->quantdeCart = CarrinhoCompra::where('user_id', $user->id)->count(); */

        $this->carregarItensCart();

        return view('livewire.produtos.termopatch-table', [
            'termopatchList' => $termopatches,            
            'quantidadeCart' => $this->quantidadeCart,
        ]);

    }
}
