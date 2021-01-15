<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vitrine extends Model
{

    public function farmacia() {
        return $this->belongsTo('\App\Models\Farmacia', 'id', 'farmacia_id');
    }

    public function produto() {
        #// TODO: Adicionar o looping que vai pegar os ids dos produtos e retornar cada um da lista de pedidos
    }

}
