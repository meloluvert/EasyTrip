<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = ['nome','placa_veiculo','ano_carro'];
    public function carroViagens() {
        return $this->hasMany('App\Models\Viagem','carro');
    }
    use HasFactory;
}
