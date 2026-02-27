<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use App\Models\UserAction;

class BloqueioUser extends Component
{

    public $search;
    public bool $bloqueio;
    public $userID;

    public function toggleBloqueio($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->update(['bloqueio' => !$user->bloqueio ? 1 : 0]);
        }
    }

    public function showConfirmDelete($id){
        $this->userID = $id;
        $this->dispatch('showDeleteUser',  title: 'Deletar usuário?'); 
    }

    #[On('deleteUser')]
    public function deleteUser()
{
    $userId = auth()->user()->id;

    try {
        // Busca o usuário pelo ID
        $userToDelete = User::find($this->userID);

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




    public function render()
    {
        return view('livewire.users.bloqueio-user',[
            
            'users' => User::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orderBy('name', 'asc')
                ->get(),
        ]);
    }

}
