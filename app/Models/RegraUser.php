<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Regra;

class RegraUser extends Model
{
    use HasFactory;
    protected $table = 'regra_user';

    protected $fillable = [
        'user_id',
        'regra_id',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function regra(){
        return $this->belongsTo(Regra::class, 'regra_id');
    }


 
}
