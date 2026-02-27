<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['referencia', 'descricao', 'genero','tipo', 'filtros', 'medida', 'imagem', 'marca_id', 'user_id'];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'blocked_transfers', 'transfer_id', 'user_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function blockedTransfers()
    {
        return $this->hasMany(BlockedTransfer::class, 'transfer_id');
    }

    public function blockedUsers()
    {
        return $this->belongsToMany(User::class, 'blocked_transfers', 'transfer_id', 'user_id');
    }
}
