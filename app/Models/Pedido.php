<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['pedido_modelo', 'marca', 'grupo', 'grade', 'prefeitura', 'observacao', 'status', 'motivo_cancelamento','aplicativo', 'previsao_entrega', 'user_id'];

    public function itens()
    {
        return $this->hasMany(ItemPedido::class, 'pedido_id');
    }

   /* public function transfers()
    {
        return $this->belongsToMany(Produto::class, 'itens_pedidos', 'pedido_id', 'produto_id')->withPivot('quantidade');
    } */
    public function transfers()
    {
        return $this->belongsToMany(Produto::class, 'item_pedidos', 'pedido_id', 'produto_id')->withPivot('quantidade');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function itensPedidos()
    {
        return $this->hasMany(ItensPedido::class, 'pedido_id', 'id');
    }

    //usado na api buscar pedidos
    public function itemPedidos()
    {
        return $this->hasMany(ItemPedido::class, 'pedido_id');
    }
    // usado na api pedidos
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id'); // Substitua 'Marca' pelo nome do seu modelo de marca
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    
    public function items() // Or itemPedidos, but stick to one
    {
        return $this->hasMany(ItemPedido::class, 'pedido_id');
    }
}
