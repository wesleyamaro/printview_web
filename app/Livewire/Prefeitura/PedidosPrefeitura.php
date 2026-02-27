<?php

namespace App\Livewire\Prefeitura;

use Livewire\Component;
use App\Models\PedidoPrefeitura;

class PedidosPrefeitura extends Component
{
    public $search ='';
    public $gabarito;

    public $itemspedidoList = [];


    public $idpedido;

    public $imagePedido = '';

    public $gabaritoEdit = '';
    public $municipioEdit = '';
    public $observacaoEdit = '';
    public $usernameEdit = '';
    public $emailEdit = '';
    public $fotoUserEdit = '';
    public $myModal = false;

    public function showModal($pedidoId){
        
        $this->itemspedidoList = PedidoPrefeitura::find($pedidoId);
        $this->idpedido = $pedidoId;
        $this->municipioEdit = $this->itemspedidoList->municipios->nome;
        $this->gabaritoEdit = $this->itemspedidoList->gabaritos;
        $this->observacaoEdit = $this->itemspedidoList->observacao;
        $this->imagePedidoEdit = $this->itemspedidoList->imagens_cliente;
        $this->usernameEdit = $this->itemspedidoList->usuario->name;
        $this->emailEdit = $this->itemspedidoList->usuario->email;
        $this->fotoUserEdit = $this->itemspedidoList->usuario->profile_photo_path;



        $this->myModal = true;
    }
    public function render()
    {
        $pedidos = PedidoPrefeitura::with('municipios')->whereHas('municipios', function ($query) {
            $query->where('nome', 'like', '%' . $this->search . '%');
            $query->where('pedido_prefeituras.gabaritos', 'like', '%' . $this->gabarito . '%');
        })->get();
        
        return view('livewire.prefeitura.pedidos-prefeitura',[
            'pedidos' => $pedidos
        ]);
    }
}
