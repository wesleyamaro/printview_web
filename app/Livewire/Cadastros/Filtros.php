<?php

namespace App\Livewire\Cadastros;

use Livewire\Component;

use Livewire\Attributes\Validate; 

use App\Models\User;
use App\Models\Filtro;

use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Filtros extends Component
{

    use Actions;
    use WithPagination;

    public $search;
    public $userList;
    public $filtro;

    public $filtroId;
    public $edit = false;

    public $sort = 'asc';
    public $sortField = 'filtro';
    public $perPage = 100;
    public $hasMorePages;

    public function mount()
    {
        $this->userList = User::all();
        //$this->filtroList = Filtro::all();        
    }

    
    public function placeholder()
    {
        return <<<'HTML'
        <div class="w-10/12 m-auto max-h-modal p-2 md:p-5  rounded-lg ">
            
            <div role="status" class="max-w-lg animate-pulse">
                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px] mb-2.5"></div>
                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[330px] mb-2.5"></div>
                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[300px] mb-2.5"></div>
                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
                <span class="sr-only">Loading...</span>
            </div>

        </div>
        HTML;
    }
    

    public function save()
    {
        $this->validate([
            'filtro' => 'required',
        ]);
    
        Filtro::create([
            'filtro' => $this->filtro,
            'user_id' => auth()->id(),
        ]);
    
        $this->notification()->success(
            $title = 'Sucesso!',
            $description = 'Filtro salvo com sucesso!'
        );
        $this->reset('filtro');

        $this->dispatch('filtro-created')->to(CreateTransfer::class);
    }
    

   /*   //REMOVE FILTROS  INDIVIDUALMENTE
     public function remove($filtroId)
     {         
             Filtro::where('id', $filtroId)
             ->delete();

             $this->notification()->success(
                $title = 'Sucesso!',
                $description = 'Filtro removido com sucesso!'
            );         
     } */

     //REMOVE FILTROS  INDIVIDUALMENTE
    public function confirmSimple($id): void
    {   $this->filtroId = $id;
        
        $this->notification()->confirm([
            'title' => 'Você está certo?',
            'description' => 'Deletar o filtro?',
            'acceptLabel' => 'Sim, remover filtro',
            'method' => 'delete',
            'params' => 'Deleted',
        ]);
    }
    public function delete(){
        Filtro::where('id', $this->filtroId)
             ->delete();

             $this->notification()->success(
                $title = 'Sucesso!',
                $description = 'Filtro removido com sucesso!'
        );  
    }
    //REMOVE MARCAS  INDIVIDUALMENTE - FIM


    public function cancelar(){
        $this->edit = false;
        $this->reset('filtroId','filtro');
    }

    //EDITAR FILTROS
    public function editFiltro($id)
    {
        $marca = Filtro::findOrFail($id);
        $this->edit = true;
        $this->filtroId = $id;
        $this->filtro = $marca->filtro;        
    }

    public function update()
    {
        $this->validate([           
            'filtro' => 'required',
        ]);

        if ($this->filtroId) {
            $filtro = Filtro::find($this->filtroId);

            // Converte a entrada para maiúsculas
            $entrada_maiuscula = strtoupper($this->filtro);

            $filtro->update([
                'filtro' => $entrada_maiuscula,
            ]);
            $this->edit = false;
            $this->reset('filtroId','filtro');

        }
        $this->dispatch('filtro-created')->to(CreateTransfer::class);
    }
    //FIM EDITAR FILTROS


    public function sortBy($field){
        $this->sortField = $field;    
        $this->sort = $this->sort === 'asc' ? 'desc' : 'asc';    
        $this->dispatch('render');
    }
    public function loadMore()
    {
        $this->perPage += 100;
    }

    public function render()
    {
        $filtroList = $this->search
            ? Filtro::where('filtro', 'like', '%' . $this->search . '%')->orderBy('filtro',  $this->sort)->paginate($this->perPage)
            : Filtro::orderBy('filtro',  $this->sort)->paginate($this->perPage);

            $this->hasMorePages = $filtroList->hasMorePages(); // Atualize o estado da paginação

        return view('livewire.cadastros.filtros', compact('filtroList'));
    }

    
}
