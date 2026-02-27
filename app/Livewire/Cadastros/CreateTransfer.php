<?php

namespace App\Livewire\Cadastros;

use Livewire\Component;

use App\Models\Marca;
use App\Models\Produto;
use App\Models\TransferTable;
use App\Models\ItemPedido;
use App\Models\User;
use App\Models\Filtro;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache; //Usado pra remover o cache do navegador
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

use Livewire\Attributes\On;
use WireUi\Traits\Actions;

class CreateTransfer extends Component
{

    use Actions;
    use WithFileUploads;
    use WithPagination; 

    public $sort = 'desc';
    public $sortField = 'referencia';
    public $perPage = 100;

    public $search = '';
    public $search_genero = '';

    #[Rule('required')]
    public $selectedMarca = '';

    #[Rule('required')] 
    public $referencia;
    
    public $searchItensUsados = ''; // Search em items que ja foram usados em pedidos
    public $transfersUsedPedidos = [];

    public $imagemreferencia;
    
    public bool $editTransferModal =  false;
    
     #[Rule('required')] 
    public $imagem;
    
    public $descricao = 'transfer';

    #[Rule('required|min:3')] 
    public $genero;
    
    public $productId;

    public $searchMarca = '';
    
    public $search_produto = 'transfer';
    

    public $imagens = []; // Para armazenar as imagens selecionadas
    public $referencias = []; // Para armazenar as referências das imagens
    public $filtros = []; // Para armazenar os filtros das imagens
    public $filtro1 = [];
    public $filtro2 = [];
    public $medida = []; //Usado apenas para termopatch


    public $referenciaOriginal;
    public $generoOriginal; 
    public $tipoOriginal;
    public $marcaOriginal;
    public $filtrosOriginal;
    public $imagemOriginal;
    public $selectedProduto;
    public $medidaOriginal;
    

    public $marcaList = [];
    
    

    public $myModalimg = false;

    public $tipo = 'transfer';
    


    

    public function mount(){
       //$this->marcaList = Marca::where('referencia','!=', 99999)->orderBy('referencia', 'asc')->get();
       $this->marcaList = Marca::orderBy('referencia', 'asc')->get();
    }

    public $imageUrl = '';
    public function openModal($imageUrl)
    {
        $this->myModalimg = true;
        $this->imageUrl = $imageUrl;
        //abri imagem do pedido maior
    }
    

    public function updatedImagens()
    {
        foreach ($this->imagens as $index => $imagem) {
            $this->referencias[$index] = pathinfo($imagem->getClientOriginalName(), PATHINFO_FILENAME);
        }
    }



    public function removerImagem($index)
    {
        unset($this->imagens[$index]);
        unset($this->referencias[$index]);
        //unset($this->filtros[$index]);

        unset($this->filtro1[$index]);
        unset($this->filtro2[$index]);

        // Reindex os arrays
        $this->imagens = array_values($this->imagens);
        $this->referencias = array_values($this->referencias);
        //$this->filtros = array_values($this->filtros);

        $this->filtro1 = array_values($this->filtro1);
        $this->filtro2 = array_values($this->filtro2);

        $this->medida = array_values($this->medida);
    }


