<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class BlockedTransfer extends Model
{
    use HasFactory;

    protected $table = 'blocked_transfers';

    protected $fillable = [
        'user_id',
        'transfer_id',
        
    ];

    public function produtos()
    {
        return $this->belongsTo(Produto::class);
    }

 
}
