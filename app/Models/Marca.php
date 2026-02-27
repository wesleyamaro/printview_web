<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    Protected $fillable = [
        'referencia',
        'descricao',
        'observacao',
        'isCliente',
        'user_id'        
    ];
    

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    //Associação de user com marcas permitidas da table brand_users
    public function user_brand()
    {
        return $this->belongsToMany(User::class, 'brand_users', 'brand_id', 'user_id');
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'brand_users', 'brand_id', 'user_id');
    }

 
    public function transfers()
    {
        return $this->hasMany(Transfer::class, 'marca_id');
    }

    public function brandUsers()
    {
        return $this->hasMany(BrandUser::class, 'brand_id');
        // Substitua 'BrandUser' pelo nome correto da sua classe de modelo para brand_users
    }
    
    public function brand_Users()
    {
        return $this->hasMany(BrandUser::class);
    }
    
}
