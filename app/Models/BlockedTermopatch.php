<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockedTermopatch extends Model
{
    use HasFactory;

    protected $table = 'blocked_termopatches';

    protected $fillable = [
        'user_id',
        'termopatch_id',
        
    ];

    public function termopatches()
    {
        return $this->belongsTo(Termopatch::class);
    }
}
