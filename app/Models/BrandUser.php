<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marca;

class BrandUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'user_id',
        
    ];

    public function marcas()
    {
        return $this->belongsTo(Marca::class);
    }


    // Relacionamento com a tabela marcas (Marca)
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'brand_id');
    }

    // Relacionamento com a tabela users (User)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}