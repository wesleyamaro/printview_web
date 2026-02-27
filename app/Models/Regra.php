<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\User;
use App\Models\RegraUser;


class Regra extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function regra_user()
    {
        return $this->belongsToMany(RegraUser::class);
    }
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'regra_user', 'regra_id', 'user_id');
    }
 
}
