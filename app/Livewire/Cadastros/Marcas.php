<?php

namespace App\Livewire\Cadastros;

use Livewire\Component;

use App\Models\User;
use App\Models\Marca;
use Illuminate\Support\Facades\Auth;
use WireUi\Traits\Actions;
use Livewire\WithPagination;

class Marcas extends Component
{

    use Actions;
    use WithPagination;

    public $search;
    public $userList;
    public $filtro;

    public $marcaId;
    public $referencia;
    public $descricao;
    public $observacao = '';
    public bool $isCliente = false;

    public $edit = false;

    public $novaReferencia;

    public $sort = 'asc';
    public $sortField = 'referencia';
    public $perPage = 100;
    public $hasMorePages;
    
    public $checkboxAllDisponivel = false;
    public $checkboxDisponivel = [];

    public function mount()
    {
        $this->userList = User::all();
        //$this->filtroList = Filtro::all();
        $this->obterReferencia();
    }

    public function obterReferencia(){
        // Obtém a última referência da tabela Marca
       $ultimaReferencia = Marca::where('referencia','!=',99999)->latest('referencia')->first();

        if ($ultimaReferencia) {
            // Adiciona 1 à última referência
            $this->novaReferencia = $ultimaReferencia->referencia + 1;
        } else {
            // Se não houver registros, começa com a referência 1
            $this->novaReferencia = 1;
        }
    }


    //REMOVE MARCAS  INDIVIDUALMENTE
/*     public function remove($marcaId)
    {         
            Marca::where('id', $marcaId)
            ->delete();

            $this->notification()->success(
               $title = 'Sucesso!',
               $description = 'Marca(s) removido(s) com sucesso!'
           );         
    } */

    //REMOVE MARCAS  INDIVIDUALMENTE
    public function confirmSimple($id,$ref): void
    {   $this->marcaId = $id;
        
        $this->notification()->confirm([
            'title' => 'Você está certo?',
            'description' => 'Deletar a marca '.$ref.'?',
            'acceptLabel' => 'Sim, remover marca',
            'method' => 'delete',
            'params' => 'Deleted',
        ]);
    }
    public function delete(){
        Marca::where('id', $this->marcaId)
            ->delete();

            $this->notification()->success(
               $title = 'Sucesso!',
               $description = 'Marca(s) removido(s) com sucesso!'
           );
           
           // Salvar log no laravel (storage)
        \Log::info('Marca id: '.$this->marcaId.' Excluido: '. 'USER: '. Auth::user()->name);
    }
    //REMOVE MARCAS  INDIVIDUALMENTE - FIM
    
    
    //Seleciona e desmarca todas as marcas
    public function updatedCheckboxAllDisponivel()
    {
        if ($this->checkboxAllDisponivel) {
            $this->checkboxDisponivel = Marca::pluck('id')->map(function ($id) {
                return (string) $id;
            })->toArray();
        } else {
            $this->checkboxDisponivel = [];
        }
    }
    
    //REMOVE MARCAS  SELECIONADAS
    public function removeSelected()
    {   
        if($this->checkboxDisponivel){
            $this->notification()->confirm([
                'title' => 'Você está certo?',
                'description' => 'Deletar a marca(s)',
                'acceptLabel' => 'Sim, remover marca(s)',
                'method' => 'deleteSelected',
                'params' => 'Deleted',
            ]);
        }
        else{
            $this->notification()->error(
                $title = 'Erro!',
                $description = 'Nenhuma marca selecionada!'
            );
        }
        
        
    }
    
    public function deleteSelected(){
        // Implement logic to delete items with IDs in $this->checkboxDisponivel
        Marca::whereIn('id', $this->checkboxDisponivel)->delete();

        // Reset checkbox selection
        $this->checkboxAllDisponivel = false;
        $this->checkboxDisponivel = [];

        // Refresh the component to reflect changes
        /* $this->dispatch('refreshTable'); */
        $this->notification()->success(
            $title = 'Sucesso!',
            $description = 'marca(s) removida(s) com sucesso!'
        );
        
         // Salvar log no laravel (storage)
        \Log::info('Marcas excluidas: '. 'USER: '. Auth::user()->name);
    }
    //FIM REMOVE MARCAS  SELECIONADAS

    public function save()
    {   
        
        $this->validate([
            'descricao' => 'required',
        ]);
        // Converte a entrada para maiúsculas
        $entrada_maiuscula = strtoupper($this->descricao);
        Marca::create([
            'referencia' => $this->novaReferencia,
            'descricao' => $entrada_maiuscula,
            'observacao' => $this->observacao,
            'isCliente' => $this->isCliente,
            'user_id' => auth()->id(),
        ]);
    
        $this->notification()->success(
            $title = 'Sucesso!',
            $description = 'marca salva com sucesso!'
        );
        $this->reset('marcaId','referencia','novaReferencia','descricao','observacao');

        $this->obterReferencia();
    }

    public function cancelar(){
        $this->edit = false;
        $this->reset('marcaId','referencia','novaReferencia','descricao','observacao');
    }

    public function editMarca($id)
    {
        $marca = Marca::findOrFail($id);

        $this->edit = true;

        $this->marcaId = $id;
        $this->novaReferencia = $marca->referencia;
        $this->descricao = $marca->descricao;
        $this->observacao = $marca->observacao;
        $this->isCliente = $marca->isCliente;
    }

    public function update()
    {
        $this->validate([           
            'descricao' => 'required',
        ]);

        if ($this->marcaId) {
            $marca = Marca::find($this->marcaId);
            // Converte a entrada para maiúsculas
            $entrada_maiuscula = strtoupper($this->descricao);
            $marca->update([
                /* 'referencia' => $this->novaReferencia, */
                'descricao' => $entrada_maiuscula,
                'observacao' => $this->observacao,
                'isCliente' => $this->isCliente,
            ]);
            
               // Salvar log no laravel (storage)
            \Log::info('Marca id: '.$this->marcaId.' Editada: '. 'USER: '. Auth::user()->name);
            
            $this->edit = false;
            $this->reset('marcaId','referencia','novaReferencia','descricao','observacao','isCliente');

            $this->obterReferencia();
        }
    }

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
        $marcaList = $this->search
            ? Marca::where('descricao', 'like', '%' . $this->search . '%')
            ->where('referencia', '!=', 99999)
            ->orderBy($this->sortField,  $this->sort)->paginate($this->perPage)
            : Marca::where('referencia', '!=', 99999)->orderBy($this->sortField,  $this->sort)->paginate($this->perPage);

            $this->hasMorePages = $marcaList->hasMorePages(); // Atualize o estado da paginação

        return view('livewire.cadastros.marcas',[
            'marcaList' => $marcaList,
            'totalselected' => count($this->checkboxDisponivel),
        ]);
    }
}
