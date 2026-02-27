<?php

namespace App\Livewire\Users;

use Livewire\Component;

use App\Models\User;
use App\Models\Produto;
use App\Models\ItemPedido;

use App\Models\Marca;

use App\Models\Pedido;

use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

use Livewire\WithPagination;
use Livewire\Attributes\On;

class TopCliente extends Component
{

    public $userList = [];
    public $selectedUser = '';

    public $dataInicial;
    public $dataFinal;

    public $perPage = 100;


    public function mount()
    {
        $user = auth()->user();
        $this->userList = User::where('bloqueio', '!=', 1)->get();
    }
    
        public function generatePdf()
    {
        $userID = $this->selectedUser;
        $dataInicial = $this->dataInicial;
        $dataFinal = $this->dataFinal;

        // Formatando as datas para dd/mm/yyyy
        $dataInicialFormatada = date('d-m-Y', strtotime($dataInicial));
        $dataFinalFormatada = date('d-m-Y', strtotime($dataFinal));

        $topClientes = User::leftJoin('pedidos', function($join) use ($dataInicial, $dataFinal) {
            $join->on('users.id', '=', 'pedidos.user_id')
                ->where('pedidos.status', '!=', 'cancelado')
                ->whereBetween('pedidos.created_at', [$dataInicial, $dataFinal]);
        })
        ->leftJoin('item_pedidos', 'pedidos.id', '=', 'item_pedidos.pedido_id')
        ->select('users.id', 'users.name', 'users.email')
        ->selectRaw('COUNT(DISTINCT pedidos.id) as total_pedidos')
        ->selectRaw('COUNT(item_pedidos.id) as count_itens')
        ->selectRaw('SUM(COALESCE(item_pedidos.quantidade, 0)) as total_items')
        ->selectRaw('(SELECT MAX(created_at) FROM pedidos WHERE pedidos.user_id = users.id AND pedidos.created_at BETWEEN ? AND ?) as ultimo_pedido', [$dataInicial, $dataFinal])
        ->when($this->selectedUser, function ($query) use ($userID) {
            return $query->where('users.id', $userID);
        })->where('users.tipo_user', '!=', 'PRINT')
        ->groupBy('users.id', 'users.name', 'users.email')
        ->orderByDesc('total_items')->get();
        
        $pdf = PDF::loadView('reporttopcliente', ['topClientes' => $topClientes]);

        // Usando as datas formatadas no nome do arquivo
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, $dataInicialFormatada . '-' . $dataFinalFormatada . '.pdf');
    }

    //Paginate auto
    public function loadMore()
    {
        $this->perPage += 50;
    }


    public function render()
    {
        $userID = $this->selectedUser;
        $dataInicial = $this->dataInicial;
        $dataFinal = $this->dataFinal;

        /* $topClientes = ItemPedido::join('pedidos', 'item_pedidos.pedido_id', '=', 'pedidos.id')
            ->select('item_pedidos.user_id')
            ->selectRaw('COUNT(DISTINCT pedidos.id) as count_pedidos')
            ->selectRaw('COUNT(*) as count_itens')
            ->selectRaw('SUM(item_pedidos.quantidade) as total_items')
            ->when($userID, function ($query) use ($userID) {
                // Adiciona a condição de pesquisa apenas se o ID do usuário estiver definido
                return $query->where('item_pedidos.user_id', $userID);
            })
            ->where('pedidos.status', '!=', 'cancelado') // Adiciona a condição para excluir pedidos cancelados
            ->whereBetween('pedidos.created_at', [$dataInicial, $dataFinal]) // Adiciona a condição de filtro por data entre dataInicial e dataFinal
            ->groupBy('item_pedidos.user_id')
            ->orderByDesc('total_items')
            ->paginate($this->perPage); */


                    
                    $topClientes = User::leftJoin('pedidos', function($join) use ($dataInicial, $dataFinal) {
                        $join->on('users.id', '=', 'pedidos.user_id')
                            ->where('pedidos.status', '!=', 'cancelado')
                            ->whereBetween('pedidos.created_at', [$dataInicial, $dataFinal]);
                    })
                    ->leftJoin('item_pedidos', 'pedidos.id', '=', 'item_pedidos.pedido_id')
                    ->select('users.id', 'users.name', 'users.email') // Select only necessary columns
                
                    ->selectRaw('COUNT(DISTINCT pedidos.id) as total_pedidos')
                    ->selectRaw('COUNT(item_pedidos.id) as count_itens')
                    ->selectRaw('SUM(COALESCE(item_pedidos.quantidade, 0)) as total_items')
                    ->selectRaw('(SELECT MAX(created_at) FROM pedidos WHERE pedidos.user_id = users.id AND pedidos.created_at BETWEEN ? AND ?) as ultimo_pedido', [$dataInicial, $dataFinal])
                    ->when($this->selectedUser, function ($query) use ($userID) {
                        return $query->where('users.id', $userID);
                    })->where('users.tipo_user', '!=', 'PRINT')
                    ->groupBy('users.id', 'users.name','users.email') // Group by necessary columns
                    ->orderByDesc('total_items')
                    ->paginate($this->perPage);
               
                


        return view('livewire.users.top-cliente', ['topClientes' => $topClientes]);
    }


}
