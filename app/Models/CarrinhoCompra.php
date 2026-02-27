<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrinhoCompra extends Model
{
    use HasFactory;

    protected $fillable = ['produto_id', 'quantidade','imagem_cliente','correiacor','medida','prefeitura_produto','user_id'];


    // Relação com o produto
    public function produto() {
       return $this->belongsTo(Produto::class);
   }

   public function user(){
       return $this->belongsTo(User::class, 'user_id');
   }
}
