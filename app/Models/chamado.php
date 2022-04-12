<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chamado extends Model
{
    protected $fillable = [
        'user_id', 'categoria', 'status ',
    ];

    public function Chamado()
    {
        return $this->hasMany(chamado::class);
    }
}
