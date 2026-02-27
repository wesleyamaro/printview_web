<?php

namespace App\Livewire\Users;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Models\Regra;
use App\Models\User;
use App\Models\Marca;
use App\Models\BrandUser;
use App\Models\RegraUser;
use WireUi\Traits\Actions;

use App\Models\UserAction;
class LiberarCliente extends Component
{

    use Actions;


    public $search = '';
    
    public $search_associadas = '';
    public $searchAssociados = '';

    public $regras = [];
    public $userList = [];

    public $selectedUser;

    public bool $checkboxPadrao = false;
    public bool $checkboxLiberarMarcas = false;
    public bool $checkboxLiberarSemMarcas = false; //Liberar cliente sem marcas apenas a 037
    

    public bool $checkboxAllDisponivel = false;
    public bool $checkboxAllLiberados = false;
    public $checkboxDisponivel = []; //Array checkbox selecionados (disponíveis)
    public $checkboxLiberados = []; //Array checkbox selecionados (Liberados)

    public $regrasAssociadasAoUsuario = [];
    public $regrasNaoAssociadasAoUsuario = [];

    public $admin = false;

    public function mount()
    {
        $hasEditorPermission = Auth::user()->regras->where('nome', 'ADMIN')->where('bloqueio', '!=', 1)->count() > 0;
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

                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','MENU - CADASTRO');
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','EDITAR PEDIDO');	
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','EDITAR STATUS PEDIDO');
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','SUBMENU - BLOQUEIO REFERENCIA');

                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','SUBMENU - 	SUBMENU - LIBERAR MARCA');
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','SUBMENU - PERMISSAO SISTEMA');
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','SUBMENU - BLOQUEIO USER');

                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','SUBMENU - CADASTRAR TRANSFER');
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','SUBMENU - CADASTRAR FILTRO');
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','SUBMENU - CADASTRAR MARCA');

                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','MENU - GERENCIAR USER');
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','SUBMENU - LIBERAR MARCA');
                    /* $regrasNaoAssociadasAoUsuarioQuery->where('nome', '!=','SUBMENU - CADASTRAR MARCA'); */
                    
                }
                
                


                if ($this->search) {
                    $regrasNaoAssociadasAoUsuarioQuery->where('nome', 'like', '%' . $this->search . '%');
                    // Adicione mais condições de pesquisa conforme necessário para outros campos
                }

                $this->regrasNaoAssociadasAoUsuario = $regrasNaoAssociadasAoUsuarioQuery->get();
            }
        }

        return view('livewire.users.liberar-cliente', [
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

                $userLiberado = User::find($this->selectedUser);
                // Log ação de usuário
                $userId = auth()->user()->id;
                $userName = auth()->user()->name; 
                UserAction::create([
                    'user_id' => $userId,
                    'action_type' => 'permissao',
                    'description' => ''. $userName .' REMOVEU as permissão(ões) do cliente: '. $userLiberado->name .'.',
                ]);
                //Logs - fim
                
            } else {
                return ['success' => false, 'message' => 'Usuário não encontrado.'];
            }
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Erro ao remover as regras do usuário.'];
        }
    }



/*public $permissao_padrao = [1,2,3,4,5,6,9,99,102];
//public $permissao_padrao = [1,2,3,4,5,6,9,10,34];
public function liberarCliente()
{
    if($this->selectedUser){
     
        $userLiberado = User::find($this->selectedUser);
        
        foreach ($this->permissao_padrao as $regra_id) {
            // Verifica se a combinação user_id e regra_id já existe
            $existingRecord = RegraUser::firstOrCreate([
                'user_id' => $this->selectedUser,
                'regra_id' => $regra_id
            ]);
        }
        if($this->checkboxLiberarMarcas){


            $marcas = Marca::where('referencia', '!=', 99999)->where('isCliente', '!=', 1)->get();

            foreach ($marcas as $marca) {
                BrandUser::create([
                    'brand_id' => $marca->id,
                    'user_id' => $this->selectedUser,
                ]);
            }

            $this->notification()->success(
                $title = 'Permissões!',
                $description = 'Cliente liberado com todas marca(s).'
            );

            

            $this->checkboxLiberarMarcas = false;
            \Log::info('cliente liberado com todas marcas: cliente: '.$userLiberado->name.' liberado por. USER: '. Auth::user()->name);

        }elseif($this->checkboxLiberarSemMarcas){ //AQUI LIBERA APENAS A MARCA 037 - SEM MARCAS

            $marcas = Marca::where('referencia', '=', '37')->where('isCliente', '<>', 1)->get();


            foreach ($marcas as $marca) {
                BrandUser::create([
                    'brand_id' => $marca->id,
                    'user_id' => $this->selectedUser,
                ]);
            }

            $this->notification()->success(
                $title = 'Permissões!',
                $description = 'Cliente liberado com a marca (037).'
            );

            $this->checkboxLiberarSemMarcas = false;
            \Log::info('cliente liberado com a marca (037): cliente: '.$userLiberado->name.' liberado por. USER: '. Auth::user()->name);
        }
        else{
            $this->notification()->success(
                $title = 'Permissões!',
                $description = 'Cliente liberado com sucesso.'
            );
            \Log::info('cliente liberado sem marcas: cliente: '.$userLiberado->name.' liberado por. USER: '. Auth::user()->name);
        }

        // Log ação de usuário
        $userId = auth()->user()->id;
        $userName = auth()->user()->name; 
        UserAction::create([
            'user_id' => $userId,
            'action_type' => 'liberado',
            'description' => ''. $userName .' LIBEROU o cliente: '. $userLiberado->name .'.',
        ]);
        //Logs - fim
        

    }else{
        $this->notification()->error(
            $title = 'Erro!!!',
            $description = 'Selecione um cliente.'
        );
        $this->checkboxPadrao = false;
    }
}*/



