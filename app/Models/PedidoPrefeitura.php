<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoPrefeitura extends Model
{
    use HasFactory;

    
    Protected $fillable = [
        'municipio_id',
        'gabaritos',
        'observacao',
        'status',
        'imagens_cliente',
        'user_id'        
    ];

    public function municipios()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id'); 
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
}
