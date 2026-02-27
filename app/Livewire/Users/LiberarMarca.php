<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Marca;
use App\Models\BrandUser;
use Illuminate\Support\Facades\Auth;

use WireUi\Traits\Actions;
use Livewire\WithPagination;

class LiberarMarca extends Component
{

    use Actions;
    use WithPagination;

    public $userList;
    public $selectedUser;
    public $marcaId;

    public $search = '';
    public $search_associadas = '';
    public $searchAssociados = '';

    public $marcasAssociadasAoUsuario = [];
    public $marcasNaoAssociadasAoUsuario = [];

    public bool $checkboxAllDisponivel = false;
    public bool $checkboxAllLiberados = false;
    public $checkboxDisponivel = []; //Array checkbox selecionados (disponíveis)
    public $checkboxLiberados = []; //Array checkbox selecionados (Liberados


    public $sort = 'asc';
    public $sortField = 'referencia';
    public $perPage = 100;
    public $hasMorePages;

    public function mount()
    {
        $this->userList = User::where('bloqueio', '!=', 1)->get();      
    }

    public function render()
    {

        if ($this->selectedUser) {
            // Carregar o modelo User com base no ID
            $user = User::find($this->selectedUser);



            if ($user) {
                // Obter todas as marcas associadas ao usuário e aplicar a pesquisa
                $marcasAssociadasAoUsuarioQuery = $user->marcas();
            
                if ($this->searchAssociados) {

                    $marcasAssociadasAoUsuarioQuery->where(function ($query) {
                        $query->where('descricao', 'like', '%' . $this->searchAssociados . '%')
                            ->orWhere('referencia', 'like', '%' . $this->searchAssociados . '%');
                    });
                }
                $this->marcasAssociadasAoUsuario = $marcasAssociadasAoUsuarioQuery->get();
            
                // Obter todas as marcas não associadas ao usuário e aplicar a pesquisa
                $marcasNaoAssociadasAoUsuarioQuery = Marca::whereDoesntHave('usuarios', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                });
            
                if ($this->search) {
                    
                    $marcasNaoAssociadasAoUsuarioQuery->where(function ($query) {
                        $query->where('descricao', 'like', '%' . $this->search . '%')
                            ->orWhere('referencia', 'like', '%' . $this->search . '%');
                    });
                }
            
                // Excluir marcas com descrição 'n usar'
                $marcasNaoAssociadasAoUsuarioQuery->where('referencia', '!=', 99999);
                
                //AQUI EXIBE AS MARCAS DOS CLIENTES APENAS PARA O USER ADMIN
                $hasAdminPermission = Auth::user()->regras->where('nome', 'ADMIN')->where('bloqueio', '!=', 1)->count() > 0;
                if(!$hasAdminPermission){
                    $marcasNaoAssociadasAoUsuarioQuery->where('isCliente', '!=', 1);
                }
            
                $this->marcasNaoAssociadasAoUsuario = $marcasNaoAssociadasAoUsuarioQuery->take(400)->get();
            }
            
        }

        /* $this->hasMorePages = $marcasNaoAssociadasAoUsuarioQuery->hasMorePages(); // Atualize o estado da paginação */

        return view('livewire.users.liberar-marca', [
            'marcasNaoAssociadasAoUsuario' => $this->marcasNaoAssociadasAoUsuario,
            'marcasAssociadasAoUsuario' => $this->marcasAssociadasAoUsuario,
            'totalselected' => count($this->checkboxDisponivel),
            'totalselectedLiberados' => count($this->checkboxLiberados),
        ]);
    }


     //Seleciona os checkboxs - marcas disponíveis
     public function updatedCheckboxAllDisponivel()
     {
         if ($this->checkboxAllDisponivel && $this->selectedUser) {
             $this->checkboxDisponivel = $this->marcasNaoAssociadasAoUsuario->pluck('id')->map(function($id) {
                 return (string) $id;
             })->toArray();
         } else {
             $this->checkboxDisponivel = [];
             $this->checkboxliberado = [];
         }
     }

      //Seleciona os checkboxs - marcas liberados
     public function updatedCheckboxAllLiberados()
     {
         if ($this->checkboxAllLiberados && $this->selectedUser) {
             $this->checkboxLiberados = $this->marcasAssociadasAoUsuario->pluck('id')->map(function($id) {
                 return (string) $id;
             })->toArray();
         } else {
             $this->checkboxLiberados = [];
             $this->checkboxDisponivel = [];
         }
     }
   
     ///Adiciona marcas selecionadas  ao usuários    
    public function adicionarMarcaAoUsuario()
    {
        try {
            $user = User::find($this->selectedUser);

            if ($user) {
                foreach ($this->checkboxDisponivel as $marcaId) {
                    $user->marcas()->attach($marcaId);
                }
                
                $this->checkboxDisponivel = [];
                $this->checkboxLiberados = [];
                $this->checkboxAllDisponivel = false;
                $this->checkboxAllLiberados = false;
                /* return ['success' => true, 'message' => 'Marcas adicionadas com sucesso.']; */
                $this->notification()->success(
                    $title = 'Marcas(s)',
                    $description = 'Marca(s) adicionada(s) com sucesso.'
                );

            } else {
                
                return ['success' => false, 'message' => 'Usuário não encontrado.'];
            }
        } catch (\Exception $e) {
             
            return ['success' => false, 'message' => 'Erro ao adicionar as marcas ao usuário.'];
        }
    }

      //REMOVE MARCAS DO USUÁRIO INDIVIDUALMENTE
      public function removeMarcaUser($id)
      {
        $this->marcaId = $id;

        $this->notification()->confirm([
            'title' => 'Você está certo?',
            'description' => 'Remover a marca?',
            'acceptLabel' => 'Sim, remover marca',
            'method' => 'delete',
            'params' => 'Deleted',
        ]);
              
      }
      public function delete(){
        if ($this->selectedUser) { 
            BrandUser::where('user_id', $this->selectedUser)
            ->where('brand_id', $this->marcaId)
            ->delete();
            $this->reset('marcaId');

            $this->notification()->success(
                $title = 'Sucesso!',
                $description = 'Marca(s) removido(s) com sucesso!'
            ); 
        } 
      }
      //FIM REMOVE MARCA USUÁRIO INDIVIDUALMENTE

   //REMOVE MARCA DO USUÁRIO SELECIONADO - TODAS AS MARCAS SELECIONADAS
   public function removerMarcaSelecionadas()
   {
        $this->notification()->confirm([
            'title' => 'Você está certo?',
            'description' => 'Remover a(s) marca(s)?',
            'acceptLabel' => 'Sim, remover marca(s)',
            'method' => 'deleteAll',
            'params' => 'Deleted',
        ]);
   }
   public function deleteAll(){

        try {
            $user = User::find($this->selectedUser);

            if ($user) {
                foreach ($this->checkboxLiberados as $marcaId) {
                    $user->marcas()->detach($marcaId);
                }
                
                $this->checkboxLiberados = [];
                $this->checkboxDisponivel = [];
                $this->checkboxAllDisponivel = false;
                $this->checkboxAllLiberados = false;

                $this->notification()->success(
                    $title = 'Marca(s)',
                    $description = 'Marca(s) excluída(s) com sucesso.'
                );
                
            } 
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Erro ao remover as marcas do usuário.'];
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
}
