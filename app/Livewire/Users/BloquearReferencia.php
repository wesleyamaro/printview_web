<?php

namespace App\Livewire\Users;

use Livewire\Component;

use WireUi\Traits\Actions;

use App\Models\User;
use App\Models\Produto;
use App\Models\BlockedTransfer;



class BloquearReferencia extends Component
{

    use Actions;

    public $userList = [];

    public $selectedUser;

    public $search = '';
    public $search_associadas = '';
    public $searchAssociados = '';

    public $referenciasAssociadasAoUsuario = [];
    public $referenciasNaoAssociadasAoUsuario = [];

    public bool $checkboxAllDisponivel = false;
    public bool $checkboxAllLiberados = false;
    public $checkboxDisponivel = []; //Array checkbox selecionados (disponíveis)
    public $checkboxLiberados = []; //Array checkbox selecionados (Liberados

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
                // Obter todas as referencias associadas ao usuário e aplicar a pesquisa
                $referenciasAssociadasAoUsuarioQuery = $user->referencias();

                if ($this->searchAssociados) {
                    $referenciasAssociadasAoUsuarioQuery->where('referencia', 'like', '%' . $this->searchAssociados . '%')
                    ->orWhere('referencia', 'like', '%' . $this->searchAssociados . '%');
                    // Adicione mais condições de pesquisa conforme necessário para outros campos
                }

                $this->referenciasAssociadasAoUsuario = $referenciasAssociadasAoUsuarioQuery->get();
               

                // Obter todas as referencias não associadas ao usuário e aplicar a pesquisa
                $referenciasNaoAssociadasAoUsuarioQuery = Produto::whereDoesntHave('usuarios', function ($query) use ($user) {
                    $query->where('user_id', $user->id)->where('descricao', '!=', 'N USAR');
                });

                if ($this->search) {
                    $referenciasNaoAssociadasAoUsuarioQuery->where('referencia', 'like', '%' . $this->search . '%')
                    ->orWhere('referencia', 'like', '%' . $this->search . '%');
                    // Adicione mais condições de pesquisa conforme necessário para outros campos
                }

                $this->referenciasNaoAssociadasAoUsuario = $referenciasNaoAssociadasAoUsuarioQuery->take(10)->where('descricao', '!=', 'N USAR')->get();
            }
        }
        return view('livewire.users.bloquear-referencia', [
            'referenciasNaoAssociadasAoUsuario' => $this->referenciasNaoAssociadasAoUsuario,
            'referenciasAssociadasAoUsuario' => $this->referenciasAssociadasAoUsuario,
            'totalselected' => count($this->checkboxDisponivel),
            'totalselectedLiberados' => count($this->checkboxLiberados),
        ]);
    }


     //Seleciona os checkboxs - referencias disponíveis
     public function updatedCheckboxAllDisponivel()
     {
         if ($this->checkboxAllDisponivel && $this->selectedUser) {
             $this->checkboxDisponivel = $this->referenciasNaoAssociadasAoUsuario->pluck('id')->map(function($id) {
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
             $this->checkboxLiberados = $this->referenciasAssociadasAoUsuario->pluck('id')->map(function($id) {
                 return (string) $id;
             })->toArray();
         } else {
             $this->checkboxLiberados = [];
             $this->checkboxDisponivel = [];
         }
     }
    
     ///Adiciona marcas selecionadas  ao usuários    
     public function adicionarReferenciaAoUsuario()
     {
         try {
             $user = User::find($this->selectedUser);
 
             if ($user) {
                 foreach ($this->checkboxDisponivel as $referenciaId) {
                     $user->referencias()->attach($referenciaId);
                 }
                 
                 $this->checkboxDisponivel = [];
                 $this->checkboxLiberados = [];
                 $this->checkboxAllDisponivel = false;
                 $this->checkboxAllLiberados = false;
                 /* return ['success' => true, 'message' => 'Marcas adicionadas com sucesso.']; */
                 $this->notification()->success(
                     $title = 'Referências(s)',
                     $description = 'Referências(s) adicionada(s) com sucesso.'
                 );
 
             } else {
                 return ['success' => false, 'message' => 'Usuário não encontrado.'];
             }
         } catch (\Exception $e) {
             return ['success' => false, 'message' => 'Erro ao adicionar as Referências ao usuário.'];
         }
     }
    
    //REMOVE MARCASDO USUÁRIO INDIVIDUALMENTE
    public function removeReferenciaUser($referenciaId)
    {
        if ($this->selectedUser) { 
            BlockedTransfer::where('user_id', $this->selectedUser)
            ->where('transfer_id', $referenciaId)
            ->delete();
            $this->notification()->success(
                $title = 'Referência',
                $description = 'Referência removida com sucesso.'
            );
        } else {
            return ['error' => false, 'message' => 'Usuário não encontrado.'];
        }       
    } 

   //REMOVE MARCA DO USUÁRIO SELECIONADO - TODAS AS MARCAS SELECIONADAS
   public function removerReferenciaSelecionadas()
   {
       try {
           $user = User::find($this->selectedUser);

           if ($user) {
               foreach ($this->checkboxLiberados as $referenciaId) {
                   $user->referencias()->detach($referenciaId);
               }
               
               $this->checkboxLiberados = [];
               $this->checkboxDisponivel = [];
               $this->checkboxAllDisponivel = false;
               $this->checkboxAllLiberados = false;
               $this->notification()->success(
                   $title = 'Referência(s)',
                   $description = 'Referência(s) removidas(s) com sucesso.'
               );
               
           } else {
               return ['success' => false, 'message' => 'Usuário não encontrado.'];
           }
       } catch (\Exception $e) {
           return ['success' => false, 'message' => 'Erro ao remover as referência do usuário.'];
       }
   }  

}
