<?php

namespace App\Livewire\Users;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\Pagamento;
use Livewire\Attributes\On; 
use App\Models\UserAction;

class PagamentoSistema extends Component
{
    use WithPagination;

    public $search;

    public $boletoId;

    public $perPage = 20;

    public float $valor = 866.00;
    public  $desconto = 0.00;
    public $vencimento;
    public $data_pagamento;
    public $status = "aberto";
    public $observacao = "";

    public $createPagamentoModal = false;
    
    public function updatedDesconto()
    {
        if($this->desconto != null && is_numeric($this->desconto) && is_numeric($this->valor)){
            if($this->desconto <= $this->valor){
                $this->valor = 866.00; 
                $this->valor = ($this->valor - $this->desconto);
            }else{
                // Tratar o caso em que o desconto é maior que o valor
            }
        }else{
            $this->valor = 866.00;
        }

    }

    public function ShowDeletePagamento($id)
    {
        $this->boletoId = $id;

        $this->dispatch('ConfirmDeleteBoleto',  title: 'Atenção! Essa ação não poderar se desfeita.');
    }

    #[On('deleteBoleto')] 
    public function delete(){

        $boletoToDelete = Pagamento::find($this->boletoId);

        if ($boletoToDelete) {
            // Deleta o usuário
            $boletoToDelete->delete();

            // Exibe mensagem de sucesso
            $this->dispatch('success', title: 'Usuário deletado.');

            // Registra ação do usuário
            UserAction::create([
                'user_id' => auth()->id(),
                'action_type' => 'delete',
                'description' => "DELETOU o pagamento",
            ]);
        }
    }

    public function createPagamento()
    {
        $this->validate([
            'valor' => 'required',            
            'vencimento' => 'required',            
            'status' => 'required',
        ]);

        Pagamento::create([
            'valor' => $this->valor,
            'desconto' => $this->desconto,
            'vencimento' => $this->vencimento,
            'data_pagamento' => $this->data_pagamento,
            'status' => $this->status,
            'observacao' => $this->observacao,
        ]);

        // Limpar os campos do formulário

        $this->desconto = '';
        $this->data_pagamento = '';
        $this->observacao = '';

        session()->flash('message', 'Pagamento criado com sucesso.');
    }

    public function showCreateModal(){
        /* $this->valor = $this->valor - $this->desconto; */
        $this->vencimento = now();

        $this->createPagamentoModal = true;
    }
    //Paginate auto
    public function loadMore()
    {   
        $this->perPage += 20;
    }

    public function render()
    {

        $query =  Pagamento::query();

        $pagamento = $query->paginate($this->perPage);

        
        return view('livewire.users.pagamento-sistema',[
            'pagamentoList' => $pagamento,
        ]);
    }
}
