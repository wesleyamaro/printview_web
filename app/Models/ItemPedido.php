<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    use HasFactory;

    protected $fillable = ['pedido_id', 'produto_id', 'imagem_cliente','quantidade','correiacor', 'medida', 'prefeitura_produto', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function produtos()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
    public function produto() {
        return $this->belongsTo(Produto::class);
    }
    
    // usado na api pedidos
    public function usuario()
    {
        return $this->belongsTo(User::class); // Substitua 'User' pelo nome do seu modelo de usuário
    }
    
     public function usuarios()
    {
        return $this->belongsTo(User::class, 'user_id'); // Substitua 'User' pelo nome do seu modelo de usuário
    }
    
   // usado na api pedidos
    public function marca()
    {
        return $this->belongsTo(Marca::class); // Substitua 'Marca' pelo nome do seu modelo de marca
    }


}
