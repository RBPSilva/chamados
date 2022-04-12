<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChamadoItem extends Model
{
    protected $fillable = [
        'user_id', 'chamado_id', 'descricao', 'image'
    ];

    public function ChamadoItem(){
        $ChamadoItem = hasOne(ChamadoItem::class);
    }
}
