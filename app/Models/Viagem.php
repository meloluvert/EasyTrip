<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    protected $fillable = ['nome','endereco_saida','endeeco_chegada','horario_saida','motorista','carro'];
    public function viagensPassageiro() {
        return $this->hasMany('App\Models\ViagemPassageiro','viagem_id');
    }
    public function end_saida() {
        return $this->belongsTo('App\Models\Local') ;
     }
     public function end_chegada() {
        return $this->belongsTo('App\Models\Local') ;
     }
     public function motorista() {
        return $this->belongsTo('App\Models\Motorista') ;
     }
     public function carro() {
        return $this->belongsTo('App\Models\Carro') ;
     }
    use HasFactory;
}
