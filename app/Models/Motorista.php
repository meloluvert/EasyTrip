<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    protected $fillable = ['nome','telefone', 'data_carteira'];
    public function motoristaViagens() {
        return $this->hasMany('App\Models\Viagem','motorista');
    }
    use HasFactory;
}
