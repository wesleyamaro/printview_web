<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;

use App\Models\User;
use App\Models\Pedido;
use App\Models\Marca;
use App\Models\Produto;
use App\Models\ItemPedido;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

use App\Models\UserAction;

use Illuminate\Support\Facades\Log;

use WireUi\Traits\Actions;

use Livewire\WithPagination;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PedidoTable extends Component
{

    use Actions;
    use WithPagination;

    public $prefeitura; // usado apenas se for cliente prefeitura

    public $correiacor = [];

    //public $pedidoList = [];
    public $userList = [];

    public $search = '';
    public $searchUser = '';
    public $selectedStatus = '';
    public $selectedUser = null;

    public $qtpagina = 50;
    public $perPage = 20;

    public $data_inicial;
    public $data_final;
    public $filterGrupo;

    public $filter_referencia_produto;


    public $pedidos;

    public $imgInfo;
    public $status;
    public $statusSelectedReport = 'aberto'; //usado pra o modal report all pedidos

    public $statuspedido;

    public $motivocancelar = '';
    public $motivo_cancelamento = ''; // Vem do banco para exibir no modal do pedido

    public $id_pedido;
    public $cliente;
    public $foto;

    public $pedido;
    public $usuario;
    public $data;
    public $usuarioNome;
    public $created;
    public $itensPedido = [];
    public $quantidadeitensPedido;

    public $idpedido;

    public $pedido_modelo;
    public $observacao;

    public $marca;
    public $grade; //usado editar pedido
    public $grupo; //usado editar pedido
    public $observacoes;
    public $aplicativo;

    public $itemId; // Usada pra deletar pedido
    public $productId;

    public $id_produto = [];
    public $quantidade;


    public $editTransferModal = false;
    public bool $filtroModal = false;
    public $myModalimg = false;
    public $selectedPedido = null;

    //MODAL
    public bool $myModal = false;

    public $quantidades = [];
    public $medida = [];
    public $userpedido;

    public $pedidouser;
    public $imageUrl = '';

    public $npedido;
    public $username;
    public $useremail;

    public $itenspedidoList = [];
    public $itens_qnde = 0000;
    public $pares_qnde = 0000;
    public $data_created;
    public $quantities = [];

    public $userLogado;

    public $clientePedido = null; //usado pra alterar o cliente no pedido.

    public $userAnterior;

    public $imageItens = []; // usado para imagem dos itens do pedido. no navigate

    public $nome_prefeitura = ''; // Usado para seach o nome da prefeitura

    //Usado no report de pedidos para filtrar os pedidos
    public bool $filter_abertos = false;
    public bool $filter_cadastrados = false;
    public bool $filter_parcialmente_entregues = false;
    public bool $filter_entregues = false;
    public $filter_data_inicial;
    public $filter_data_final;



    public function mount()
    {
        //$this->userList = User::where('bloqueio', '!=', 1)->orderBy("name", "asc")->get();
        
        //Removi a opção de mostrar apenas clientes que nao tinha bloqueio pois pode consultar pedidos antigos
        $this->userList = User::orderBy("name", "asc")->get();


        $this->userLogado = Auth::user()->id;


        // Verifique se o usuário autenticado possui a permissão "EDITOR"
        /* $hasEditorPermission = Auth::user()->regras->contains('nome', 'VER TODOS - PEDIDOS');
    
        if ($hasEditorPermission) {
            // Se o usuário tem permissão "EDITOR", busque todos os pedidos com o status "aberto"
            //$this->pedidoList = Pedido::where('status', '!==' ,'Entregue')->get();
            
        } else {
            // Caso contrário, busque apenas os pedidos do usuário autenticado
            $this->pedidoList = Pedido::where('user_id', Auth::id())
            ->where('status', 'aberto')->get();
        }*/
    }
    // Update cor correia fim


    //GERA PDF
    public function generatePdf($pedidoId)
    {
        //$pedidos = Pedido::findOrFail($pedidoId);

        $pedidos = Pedido::with('itemPedidos')->where('id', $pedidoId)->get();

        /*
    $pedidos = Pedido::with(['itemPedidos' => function($query) {
    $query->orderBy('produto_id', 'asc');
    }])->where('id', $pedidoId)->get();*/



        $pdf = PDF::loadView('reportpedido', ['pedidos' => $pedidos]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, $pedidoId . '.pdf');
    }

    public function updatedCorreiacor($value, $produtoId)
    {

        $user_id = auth()->id();
        $itemCarrinho = ItemPedido::where('produto_id', $produtoId)
            ->where('user_id', $user_id)
            ->first();

        if ($itemCarrinho) {
            $itemCarrinho->correiacor = $value;
            $itemCarrinho->save();


            // Log ação de usuário
            $userId = auth()->user()->id;
            $userName = auth()->user()->name;
            UserAction::create([
                'user_id' => $userId,
                'action_type' => 'update',
                'description' => '' . $userName . ' ALTEROU cor da correia para: ' . $value . ' produto id: ' . $produtoId . '.',
            ]);
            //Logs - fim

        }
    }

    //Imprimir Todos pedidos por status
    /*public function imprimirPedidos()
    {

        $pedidos = Pedido::where('status', $this->statusSelectedReport)->orderBy('created_at', 'asc')->get();

        $pdf = PDF::loadView('livewire.pedidos.report-all-pedidos', ['pedidos' => $pedidos]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'pedidos.pdf');
    }*/


    #region IMPRIMIR TODO O PEDIDO COM QUANTIDADES
    public function imprimirPedidos($id = null)
    {
        $query = Pedido::query();

        // Coleção de status para filtrar
        $status = [];

        // Verifica quais filtros foram ativados e adiciona ao array de status
        if ($this->filter_abertos) {
            $status[] = 'aberto';
        }

        if ($this->filter_cadastrados) {
            $status[] = 'cadastrado';
        }

        if ($this->filter_parcialmente_entregues) {
            $status[] = 'parcialmente entregue';
        }

        if ($this->filter_entregues) {
            $status[] = 'entregue';
        }

        // Aplica o filtro apenas se houver status selecionados
        if (!empty($status)) {
            $query = $query->whereIn('status', $status);
        } else {
            $query = $query->where('status', 'aberto');
        }

        // Filtra por período
        if ($this->filter_data_inicial && $this->filter_data_final) {
            $query = $query->whereBetween('created_at', [$this->filter_data_inicial, $this->filter_data_final]);
        }

        // Ordena por data de criação e carrega os itens relacionados
        $pedidos = $query->with('itens')->orderBy('created_at', 'asc')->get();

        $totalItens = 0;
        $somaItens = 0;

        // Calcula o total de itens e a soma das quantidades
        foreach ($pedidos as $pedido) {
            $totalItens += $pedido->itens->count();
            $somaItens += $pedido->itens->sum('quantidade');
        }

        // Gera o PDF
        $pdf = PDF::loadView('livewire.pedidos.report-all-pedidos', [
            'pedidos' => $pedidos,
            'periodoInicial' => $this->filter_data_inicial,
            'periodoFinal' => $this->filter_data_final,
            'totalItens' => $totalItens,
            'somaItens' => $somaItens,
        ]);

        // Retorna o PDF para download
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'Pedidos' . '.pdf');
    }

    #endregion





    //SOLICITAR CANCELAMENTO DO PEDIDO INICIO
    public function cancelarPedidoDialog(): void
    {
        $this->motivocancelar = '';
        $this->dialog()->id('custom')->confirm([
            'icon' => 'question',
            'accept' => [
                'label' => 'Sim, quero cancelar',
                'method' => 'confirmarCancelamento',
                /* 'params' => 'Saved', */
            ],
            'reject' => [
                'label' => 'Não, cancelar',
                /* 'method' => 'ncancelarPedido', */
            ],
        ]);
        $this->reset('motivocancelar');
    }

    public function confirmarCancelamento()
    {
        $pedido = Pedido::find($this->idpedido);
        $pedido->status = 'solicitando cancelamento';
        $pedido->motivo_cancelamento = $this->motivocancelar;
        $pedido->save();

        // Log ação de usuário
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
        UserAction::create([
            'user_id' => $userId,
            'action_type' => 'cancelamento',
            'description' => 'solicitou CANCELAMENTO do pedido ID: ' . $this->idpedido . '.',
        ]);

        $this->notification()->success(
            $title = 'Sucesso!',
            $description = 'Aguarde! Foi solicitado o cancelamento.'
        );
        //Logs - fim

        // Salvar log no laravel (storage)
        \Log::info('Pedido: ' . $this->idpedido . ' Cliente solicitou cancelamento: ' . 'USER: ' . Auth::user()->name);
    }
    //SOLICITAR CANCELAMENTO DO PEDIDO FIM



    //PESQUISAR ESTAMPAS PRA ADD AO PEDIDO - INICIO
    public $estampas = [];
    public $searchEstampa;
    public function searchEstampas()
    {
        $this->estampas = Produto::where('referencia', '=', $this->searchEstampa)->get()->take(10);
    }
    //ADD ESTAMPA PEDIDO - FIM

    //ADD PRODUTO AO PEDIDO - INICIO
    public function addProdutoPedido($produtoId)
    {
        $user = auth()->user();

        $produto = Produto::find($produtoId);

        // Verifica se o produto já está no pedido do usuário
        $itemPedido = ItemPedido::where('user_id', $user->id)
            ->where('produto_id', $produtoId)->where('pedido_id', $this->idpedido)
            ->first();

        if ($itemPedido) {
            // Se o produto já estiver no pedido
            $this->notification()->error(
                $title = 'Error!',
                $description = 'Produto já existe no pedido.'
            );
        } else {
            // Caso contrário, cria um novo item no carrinho com quantidade 1

            ItemPedido::create([
                'pedido_id' => $this->idpedido,
                'produto_id' => $produtoId,
                'quantidade' => 120,
                'quantidade' => 120,
                'user_id' => $user->id,
            ]);


            // Log ação de usuário
            $userId = auth()->user()->id;
            $userName = auth()->user()->name;
            UserAction::create([
                'user_id' => $userId,
                'action_type' => 'add item',
                'description' => 'adicionou item ao pedido id: ' . $produtoId . '.',
            ]);
            //Logs - fim


            // Salvar log no laravel (storage)
            \Log::info('Pedido: ' . $this->idpedido . ' Add item: ' . 'USER: ' . Auth::user()->name);

            $this->notification()->success(
                $title = 'Sucesso!',
                $description = 'Produto adicionado ao pedido.'
            );
        }
    }
    //ADD PRODUTO AO PEDIDO - FIM



    //UPDATE PEDIDO - INICIO
    public function updatePedido()
    {

        $pedido = Pedido::find($this->idpedido);
        $pedido->pedido_modelo = $this->pedido_modelo;
        $pedido->marca = $this->marca;
        $pedido->observacao = $this->observacao;
        $pedido->grade = $this->grade;
        
        $pedido->aplicativo = $this->aplicativo;
        //$pedido->status = $this->statuspedido;
        $pedido->save();

        $this->updateItemPedidos($pedido);
    }
    public function updateItemPedidos($pedido)
    {
        foreach ($this->itenspedidoList as $item) {
            $itemPedido = ItemPedido::find($item->id);
            $itemPedido->quantidade = $this->quantities[$item->produto->id];
            $itemPedido->correiacor = $this->correiacor[$item->produto->id];
            $itemPedido->medida = $this->medida[$item->produto->id];
            $itemPedido->save();
        }
        $this->notification()->success(
            $title = 'Sucesso!',
            $description = 'Pedido alterado!.'
        );
        $this->itensPedido();

        // Log ação de usuário
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
        UserAction::create([
            'user_id' => $userId,
            'action_type' => 'update',
            'description' => '' . $userName . ' ALTEROU o pedido: ' . $this->idpedido . '.',
        ]);
        //Logs - fim

        // Salvar log no laravel (storage)
        \Log::info('Pedido: ' . $this->idpedido . ' Alterado: ' . 'USER: ' . Auth::user()->name);
    }


    //Altera o cliente do pedido - start
    public function updatedclientePedido()
    {
        $this->dispatch('showUpdateClientePedido',  title: 'Atenção! Alterar o cliente do pedido?', description: 'O cliente do pedido será alterado.');
    }

    #[On('confirmUpdateClientePedido')]
    public function updateClientePedido()
    {
        $pedido = Pedido::find($this->idpedido);

        /*if($pedido->user_id == 3 || $pedido->user_id == 34){*/
        if ($this->clientePedido) {
            $this->userAnterior = $pedido->user_id;
            $pedido->user_id = $this->clientePedido;
            $pedido->save();
            $this->dispatch('success',  title: 'Sucesso! Cliente do pedido alterado.');
        } else {
            $this->dispatch('error',  title: 'Error! Selecione um cliente', description: 'Nenhum cliente selecionado.');
        }
        /*}else{
            $this->dispatch('error',  title: 'Error! Não pode alterar o cliente', description: 'Só pode alterar se estiver no seu nome.'); 
        }*/
        // Log ação de usuário
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
        UserAction::create([
            'user_id' => $userId,
            'action_type' => 'Alterou cliente',
            'description' => 'ALTEROU o cliente  do pedido ID: ' . $this->idpedido . ' do cliente ID: ' . $this->userAnterior . ' para o cliente id: ' . $this->clientePedido . '.',
        ]);
        //Logs - fim
    }
    //Altera o cliente do pedido - end


    //UPDATE PEDIDO - FIM

    //Altera status pedido - inicio
    public function updatedStatusPedido()
    {

        try {
            if ($this->statuspedido > 0) {
                $pedido = Pedido::findOrFail($this->idpedido);
                $pedido->status = $this->statuspedido;
                $pedido->save();

                $this->notification()->success(
                    'Sucesso!',
                    'Status alterado!.'
                );
            } else {
                $this->notification()->error(
                    'Error!',
                    'Selecione um status.'
                );
            }

            // Log ação de usuário
            $userId = auth()->user()->id;
            $userName = auth()->user()->name;
            UserAction::create([
                'user_id' => $userId,
                'action_type' => 'status',
                'description' => 'ALTEROU o status do pedido ID: ' . $this->idpedido . ' para ' . $this->statuspedido . '.',
            ]);
            //Logs - fim

            // Salvar log no laravel (storage)
            \Log::info('Pedido status: ' . $this->idpedido . ' Status alterado: ' . $this->statuspedido . ' USER: ' . Auth::user()->name);
        } catch (ModelNotFoundException $e) {
            // Trate o erro aqui. Por exemplo, você pode retornar uma mensagem de erro.
        }
    }
    //Altera status pedido - fim



    //Altera Genero(Categoria) pedido - inicio
    public function updatedGrupo()
    {

        try {
            if ($this->grupo > 0) {
                $pedido = Pedido::findOrFail($this->idpedido);
                $pedido->grupo = $this->grupo;
                $pedido->save();

                $this->notification()->success(
                    'Sucesso!',
                    'Grupo alterado!.'
                );
            } else {
                $this->notification()->error(
                    'Error!',
                    'Selecione um grupo.'
                );
            }

            // Log ação de usuário
            $userId = auth()->user()->id;
            $userName = auth()->user()->name;
            UserAction::create([
                'user_id' => $userId,
                'action_type' => 'Grupo',
                'description' => 'ALTEROU o grupo do pedido ID: ' . $this->idpedido . ' para ' . $this->grupo . '.',
            ]);
            //Logs - fim

            // Salvar log no laravel (storage)
            \Log::info('Pedido grupo: ' . $this->idpedido . ' Grupo alterada: ' . $this->grupo . ' USER: ' . Auth::user()->name);
        } catch (ModelNotFoundException $e) {
            // Trate o erro aqui. Por exemplo, você pode retornar uma mensagem de erro.
        }
    }
    //Altera Genero(Categoria) pedido - fim



    //ALTERAR STATUS PEDIDO PARA ENTREGUE - INICIO
    public function showEntregarPedido($pedidoId)
    {
         $this->idpedido = $pedidoId;
         
        $this->entregarPedido(); //Entregando o pedido sem confirmação (PROVISORIO)
        
       
        $this->dispatch('showEntregarPedido',  title: 'Entregar todo o pedido?', description: 'Entregar o pedido.');
    }

    #[On('confirmEntregarPedido')]
    public function entregarPedido()
    {

        $pedido = Pedido::findOrFail($this->idpedido);
        $pedido->status = 'Entregue';
        $pedido->save();

        // Salvar log no laravel (storage)
        \Log::info('Pedido status: ' . $this->idpedido . ' Status alterado: entregue. USER: ' . Auth::user()->name);

        // Log ação de usuário
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
        UserAction::create([
            'user_id' => $userId,
            'action_type' => 'entregue',
            'description' => 'ENTREGOU o pedido id: ' . $pedido->id . '.',
        ]);
        //Logs - fim

        $this->dispatch('success',  title: 'Pedido entregue com sucesso',);
    }
    //ALTERAR STATUS PEDIDO PARA ENTREGUE - FIM



    //ALTERAR STATUS PEDIDO PARA PARCIALMENTE ENTREGUE - INICIO
    public function showEntregaParcialmentePedido($pedidoId)
    {

        $this->idpedido = $pedidoId;
        
        $this->entregarParcialmentePedido(); //Entregando o pedido sem confirmação
        
        $this->dispatch('showEntregaParcialmentePedido',  title: 'Entregar parcialmente o pedido?', description: 'Entregar o pedido.');
    }
    #[On('confirmEntregaParcialmente')]
    public function entregarParcialmentePedido()
    {

        $pedido = Pedido::findOrFail($this->idpedido);
        $pedido->status = 'parcialmente entregue';
        $pedido->save();

        // Salvar log no laravel (storage)
        \Log::info('Pedido status: ' . $this->idpedido . ' Status alterado: parcialmente entregue. USER: ' . Auth::user()->name);

        // Log ação de usuário
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
        UserAction::create([
            'user_id' => $userId,
            'action_type' => 'parcialmente entregue',
            'description' => '' . $userName . ' PARCIALMENTE ENTREGUE o pedido id: ' . $pedido->id . '.',
        ]);
        //Logs - fim

        $this->dispatch('success',  title: 'Pedido parcialmente entregue com sucesso',);
    }
    //ALTERAR STATUS PEDIDO PARA PARCIALMENTE ENTREGUE - FIM


    public function carregarQuantidades()
    {
        foreach ($this->itenspedidoList as $item) {
            $this->quantities[$item->produto->id] = $item->quantidade;
            $this->correiacor[$item->produto->id] = $item->correiacor;
            $this->medida[$item->produto->id] = $item->medida;
        }
    }

    public function itensPedido()
    {

        //Aqui esta buscando os itens do pedido
        //$this->itenspedidoList = ItemPedido::where('pedido_id', $this->idpedido)->get();
        
        $this->itenspedidoList = ItemPedido::with('produtos')
            ->where('pedido_id', $this->idpedido)
            ->get()
            ->sortBy(function ($item) {
                return $item->produtos->referencia ?? '';
            })
            ->values(); // pra resetar os índices

        //Armazena as imagens dos itens do pedido no array imageItens
        $this->imageItens = [];

        foreach ($this->itenspedidoList as $item) {
            $this->imageItens[] = $item->imagem_cliente
                ? url("storage/produtos/imagens_pedidos/{$item->imagem_cliente}")
                : url("storage/{$item->produtos->imagem}");
        }


        $this->itens_qnde = $this->itenspedidoList->count();
        $this->pares_qnde = $this->itenspedidoList->sum('quantidade');
        $this->carregarQuantidades();

        // Recupere o pedido com base no $idpedido
        $this->pedidouser = Pedido::with('itens.produtos')->findOrFail($this->idpedido);

        // Recupere os dados do usuário associado ao pedido
        $this->pedido_modelo = $this->pedidouser->pedido_modelo;
        $this->userpedido = $this->pedidouser->user_id;
        $this->username = $this->pedidouser->user->name;
        $this->useremail = $this->pedidouser->user->email;
        $this->data_created = $this->pedidouser->created_at->format('d/m/Y : H:i');
        $this->marca = $this->pedidouser->marca;
        $this->prefeitura = $this->pedidouser->prefeitura;
        $this->observacao = $this->pedidouser->observacao;
        $this->grupo = $this->pedidouser->grupo; //Exibir grupo do pedido (bebê, infantil, feminino, masculino)
        $this->grade = $this->pedidouser->grade; //Exibir a grade do pedido
        $this->status = $this->pedidouser->status;
        $this->aplicativo = $this->pedidouser->aplicativo;
        $this->motivo_cancelamento = $this->pedidouser->motivo_cancelamento;
    }



    public function modalShow($idpedido)
    {
        $this->idpedido = $idpedido;

        $this->itensPedido(); //Faz a consulta antes de abrir o modal é ultil pra eu chamar a consulta de qualquer lugar
        $this->myModal = true;
    }

    //DELETE ITEM PEDIDO - INICIO
    public function delItem($item)
    {
        $this->itemId = $item;
        $this->dispatch('showDeleteItem',  title: 'Deletar item?');
    }

    #[On('deleteItem')]
    public function deleteItem()
    {


        // Depois de obter as informações do cliente, você pode deletar o item do pedido
        ItemPedido::where('id', $this->itemId)->delete();

        // Salvar log no laravel (storage)
        \Log::info('Pedido: ' . $this->idpedido . ' _ Exclusão do item id: ' . $this->itemId . 'USER: ' . Auth::user()->name);


        //Msg sucesso
        $this->dispatch('success',  title: 'Item deletado.');

        $this->itensPedido();

        // Log ação de usuário
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
        UserAction::create([
            'user_id' => $userId,
            'action_type' => 'delete',
            'description' => 'DELETOU o item id: ' . $this->itemId . '',
        ]);
        //Logs - fim

        $this->reset('itemId');
        // Salvar log no laravel (storage)
        \Log::info('Pedido item Delete: ' . $this->idpedido . 'delete: item pedido deletado' . 'USER: ' . Auth::user()->name);
    }
    //DELETE ITEM PEDIDO - FIM

    //DELETE PEDIDO - INICIO
    public function delPedido($idpedido)
    {
        $this->idpedido = $idpedido;
        $this->dispatch('showDeletePedido',  title: 'Deletar pedido?');
    }

    #[On('deletePedido')]
    public function deletePedido()
    {

        $Pedido = Pedido::where('id', $this->idpedido)->first();
        $userPedido = $Pedido->user->name;

        Pedido::where('id', $this->idpedido)->delete();

        //Msg de sucesso
        $this->dispatch('success',  title: 'Pedido deletado.');


        // Log ação de usuário
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
        UserAction::create([
            'user_id' => $userId,
            'action_type' => 'delete',
            'description' => 'DELETOU o pedido id: ' . $this->idpedido . ' do Usuário: ' . $userPedido,
        ]);
        //Logs - fim

        //Reseta o idpedido
        $this->reset('idpedido');

        // Salvar log no laravel (storage)
        \Log::info('Pedido Delete: ' . $this->idpedido . 'delete: pedido deletado' . 'USER: ' . Auth::user()->name);
    }
    //DELETE PEDIDO - FIM

    /*  
    public function render()
    {

        
    $hasEditorPermission = Auth::user()->regras->contains('nome', 'VER TODOS - PEDIDOS');
    
    
    if ($hasEditorPermission) {
    $query = Pedido::query();

    if ($hasEditorPermission) {
        
        if($this->selectedStatus != ""){
            $query->where('status', $this->selectedStatus);
        }else{
           
           $query->where('status', '!=','Entregue')->where('status', '!=','Cancelado')->where('status', '!=', 'cadastrado')->where('status', '!=', 'parcialmente entregue');
        }
    
    } else {
        $query->where('user_id', Auth::id());
    }

    // Aplicar filtros, se definidos
    if ($this->search) {
        $query->where('id',  $this->search )->orWhere('pedido_modelo','LIKE', '%'.$this->search.'%');
    }

    if ($this->selectedUser) {
        $query->where('user_id', $this->selectedUser);
    }


    if ($this->data_inicial && $this->data_final) {
        $query->whereBetween('created_at', [$this->data_inicial, $this->data_final]);
    }
    

    $this->pedidoList = $query->get();

    } else {
        
        //SEM PERMISSAO - PARA CLIENTES
        $query = Pedido::query();

        $query->where('user_id', Auth::id());
    
        if($this->selectedStatus != ""){
            $query->where('status', $this->selectedStatus);
        }else{
             $query->where('status', '!=','Entregue')->where('status', '!=','Cancelado')->where('status', '!=', 'parcialmente entregue');
        }

        // Aplicar filtros, se definidos
        if ($this->search) {
            $query->where('id',  $this->search )->orWhere('pedido_modelo', 'LIKE', '%'.$this->search.'%');
        }

        if ($this->data) {
            $query->whereDate('created_at', '=', $this->data);
        }

        $this->pedidoList = $query->get();

        }
        
        return view('livewire.pedidos.pedido-table',[

            'todo' => $this->npedido,
            'totalPedidos' => count($this->pedidoList),
        ]);

    }*/
    
    
    #region REPORT NEW ABA
    public function imprimirOrder($orderId)
    {  //dd($orderId);
        //session()->put('model', $this->reportModel);

         // Gera a URL para o relatório
        $url = route('pedidos.report', ['id' => $orderId]);
        
        // Dispara evento para abrir em nova aba
        $this->dispatch('openReportTab', url: $url);
        
    }

    public function configPrint($orderId)
    {
        // Armazenará o nome do arquivo de template Blade (view) a ser usado
        $viewName = 'reports.order.print-order-v1';
        
        // Define as relações (tabelas relacionadas) que serão carregadas
        $relations = ['itemPedidos', 'itemPedidos.produto', 'user'];
        
        
        // Verifica se o usuário tem permissão para ver todos os pedidos
        $hasEditorPermission = Auth::user()->regras->contains('nome', 'VER TODOS - PEDIDOS');

         // Cria a consulta base para buscar o Pedido pelo ID fornecido
        $pedidoQuery = Pedido::query()->where('id', $orderId);

        if (!$hasEditorPermission) {
            $pedidoQuery->where('user_id', Auth::id());
        }
        
        // Cria a consulta base para buscar o Pedido pelo ID fornecido
        //$pedidoQuery = Pedido::query()->where('id', $orderId)->where('user_id', Auth::id());
        
        // Verifica se o pedido existe
        if (!$pedidoQuery->exists()) {
            Log::error("Pedido não encontrado ID: " . $orderId);
            return redirect()->back()->with('error', 'Pedido não encontrado');
        }
        
        // Busca o pedido com as relações
        $pedido = $pedidoQuery->with($relations)->first();
        
        // Opcionalmente, você pode contar as quantidades ou fazer outras operações
        $quantidadeTotal = $pedido->itemPedidos->sum('quantidade');
        
        // Retorna a view com os dados
        return view($viewName, compact('pedido', 'quantidadeTotal'));
    }
    #endregion


    #region CLEAR FILTERS
    public function clearFilters()
    {
        $this->reset([
            'search',
            'selectedStatus',
            'selectedUser',
            'filterGrupo',
            'nome_prefeitura',
            'data_inicial',
            'data_final',
            'filter_referencia_produto'
            
        ]);
    }

    //Paginate auto
    public function loadMore()
    {
        $this->perPage += 20;
    }
    //RENDER COM PAGINATE
    /* public function render()
    {
        // Verifica se o usuário tem permissão para ver todos os pedidos
        $hasEditorPermission = Auth::user()->regras->contains('nome', 'VER TODOS - PEDIDOS');

        // Cria a query base
        $query = Pedido::query();

        // Filtra por status se selecionado, caso contrário, aplica um filtro para excluir determinados status
        if ($this->selectedStatus != "") {
            $query->where('status', $this->selectedStatus);
        } else {
            if ($this->search == "") { 
                $excludedStatuses = $hasEditorPermission ?
                    ['Entregue', 'Cancelado', 'cadastrado',  'parcialmente entregue'] :
                    ['Entregue', 'Cancelado', 'parcialmente entregue'];

                $query->whereNotIn('status', $excludedStatuses);
            }
        }

        // Aplica filtros adicionais se o usuário não tem permissão de editor
        if (!$hasEditorPermission) {
            $query->where('user_id', Auth::id());
        }

        
       if ($this->search) {
            $query->where(function ($query) {
                $query->where('id',  'LIKE', '%' . $this->search . '%' )
                    ->orWhere('pedido_modelo', 'LIKE', '%' . $this->search . '%');
            });
        }

        if ($this->selectedUser) {
            $query->where('user_id', $this->selectedUser);
        }

        if ($this->filterGrupo) {
            $query->where('grupo', $this->filterGrupo);
        }
        
        if ($this->nome_prefeitura) {
            $query->where('prefeitura', 'LIKE', '%' . $this->nome_prefeitura . '%');
        }

        if ($this->data_inicial && $this->data_final) {
            $query->whereBetween('created_at', [$this->data_inicial, $this->data_final]);
        }

        // Aplica a paginação aos resultados
        $pedidoList = $query->paginate($this->perPage);

        // Calcula a quantidade total de itens em todos os pedidos
        $totalItensPedido = $pedidoList->sum(function ($pedido) {
            return $pedido->itens->sum('quantidade');
        });

        // Retorna a view com os dados necessários
        return view('livewire.pedidos.pedido-table', [
            'todo' => $this->npedido,
            'totalPedidos' => count($pedidoList),
            'pedidoList' => $pedidoList,
            'totalItensPedido' => $totalItensPedido,
        ]);
    } */



    /**
     * Verifica se o usuário tem permissão para ver todos os pedidos
     */
    private function hasEditorPermission(): bool
    {
        return Auth::user()->regras->contains('nome', 'VER TODOS - PEDIDOS');
    }

    /**
     * Constrói a query base com todos os filtros aplicados
     */
    private function buildBaseQuery(bool $hasEditorPermission)
    {
        $query = Pedido::query();
        
        // Aplica filtro de status
        $this->applyStatusFilter($query, $hasEditorPermission);
        
        // Aplica filtro de usuário se não tiver permissão de editor
        if (!$hasEditorPermission) {
            $query->where('user_id', Auth::id());
        }
        
        // Aplica filtros de busca
        $this->applySearchFilters($query);
        
        return $query;
    }

    /**
     * Aplica o filtro de status com base nas permissões
     */
    private function applyStatusFilter($query, bool $hasEditorPermission)
    {
        if ($this->selectedStatus != "") {
            $query->where('status', $this->selectedStatus);
            return;
        }
        
        // Se não há busca, aplica exclusão de status
        if ($this->search == "") {
            $excludedStatuses = $hasEditorPermission
                ? ['Entregue', 'Cancelado', 'cadastrado', 'parcialmente entregue']
                : ['Entregue', 'Cancelado', 'parcialmente entregue'];
                
            $query->whereNotIn('status', $excludedStatuses);
        }
    }

    /**
     * Aplica os filtros de busca e outros campos
     */
    private function applySearchFilters($query)
    {
        // Filtro de busca
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('id', 'LIKE', '%' . $this->search . '%')
                ->orWhere('pedido_modelo', 'LIKE', '%' . $this->search . '%');
            });
        }
        
        // Filtro de usuário selecionado
        if ($this->selectedUser) {
            $query->where('user_id', $this->selectedUser);
        }
        
        // Filtro de grupo
        if ($this->filterGrupo) {
            $query->where('grupo', $this->filterGrupo);
        }
        
        // Filtro de prefeitura
        if ($this->nome_prefeitura) {
            $query->where('prefeitura', 'LIKE', '%' . $this->nome_prefeitura . '%');
        }

        // Filtro de referencia do produto
        if ($this->filter_referencia_produto) {
            $query->whereHas('transfers', function ($q) {
                $q->where('referencia', 'LIKE', '%' . $this->filter_referencia_produto . '%');
            });
        }
        
        // Filtro de datas
        if ($this->data_inicial && $this->data_final) {
            $query->whereBetween('created_at', [$this->data_inicial, $this->data_final]);
        }
    }

    /**
     * Calcula o total de itens com otimização para evitar N+1 queries
     */
    private function calculateTotalItems($pedidoList)
    {
        // Carrega os itens de todos os pedidos de uma vez para evitar N+1 queries
        $pedidoList->load('itens');
        
        return $pedidoList->sum(function ($pedido) {
            return $pedido->itens->sum('quantidade');
        });
    }

    
    public $isFilters = [];
    
    public function render()
    {   
        $this->isFilters = [
            'search' => !empty($this->search),
            'selectedStatus' => !empty($this->selectedStatus),
            'selectedUser' => !empty($this->selectedUser),
            'filterGrupo' => !empty($this->filterGrupo),
            'nome_prefeitura' => !empty($this->nome_prefeitura),
            'data_inicial' => !empty($this->data_inicial),
            'data_final' => !empty($this->data_final),
            'filter_referencia_produto' => !empty($this->filter_referencia_produto)
        ];

        $hasFilters = in_array(true, $this->isFilters, true);

        // Cache da verificação de permissão para evitar múltiplas consultas
        $hasEditorPermission = $this->hasEditorPermission();
        
        // Monta a query base com os filtros
        $query = $this->buildBaseQuery($hasEditorPermission);
        
        // Aplica a paginação
        $pedidoList = $query->paginate($this->perPage);
        
        // Calcula totais com otimização para evitar N+1 queries
        $totalItensPedido = $this->calculateTotalItems($pedidoList);
        
        return view('livewire.pedidos.pedido-table', [
            'todo' => $this->npedido,
            'totalPedidos' => $pedidoList->count(),
            'pedidoList' => $pedidoList,
            'totalItensPedido' => $totalItensPedido,
            'hasFilters' => in_array(true, $this->isFilters, true) // Usado para verificar se algum filtro está ativo
        ]);

    }

}
