<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use WireUi\Traits\Actions;

class RegistrarUser extends Component
{
    use Actions;

    public $name;
    public $email;
    public $password;
    public $passwordConfirmation;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'same:passwordConfirmation'],
    ];

    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        /* return redirect()->route('/'); */
        $this->notification()->success(
            $title = 'Usuário',
            $description = 'Usuário cadastrado com sucesso.'
        );
        $this->reset('name', 'email', 'password', 'passwordConfirmation');
    }


    public function render()
    {
        return view('livewire.users.registrar-user');
    }
}
