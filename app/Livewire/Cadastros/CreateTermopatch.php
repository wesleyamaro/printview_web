<?php

namespace App\Livewire\Cadastros;

use Livewire\Component;
use App\Models\Marca;
use App\Models\Termopatch;
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


use Livewire\Attributes\Validate;

class CreateTermopatch extends Component
{


    use Actions;
    use WithFileUploads;
    use WithPagination; 

    public $sort = 'desc';
    public $sortField = 'referencia';
    public $perPage = 100;

    public $search = '';
    public $search_genero = '';

    /* #[Rule('required')] */
    public $selectedMarca = '';

    /* #[Rule('required')] */ 
    public $referencia;
    

    public $imagemreferencia;
    
    public $descricao = 'transfer';

    /* #[Rule('required|min:3')] */ 
    public $medida;
    public $observacao;
    
    public $productId;

    public $searchMarca = '';

    public $imagens = []; // Para armazenar as imagens selecionadas
    public $referencias = []; // Para armazenar as referências das imagens
    public $filtros = []; // Para armazenar os filtros das imagens
    public $filtro1 = [];
    public $filtro2 = [];

    public $medidas = [];
    public $nomeCliente = [];

   

    public $referenciaOriginal;
    public $generoOriginal; 
    public $marcaOriginal;
    public $filtrosOriginal;
    public $imagemOriginal;
    public $selectedProduto;

    public $marcaList = [];
    public $userList = [];
    
    public $filtrosL = [];

    public $myModalimg = false;


    public function mount()
    {
        $user = auth()->user();
        /* $this->marcaList = $user->brands()->get(); */
        $this->marcaList = Marca::where('referencia','!=', 99999)->orderBy('referencia', 'asc')->get();
       // $this->userList = User::where('bloqueio','<>', 1)->where('tipo_user','<>', 'PRINT')->get();
       
        $this->filtrosL = Filtro::orderBy('filtro')->get();
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
        //unset($this->filtro2[$index]);

        unset($this->medidas[$index]);

        // Reindex os arrays
        $this->imagens = array_values($this->imagens);
        $this->referencias = array_values($this->referencias);
        //$this->filtros = array_values($this->filtros);

        $this->filtro1 = array_values($this->filtro1);
        //$this->filtro2 = array_values($this->filtro2);

        $this->medidas = array_values($this->medidas);

        $this->nomeCliente = array_values($this->nomeCliente);
    }


