<?php

namespace App\Livewire\Prefeitura;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Municipio;
use Illuminate\Support\Facades\DB;


use App\Models\PedidoPrefeitura;

use Livewire\Attributes\On; 

use Livewire\Attributes\Rule; 
use Livewire\WithFileUploads;
use App\Models\UserAction;
use WireUi\Traits\Actions;

use Illuminate\Support\Facades\Storage;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use Intervention\Image\Facades\Image;

class CarrinhoPrefeitura extends Component
{

    use Actions;

    use WithFileUploads;

  public $selectedMunicipio;
  public $selectedUf;
  public $gabaritos = [];
  public $observacao;

  public $imagens = [];

  public $ufList = [];
  public $municipioList = [];

    public function mount()
    {
        

    }
    
    
        public function removerImagem($index)
    {
        unset($this->imagens[$index]);
   
        // Reindex os arrays
        $this->imagens = array_values($this->imagens);

    }
    
    public function updatedSelecteduf(){ 
        $this->municipioList = Municipio::where('uf', $this->selectedUf)->get();
    }

    public function confirmarPedido()
    {
        $validated = $this->validate([
            'imagens.*' => 'image|max:50240', // Validação para múltiplos arquivos
        ], [
            'imagens.*.image' => 'Apenas imagens são permitidas.',
            'imagens.*.max' => 'O tamanho da imagem excede o permitido.',
        ]);

        $user = auth()->user();
        $imagensCliente = [];

        foreach ($this->imagens as $imagem) {
            $numeroAleatorio = rand(1, 9000);
            $nomeImagem = $user->id . '-' . $numeroAleatorio . '.webp';
            $caminhoImagem = storage_path('app/public/prefeituras/imagens_pedidos/' . $user->email . '/' . $nomeImagem);

            // Alterar as permissões do diretório
            $diretorioImagens = storage_path('app/public/prefeituras/imagens_pedidos/' . $user->email);
            if (!is_dir($diretorioImagens)) {
                mkdir($diretorioImagens, 0755, true);
            }
            chmod($diretorioImagens, 0755);

            $imagemWebp = Image::make($imagem)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('webp', 75)
                ->save($caminhoImagem);

            //$imagensCliente[] = $user->email . '/' . $nomeImagem;
            $imagensCliente[] = ($user->email . '/' .$nomeImagem);
        }

        PedidoPrefeitura::create([
            'municipio_id' => $this->selectedMunicipio, // Substitua pelo valor apropriado
            'gabaritos' => implode(', ', $this->gabaritos), // Valor padrão ou definido
            'observacao' => $this->observacao, // Valor padrão ou definido
            'imagens_cliente' => json_encode($imagensCliente),
            'user_id' => $user->id,
        ]);

        $this->imagens = [];
    }


    public function render()
    {
        $this->ufList = Municipio::groupBy('uf')
                        ->select('uf', DB::raw('COUNT(*) as total'))->orderBy('uf', 'asc')
                        ->get();
        return view('livewire.prefeitura.carrinho-prefeitura');
    }
}
