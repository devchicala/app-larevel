<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    // DECLARAÇÃO DA RALAÇÃO 1 ENDERECO PERTENCE A 1 USUARIO

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
