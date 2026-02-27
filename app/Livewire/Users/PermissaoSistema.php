<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Regra;
use App\Models\User;
use App\Models\RegraUser;
use WireUi\Traits\Actions;

class PermissaoSistema extends Component
{
    use Actions;


    public $search = '';
    
    public $search_associadas = '';
    public $searchAssociados = '';

    public $regras = [];
    public $userList = [];

    public $selectedUser;

    public bool $checkboxPadrao = false;

    public bool $checkboxAllDisponivel = false;
    public bool $checkboxAllLiberados = false;
    public $checkboxDisponivel = []; //Array checkbox selecionados (disponíveis)
    public $checkboxLiberados = []; //Array checkbox selecionados (Liberados)

    public $regrasAssociadasAoUsuario = [];
    public $regrasNaoAssociadasAoUsuario = [];

    public $admin = false;

    public function mount()
    {
        $hasEditorPermission = Auth::user()->regras->where('nome', 'ADMIN')->count() > 0;
        if ($hasEditorPermission) {
            $this->userList = User::where('bloqueio', '!=', 1)->get();
            $this->admin = true;
        } else {
            $this->userList = User::where('tipo_user', '!=', 'PRINT')->where('bloqueio', '!=', 1)->get();
        }
        $this->regras = Regra::all();       
    }


    public function render()
    {
        /* $regrasAssociadasAoUsuario = [];
        $regrasNaoAssociadasAoUsuario = []; */

        if ($this->selectedUser) {
            // Carregar o modelo User com base no ID
            $user = User::find($this->selectedUser);

            if ($user) {
                // Obter todas as regras associadas ao usuário e aplicar a pesquisa
                $regrasAssociadasAoUsuarioQuery = $user->regras();

                if ($this->searchAssociados) {
                    $regrasAssociadasAoUsuarioQuery->where('nome', 'like', '%' . $this->searchAssociados . '%');
                    // Adicione mais condições de pesquisa conforme necessário para outros campos
                }

                $this->regrasAssociadasAoUsuario = $regrasAssociadasAoUsuarioQuery->get();

                // Obter todas as regras não associadas ao usuário e aplicar a pesquisa
                $regrasNaoAssociadasAoUsuarioQuery = Regra::whereDoesntHave('usuarios', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                    /* $query->where('nome', '!=','ADMIN'); */
                });

                //Se permissao for diferente de admin bloqueia exibir algumas regras
                if(!$this->admin){
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','ADMIN');
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','EDITOR');
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','SUBMENU - TOP CLIENTE');
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','SUBMENU - LIBERAR CLIENTE');
                    
                }
                
                


                if ($this->search) {
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', 'like', '%' . $this->search . '%');
                    // Adicione mais condições de pesquisa conforme necessário para outros campos
                }

                $this->regrasNaoAssociadasAoUsuario = $regrasNaoAssociadasAoUsuarioQuery->get();
            }
        }

        return view('livewire.users.permissao-sistema', [
            'regrasNaoAssociadasAoUsuario' => $this->regrasNaoAssociadasAoUsuario,
            'regrasAssociadasAoUsuario' => $this->regrasAssociadasAoUsuario,
            'totalselected' => count($this->checkboxDisponivel),
            'totalselectedLiberados' => count($this->checkboxLiberados),
        ]);
    }


    
    //Seleciona os checkboxs - disponíveis
    public function updatedCheckboxAllDisponivel()
    {
        if ($this->checkboxAllDisponivel && $this->selectedUser) {
            $this->checkboxDisponivel = $this->regrasNaoAssociadasAoUsuario->pluck('id')->map(function($id) {
                return (string) $id;
            })->toArray();
        } else {
            $this->checkboxDisponivel = [];
            $this->checkboxliberado = [];
        }
    }

    //Seleciona os checkboxs - liberados
     public function updatedCheckboxAllLiberados()
     {
         if ($this->checkboxAllLiberados && $this->selectedUser) {
             $this->checkboxLiberados = $this->regrasAssociadasAoUsuario->pluck('id')->map(function($id) {
                 return (string) $id;
             })->toArray();
         } else {
             $this->checkboxLiberados = [];
             $this->checkboxDisponivel = [];
         }
     }
    
    ///Adiciona regras ao usuários    
    public function adicionarRegraAoUsuario()
    {
        try {
            $user = User::find($this->selectedUser);

            if ($user) {
                foreach ($this->checkboxDisponivel as $regraId) {
                    $user->regras()->attach($regraId);
                }
                
                $this->checkboxDisponivel = [];
                $this->checkboxLiberados = [];
                $this->checkboxAllDisponivel = false;
                $this->checkboxAllLiberados = false;
                /* return ['success' => true, 'message' => 'Regras adicionadas com sucesso.']; */
                $this->notification()->success(
                    $title = 'Permissões)',
                    $description = 'Permissão(ões) adicionada(s) com sucesso.'
                );

            } else {
                return ['success' => false, 'message' => 'Usuário não encontrado.'];
            }
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Erro ao adicionar as regras ao usuário.'];
        }
    }

    //REMOVE REGRAS DO USUÁRIO INDIVIDUALMENTE
    public function removeRegraUser($regraId)
    {
        if ($this->selectedUser) { 
            RegraUser::where('user_id', $this->selectedUser)
            ->where('regra_id', $regraId)
            ->delete();
        } else {
            return ['success' => false, 'message' => 'Usuário não encontrado.'];
        }       
    }

    //REMOVE REGRAS DO USUÁRIO SELECIONADO - TODAS AS REGRAS SELECIONADAS
    public function removerRegraSelecionadas()
    {
        try {
            $user = User::find($this->selectedUser);

            if ($user) {
                foreach ($this->checkboxLiberados as $regraId) {
                    $user->regras()->detach($regraId);
                }
                
                $this->checkboxLiberados = [];
                $this->checkboxDisponivel = [];
                $this->checkboxAllDisponivel = false;
                $this->checkboxAllLiberados = false;
                $this->notification()->success(
                    $title = 'Permissão(ões)',
                    $description = 'Permissão(ões) removida(s) com sucesso.'
                );
                
            } else {
                return ['success' => false, 'message' => 'Usuário não encontrado.'];
            }
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Erro ao remover as regras do usuário.'];
        }
    }


//public $permissao_padrao = [66,72,84,85,86,87];
public $permissao_padrao = [1,2,3,4,5,6,9,99];

//INSERE REGRAS PADRÃO PARA O USUÁRIO SELECIONADO - TODAS AS REGRAS DEFINIDA NO ARRAY ACIMA
public function insertRegrasPadrao()
{
    if($this->selectedUser){
     
        foreach ($this->permissao_padrao as $regra_id) {
            // Verifica se a combinação user_id e regra_id já existe
            $existingRecord = RegraUser::firstOrCreate([
                'user_id' => $this->selectedUser,
                'regra_id' => $regra_id
            ]);
        }
        $this->checkboxPadrao = false;
    }else{
        $this->notification()->error(
            $title = 'Erro!!!',
            $description = 'Selecione um cliente.'
        );
        $this->checkboxPadrao = false;
    }
}






}
