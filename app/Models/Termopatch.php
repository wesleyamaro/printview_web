<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termopatch extends Model
{
    use HasFactory;
    

    protected $fillable = ['referencia', 'descricao', 'genero', 'filtros', 'imagem','medidas','nomeCliente', 'marca_id', 'user_id'];


    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'blocked_termopatches', 'termopatch_id', 'user_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

}
