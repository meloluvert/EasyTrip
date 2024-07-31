<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $fillable = ['nome','endereco'];
    public function localSaidaViagens() {
        return $this->hasMany('App\Models\Viagem','endereco_saida');
    }
    public function localChegadaViagens() {
        return $this->hasMany('App\Models\Viagem','endereco_chegada');
    }
    use HasFactory;
}
