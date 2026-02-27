<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\UserAction;

use Livewire\Attributes\On;

class UsersTable extends Component
{
    public $selectedUser;
    public $users = [];

    public $myModal = false;
    public $user;

    public $userId;
    public $name = '';
    public $email = '';
    public bool $bloqueio;

    public function mount(){
        $this->users = User::get();
    }

    

    public function showModalEditUser($id)
    {
        $this->user = User::find($id);
        $this->userId = $id;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->bloqueio = $this->user->bloqueio;
        $this->myModal = true;
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->userId) {
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'bloqueio' => $this->bloqueio,
            ]);

            $this->resetInputFields();
            $this->dispatch('sucess'); // Emitindo um evento de browser.
        }
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->userId = null;
        $this->myModal = false;
    }


    //DELETE USER
    public function showConfirmDeleteUser($id){
        $this->userId = $id;
        $this->dispatch('showDeleteUser',  title: 'Atenção! Qualquer registro ligado ao usuário será excluido.');
    }
 
   #[On('deleteUser')] 
   public function deleteUser()
    {
        $userId = auth()->user()->id;

        try {
            // Busca o usuário pelo ID
            $userToDelete = User::find($this->userId);

            if ($userToDelete) {
                // Deleta o usuário
                $userToDelete->delete();

                // Exibe mensagem de sucesso
                $this->dispatch('success', title: 'Usuário deletado.');

                // Registra ação do usuário
                UserAction::create([
                    'user_id' => $userId,
                    'action_type' => 'delete',
                    'description' => "DELETOU o usuário: $userToDelete->name .'Email: ' .$userToDelete->email",
                ]);
            } else {
                // Usuário não encontrado
                $this->dispatch('error',  title: 'Usuário não encontrado.'); 
            }
        } catch (\Exception $e) {
            // Tratamento de erro de integridade de chave estrangeira
            $this->dispatch('error',  title: 'Erro ao deletar usuário.', description: 'Remova as regras do usuário primeiro.'); 
            // Você também pode logar o erro para depuração:
            // Log::error($e->getMessage());
        }
    }
    //DELETAR USER - FIM

    public function render()
    {
        $query = User::with('regra_user')->orderBy('name', 'asc');
    
        if ($this->selectedUser) {
            $query->where('users.id', $this->selectedUser);
        }
        
        $users = $query->get();
 
        return view('livewire.users.users-table', [
            'userList' => $users,
            'totalUsers' => count($users),
        ]);
    }
    
}
