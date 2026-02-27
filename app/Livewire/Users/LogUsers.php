<?php

namespace App\Livewire\Users;

use Livewire\Component;

use App\Models\UserAction;
use App\Models\User;

use Livewire\WithPagination;
//use Livewire\WithoutUrlPagination;

class LogUsers extends Component
{


    use WithPagination;

    //public $logList;
    public $userList = [];
    public $userSelected = '';
    public $search = '';

    public $data_inicial;
    public $data_final;

    public function mount()
    {       
        $this->userList = User::orderBy("name","asc")->get();
    }

   /*  public function updatedUserselected(){
        $this->logList = UserAction::where("user_id", $this->userSelected)->orderBy("created_at","DESC")->paginate(10);
    } */

    public function search()
    {
        $this->resetPage();
    }

    /* public function render()
    {

        $logs = UserAction::query();

        if (!empty($this->userSelected)) {
            $logs = $logs->where('user_id', $this->userSelected);
        }
    
        if (!empty($this->search)) {
            $logs = $logs->Where('action_type', 'like', '%' . $this->search . '%');
        }
    
        $logs = $logs->orderBy("created_at","DESC")->paginate(50);

        return view('livewire.users.log-users',[
            'logList'=> $logs
        ]);
    } */

    public function render()
    {
        $logs = UserAction::query();
       

        if (!empty($this->userSelected)) {
            $logs = $logs->where('user_id', $this->userSelected);
        }

        if (!empty($this->search)) {
            $logs = $logs->where('action_type', 'like', '%' . $this->search . '%')->orWhere('description', 'like', '%' . $this->search . '%');
        }

        // Filtragem por período de datas
        if (!empty($this->data_inicial) && !empty($this->data_final)) {
            $logs = $logs->whereBetween('created_at', [$this->data_inicial, $this->data_final]);
        }

        $logs = $logs->orderBy("created_at", "DESC")->paginate(50);

        return view('livewire.users.log-users', [
            'logList' => $logs
        ]);
    }

}