    public function salvarProdutos()
    { //dd('deu certo');
        $caminhoTipo = 'transfer';
        //dd($this->selectedMarca);
        try {
            // Verifique se há pelo menos um produto na lista
            if (empty($this->imagens)) {
                // Não há produtos para salvar, então saia da função
                session()->flash('error', 'Adicione pelo menos uma imagem antes de salvar');
                return;
            }

            // Verifique se o campo "referencia" está preenchido
            if (empty($this->referencias) || in_array(null, $this->referencias)) {
                session()->flash('error', 'Preencha todos os campos de referência');
                return;
            }

            // Verifique se o campo "marca" está preenchido
            if (empty($this->selectedMarca)) {
                session()->flash('error', 'Selecione uma marca');
                return;
            }

            // Verifique se o campo "genero" está preenchido
            if (empty($this->genero)) {
                session()->flash('error', 'Selecione um gênero');
                return;
            }

            if (empty($this->filtro1)/*  || empty($this->filtro2) */) {
                session()->flash('error', 'Preencha todos os campos de filtros');
                return;
            }

            if ($this->tipo === 'termopatch' && empty($this->medida)) {
                session()->flash('error', 'Preencha todos os campos de medidas');
                return;
            }



            foreach ($this->imagens as $index => $image) {
                //dd($this->medida[$index] ?? null);
                // Extract the image data
                if (empty($this->filtro2[$index])) {

                    $productData = [
                        'imagem' => $image,
                        'genero' => $this->genero,
                        'tipo' => $this->tipo,
                        'medida' => $this->medida[$index] ?? null,
                        'marca_id' => $this->selectedMarca,
                        'referencia' => $this->referencias[$index],
                        'filtros' => $this->filtro1[$index],
                        'user_id' => Auth::id(),
                    ];
                }else{
//dd($this->medida[$index] ?? null);
                    $productData = [
                        'imagem' => $image,
                        'genero' => $this->genero,
                        'tipo' => $this->tipo,
                        'medida' => $this->medida[$index] ?? null,
                        'marca_id' => $this->selectedMarca,
                        'referencia' => $this->referencias[$index],
                        'filtros' => $this->filtro1[$index]. ',' . $this->filtro2[$index],
                        'user_id' => Auth::id(),
                    ];

                }

                //Fiz isso pra corrigir o nome da pasta que esta transfers ao inves de transfer
                if($this->tipo == 'transfer'){
                    $caminhoTipo = 'transfers';
                }else{
                     //$this->tipo = 'transfers';
                     $caminhoTipo = 'termopatch';
                }

                // Get the brand description based on the brand ID
                $brand = Marca::find($this->selectedMarca);
                $brandDescription = $brand->referencia ?? 'DefaultBrandDescription'; // Replace with a default if needed

                // Calculate the cleaned reference for the file path
                $cleanedReference = Str::slug($this->referencias[$index], '_');

                // Construct the image file name
                $imageName = $cleanedReference . '.' . $image->getClientOriginalExtension();

                // Calculate the full file path
                //$filePath = 'produtos/'.$this->tipo . '/' . $this->genero . '/' . $brandDescription . '/' . $imageName;
                $filePath = 'produtos/'.$caminhoTipo . '/' . $this->genero . '/' . $brandDescription . '/' . $imageName;

                // Store the image and update the image path in product data
                //$image->storeAs('produtos/'.$this->tipo . '/' . $this->genero . '/' . $brandDescription, $imageName, 'public');
                $image->storeAs('produtos/'.$caminhoTipo . '/' . $this->genero . '/' . $brandDescription, $imageName, 'public');
                
                $productData['imagem'] = $filePath;

                // Create a directory if it doesn't exist and set permissions
               // $directoryPath = storage_path('app/public/produtos/'.$this->tipo . '/' . $this->genero . '/' . $brandDescription);
                $directoryPath = storage_path('app/public/produtos/'.$caminhoTipo . '/' . $this->genero . '/' . $brandDescription);
                
                if (!is_dir($directoryPath)) {
                    mkdir($directoryPath, 0755, true);
                    chmod($directoryPath, 0755);
                }

                // Create a new Transfer record using the product data
                Produto::create($productData);
            }

            //Retorna evento para o backend
            /*$this->dispatch('showCreate',
                title: 'Produto cadastrado com sucesso.'
            );*/
            $this->notification()->success(
                $title = 'Sucesso!',
                $description = 'Produto(s) cadastrado com sucesso!'
            );

            /*$this->dispatch('transfer-created')->to(TransferTable::class);*/

            $this->limparFiltros();

            $this->createNewTransferModal = false;
        /*  } catch (\Exception $e) {
            // Trate a exceção aqui e, se necessário, exiba uma mensagem de erro
            session()->flash('error', 'Não foi possível salvar: Um ou mais produtos já registrados.' ) ;
        } */
        } catch (\Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException && $e->getCode() === '23000') {
                // Trata a exceção de violação de chave única (produto já registrado)
                $message = 'Não foi possível salvar: Um ou mais produtos já registrados. Referência do produto duplicada: ' . $this->referencias[$index];
            } else {
                // Trata outras exceções
                $message = 'Não foi possível salvar: ' . $e->getMessage();
            }
            session()->flash('error', $message);
        }
    }

    public function limparFiltros(){

        $this->referencia = '';
        $this->descricao = '';
        $this->genero = '';
        $this->tipo = 'transfer';
        $this->selectedMarca = '';
        $this->searchMarca = '';
        $this->filtros = '';
        $this->imagem = '';
        $this->products = [];
        $this->produtosTemp = [];
        $this->imagens = [];

        $this->filtro1 = [];
        $this->filtro2 =[];
        $this->medida = [];
    }
    //CADATROS PRODUTOS - FIM

    public function removerProduto($indice)
    {
        // Verifique se o índice existe antes de remover
        if (isset($this->produtosTemp[$indice])) {
            // Remove o produto com base no índice
            array_splice($this->produtosTemp, $indice, 1);
        }
    }
    
    
    
    //DELETE TRANSFER - INICIO
     public function confirmDeleteTransfer($itemId)
     {   
         $this->productId = $itemId;
         //dd($this->productId);
         $this->deleteTransfer();
         /* $this->dispatch('showDelete',
             title: 'Excluir produto id: ' . $itemId.'?',
         ); */
         $this->notification()->confirm([
            'title' => 'Você está certo?',
            'description' => 'Deletar o produto?',
            'acceptLabel' => 'Sim, remover o transfer',
            'method' => 'deleteTransfer',
            'params' => 'deleted',
        ]);
     }    
 
     #[On('delete')]
     public function deleteTransfer()
     {
 
         $transfer = Produto::find($this->productId);
 
         //Remove a imagem do storage
         $imagePath = storage_path('app/public/' . $transfer->imagem);
         if (File::exists($imagePath)) {
             File::delete($imagePath);
         }
 
         $transfer->delete();
 
             // Em seguida, exiba uma mensagem de sucesso após a exclusão:
           /* $this->dispatch('Deleted',
             title: 'Produto excluído com sucesso!',
           ); */ //Dispara um evento pra o JS
           $this->notification()->success(
            $title = 'Sucesso!',
            $description = 'Produto excluído com sucesso!'
        );
         
     }
     //DELETE TRANSFER - FIM
     

     
     public function editTransfer($id){
        $this->selectedProduto = Produto::findOrFail($id);
        $this->productId = $id;
    
        // Copie os valores atuais dos campos para propriedades separadas para rastreamento
        $this->referenciaOriginal = $this->selectedProduto->referencia;
        $this->generoOriginal = $this->selectedProduto->genero;
        $this->marcaOriginal = $this->selectedProduto->id_marca;
        $this->tipoOriginal = $this->selectedProduto->tipo;
        $this->filtrosOriginal = $this->selectedProduto->filtros;
        $this->imagemOriginal = $this->selectedProduto->imagem;
    
        $this->selectedMarca = $this->selectedProduto->id_marca;
        $this->medidaOriginal = $this->selectedProduto->medida;

      
        // Defina as propriedades para exibir os dados atuais na view
        /* $descMarca = Marca::findOrFail($this->selectedProduto->id_marca);
        $this->searchMarca = $descMarca->descricao; */

        $this->referencia = $this->selectedProduto->referencia;
        $this->genero = $this->selectedProduto->genero;
        $this->tipo = $this->selectedProduto->tipo;
        $this->selectedMarca = $this->selectedProduto->id_marca;
        $this->filtros = $this->selectedProduto->filtros;
        $this->imagem =  $this->selectedProduto->imagem;
        $this->medida =  $this->selectedProduto->medida;

        $this->editTransferModal = true;
    }



    public function saveChanges()
    {
        // Verifique cada campo individualmente e atualize apenas se for diferente do original
        if ($this->referencia != $this->referenciaOriginal) {
            $this->selectedProduto->referencia = $this->referencia;
        }

        if ($this->genero != $this->generoOriginal || $this->selectedMarca != $this->marcaOriginal) {
            // Obtenha a descrição da marca com base no ID da marca
            $brand = Marca::find($this->selectedMarca);
            $brandDescription = $brand->referencia ?? 'DefaultBrandDescription';
        
            // Gere o nome do novo diretório
            $newDirectory = 'produtos/'.$this->tipo.'/'.$this->genero.'/'.$brandDescription;
        
            // Verifique se o novo diretório existe, se não, crie-o
            if (!File::exists(storage_path('app/public/' . $newDirectory))) {
                File::makeDirectory(storage_path('app/public/' . $newDirectory), 0777, true);
            }
        
            // Mova a imagem para o novo diretório
            File::move(storage_path('app/public/' . $this->imagemOriginal), storage_path('app/public/' . $newDirectory . '/' . basename($this->imagemOriginal)));
        
            // Atualize o campo de imagem com o novo caminho da imagem
            $this->selectedProduto->imagem = $newDirectory . '/' . basename($this->imagemOriginal);

            
            if ($this->genero != $this->generoOriginal) {
                $this->selectedProduto->genero = $this->genero;
            }
        
            if ($this->selectedMarca != $this->marcaOriginal) {
                $this->selectedProduto->marca_id = $this->selectedMarca;
            }
        }
        

        if ($this->filtros != $this->filtrosOriginal) {
            $this->selectedProduto->filtros = $this->filtros;
        }
        
        if ($this->medida != $this->medidaOriginal) {
            $this->selectedProduto->medida = $this->medida;
        }

        if ($this->imagem != $this->imagemOriginal) {
            // Remove a imagem original do storage
            $imagePath = storage_path('app/public/' . $this->imagemOriginal);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // Obtenha a descrição da marca com base no ID da marca
            $brand = Marca::find($this->selectedMarca);
            $brandDescription = $brand->referencia ?? 'DefaultBrandDescription';

            // Gere um nome único para a nova imagem
            $cleanedReference = Str::slug($this->referencia, '_');
            $imageName = $cleanedReference . '.' . $this->imagem->getClientOriginalExtension();

            // Salve a nova imagem no storage
            $this->imagem->storeAs('public/produtos/'.$this->tipo.'/'.$this->genero.'/'.$brandDescription, $imageName);

            // Atualize o campo de imagem com o novo nome da imagem
            $this->selectedProduto->imagem = 'produtos/'.$this->tipo.'/'.$this->genero.'/'.$brandDescription.'/'.$imageName;
            
        }

        // Salve o modelo apenas se alguma alteração foi feita
        if ($this->selectedProduto->isDirty()) {
            $this->selectedProduto->save();
        }

        // Feche o modal de edição
        $this->editTransferModal = false;
    }


    public function consultarItensPedido()
    {
        $query = ItemPedido::query()
            ->with(['produto', 'usuarios'])
            ->when($this->searchItensUsados, function ($query) {
                $query->whereHas('produto', function ($q) {
                    $q->where('referencia', 'like', '%' . $this->searchItensUsados . '%');
                })->orWhereHas('usuarios', function ($q) {
                    $q->where('name', 'like', '%' . $this->searchItensUsados . '%');
                });
            });

        $this->transfersUsedPedidos = $query->take(10)->get();
    }


    public function loadMore()
    {
        $this->perPage += 100;
    }


    public function sortBy($field){
        $this->sortField = $field;    
        $this->sort = $this->sort === 'asc' ? 'desc' : 'asc';    
        $this->dispatch('render');
    }


    #[On('filtro-created')]
    public function render()
    {
        return view('livewire.cadastros.create-transfer',[
           /* 'marcaList' => Marca::where('descricao', 'LIKE', '%' . $this->searchMarca . '%')->orderBy('descricao')->get(),*/
           
            /* 'filtros_transfer' => Filtro::where('filtro', 'LIKE', '%' . $this->search . '%')->orderBy('filtro')->get(), */
            'filtros_transfer' => Filtro::orderBy('filtro')->get(),



            'transfers' => Produto::when($this->search_genero !== 'todos', function ($query) {
                $query->where('genero', 'LIKE', '%' . $this->search_genero . '%');
            })
            ->when($this->searchMarca !== '', function ($query) {
                $query->where('marca_id',  $this->searchMarca );
            })
            ->when($this->search_produto !== '', function ($query) {
                $query->where('tipo',  $this->search_produto );
            })
            ->where(function ($query) {
                $query->where('referencia', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('genero', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('filtros', 'LIKE', '%' . $this->search . '%');              
            })
            /* ->orderBy($this->sortField, $this->sort) */
            ->orderByRaw('CAST(referencia AS UNSIGNED) '.$this->sort) //Usando isso pq a coluna referencia e varchar
            ->paginate($this->perPage),
                
            'allTransfer' => Produto::all(),
        
        ]);
    }
    

}