 public function salvarProdutos()
{
    
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

      
        if (empty($this->filtro1)) {
            session()->flash('error', 'Preencha todos os campos de filtro1');
            return;
        }

        if (empty($this->medidas)) {
            session()->flash('error', 'Preencha todos os campos de medidas');
            return;
        }
        
        /*
        if (empty($this->nomeCliente)) {
            session()->flash('error', 'Preencha todos os campos de cliente');
            return;
        }*/

        /* if (empty($this->filtro1) || in_array(null, $this->filtro1)) {
            session()->flash('error', 'Preencha todos os campos de filtros');
            return;
        } */



        foreach ($this->imagens as $index => $image) {
            // Extract the image data
            if (empty($this->filtro2[$index])) {

                $productData = [
                    'imagem' => $image,
                    /* 'medidas' => $this->medida[$index], */
                    'marca_id' => $this->selectedMarca,
                    /* 'observacao' => $this->observacao[$index], */
                    
                    'referencia' => $this->referencias[$index],
                    'filtros' => $this->filtro1[$index],
                    'medidas' => $this->medidas[$index],
                    'nomeCliente' => $this->nomeCliente[$index],
                    'user_id' => Auth::id(),
                ];
            }else{

                $productData = [
                    'imagem' => $image,
                    /* 'medidas' => $this->medida[$index], */
                    'marca_id' => $this->selectedMarca,
                    /* 'observacao' => $this->observacao[$index], */
                    'referencia' => $this->referencias[$index],

                    'medidas' => $this->medidas[$index],
                    'nomeCliente' => $this->nomeCliente[$index],
                    
                    'filtros' => $this->filtro1[$index]. ',' . $this->filtro2[$index],
                    'user_id' => Auth::id(),
                ];

            }

            // Get the brand description based on the brand ID
            $brand = Marca::find($this->selectedMarca);
            $brandDescription = $brand->referencia ?? 'DefaultBrandDescription'; // Replace with a default if needed

            // Calculate the cleaned reference for the file path
            $cleanedReference = Str::slug($this->referencias[$index], '_');

            // Construct the image file name
            $imageName = $cleanedReference . '.' . $image->getClientOriginalExtension();

            // Calculate the full file path
            $filePath = 'produtos/termopatchs/' . $brandDescription . '/' . $imageName;

            // Store the image and update the image path in product data
            $image->storeAs('produtos/termopatchs/' . $brandDescription, $imageName, 'public');
            $productData['imagem'] = $filePath;

            // Create a directory if it doesn't exist and set permissions
            $directoryPath = storage_path('app/public/produtos/termopatchs/' . $brandDescription);
            if (!is_dir($directoryPath)) {
                mkdir($directoryPath, 0755, true);
                chmod($directoryPath, 0755);
            }

            // Create a new Transfer record using the product data
            Termopatch::create($productData);
        }


        /* $this->notification()->success(
            $title = 'Sucesso!',
            $description = 'Produto(s) cadastrado com sucesso!'
        ); */
        $this->dispatch('success',  title: 'Produto(s) cadastrado com sucesso!');


        $this->limparFiltros();

        $this->createNewTransferModal = false;

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




//DELETE TRANSFER - INICIO

public function confirmDeleteTermopatch($itemId)
{   
    $this->productId = $itemId;

    $this->dispatch('showDeleteTermopatch',  title: 'Deletar termopatch?');
}    

#[On('deleteTermopatch')]
public function deleteTermopatch()
{

    $termopatch = Termopatch::find($this->productId);

    //Remove a imagem do storage
    $imagePath = storage_path('app/public/' . $termopatch->imagem);
    if (File::exists($imagePath)) {
        File::delete($imagePath);
    }

    $termopatch->delete();

    $this->dispatch('success');
     /*  $this->notification()->success(
       $title = 'Sucesso!',
       $description = 'Produto excluído com sucesso!'
   ); */
    
}

//DELETE TRANSFER - FIM


    public function limparFiltros(){

        $this->referencia = '';
        $this->descricao = '';
        $this->medida = '';
        $this->selectedMarca = '';
        $this->observacao = '';
        /* $this->searchMarca = ''; */
        $this->filtros = '';
        $this->imagem = '';
        $this->products = [];
        $this->produtosTemp = [];
        $this->imagens = [];

        $this->filtro1 = [];
        $this->filtro2 =[];
        $this->nomeCliente =[];
    }
    //CADATROS PRODUTOS - FIM

    public function resetFilters(){
        $this->search = '';       
        $this->searchMarca = '';
    }


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
 
         $termopatch = Termopatch::find($this->productId);
 
         //Remove a imagem do storage
         $imagePath = storage_path('app/public/' . $termopatch->imagem);
         if (File::exists($imagePath)) {
             File::delete($imagePath);
         }
 
         $termopatch->delete();
 
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
        return view('livewire.cadastros.create-termopatch',[
           /* 'marcaList' => Marca::where('descricao', 'LIKE', '%' . $this->searchMarca . '%')->orderBy('descricao')->get(),*/
           
            /* 'filtros_transfer' => Filtro::where('filtro', 'LIKE', '%' . $this->search . '%')->orderBy('filtro')->get(), */
            'filtroList' => Filtro::orderBy('filtro')->get(),


            
            /* 'termopatchList' => Termopatch::when($this->search_genero !== 'todos', function ($query) {
                $query->where('genero', 'LIKE', '%' . $this->search_genero . '%');
            }) */
            'termopatchList' => Termopatch::when($this->searchMarca !== '', function ($query) {
                $query->where('marca_id',  $this->searchMarca );
            })
            ->where(function ($query) {
                $query->where('referencia', 'LIKE', '%' . $this->search . '%')                   
                    ->orWhere('filtros', 'LIKE', '%' . $this->search . '%');              
            })

            ->orderByRaw('CAST(referencia AS UNSIGNED) '.$this->sort) //Usando isso pq a coluna referencia e varchar
            ->paginate($this->perPage),
                
            /* 'termopatchList' => Termopatch::all(), */
        
        ]);
    }
    

}
