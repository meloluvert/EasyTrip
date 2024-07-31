<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passageiro extends Model
{
    protected $fillable = ['nome','telefone'];
    public function passageiroViagens() {
        return $this->hasMany('App\Models\ViagemPassageiro','passageiro_id');
    }
    use HasFactory;
}