public $permissao_padrao = [1,2,3,4,5,6,9,99,102];

public function liberarCliente()
{
    if (!$this->selectedUser) {
        /*$this->notification()->error(
            $title = 'Erro!!!',
            $description = 'Selecione um cliente.'
        );*/
        $this->dispatch('error',  title: 'Selecione um cliente');
        $this->checkboxPadrao = false;
        return;
    }

    $userLiberado = User::find($this->selectedUser);

    // Verifica se já existem todas as permissões
    $regrasExistentes = RegraUser::where('user_id', $this->selectedUser)
        ->whereIn('regra_id', $this->permissao_padrao)
        ->pluck('regra_id')
        ->toArray();

    $regrasFaltando = array_diff($this->permissao_padrao, $regrasExistentes);

    // Só cria se estiverem faltando
    foreach ($regrasFaltando as $regra_id) {
        RegraUser::create([
            'user_id' => $this->selectedUser,
            'regra_id' => $regra_id
        ]);
    }

    $jaTemTodasRegras = empty($regrasFaltando);

    $msgMarcas = '';
    $jaTemTodasMarcas = false;

    if ($this->checkboxLiberarMarcas) {
        $marcas = Marca::where('referencia', '!=', 99999)->where('isCliente', '!=', 1)->get();

        $marcasNovas = [];
        foreach ($marcas as $marca) {
            $existe = BrandUser::where('brand_id', $marca->id)
                ->where('user_id', $this->selectedUser)
                ->exists();

            if (!$existe) {
                $marcasNovas[] = [
                    'brand_id' => $marca->id,
                    'user_id' => $this->selectedUser,
                ];
            }
        }

        if (!empty($marcasNovas)) {
            BrandUser::insert($marcasNovas);
            $msgMarcas = 'Cliente liberado com todas marca(s).';
            \Log::info('cliente liberado com todas marcas: cliente: '.$userLiberado->name.' liberado por. USER: '. Auth::user()->name);
        } else {
            $jaTemTodasMarcas = true;
        }

        $this->checkboxLiberarMarcas = false;
    } elseif ($this->checkboxLiberarSemMarcas) {
        $marcas = Marca::where('referencia', '=', '37')->where('isCliente', '<>', 1)->get();

        $marca37Nova = [];
        foreach ($marcas as $marca) {
            $existe = BrandUser::where('brand_id', $marca->id)
                ->where('user_id', $this->selectedUser)
                ->exists();

            if (!$existe) {
                $marca37Nova[] = [
                    'brand_id' => $marca->id,
                    'user_id' => $this->selectedUser,
                ];
            }
        }

        if (!empty($marca37Nova)) {
            BrandUser::insert($marca37Nova);
            $msgMarcas = 'Cliente liberado com a marca (037).';
            \Log::info('cliente liberado com a marca (037): cliente: '.$userLiberado->name.' liberado por. USER: '. Auth::user()->name);
        } else {
            $jaTemTodasMarcas = true;
        }

        $this->checkboxLiberarSemMarcas = false;
    } else {
        $msgMarcas = 'Cliente liberado com sucesso.';
        \Log::info('cliente liberado sem marcas: cliente: '.$userLiberado->name.' liberado por. USER: '. Auth::user()->name);
    }

    // Se já tinha todas as regras E todas as marcas
    if ($jaTemTodasRegras && $jaTemTodasMarcas) {
        session()->flash('info', 'Este cliente já possui todas as permissões e marcas liberadas.');
        $this->notification()->info(
            $title = 'Aviso!',
            $description = 'Cliente já estava totalmente liberado.'
        );
        $this->dispatch('success',  title: 'Este cliente já possui todas as permissões e marcas liberadas.');
    } else {
        $this->notification()->success(
            $title = 'Permissões!',
            $description = $msgMarcas ?: 'Cliente liberado com sucesso.'
        );
        //$this->dispatch('success',  title: 'Cliente liberado com sucesso.');
        // Log ação de usuário
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
        UserAction::create([
            'user_id' => $userId,
            'action_type' => 'liberado',
            'description' => $userName . ' LIBEROU o cliente: ' . $userLiberado->name . '.',
        ]);
    }
}







}
