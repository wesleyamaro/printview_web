<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;
    protected $fillable = ['valor','desconto','vencimento','data_pagamento','status', 'observacao', 'created_at'];
}
