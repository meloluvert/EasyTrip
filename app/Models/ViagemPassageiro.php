<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViagemPassageiro extends Model
{
    use HasFactory;
    protected $fillable = ['viagem_id','passageiro_id'];
    public function viagem() {
       return $this->belongsTo('App\Models\Viagem') ;
    }
    public function passageiro() {
        return $this->belongsTo('App\Models\Passageiro') ;
     }
}
