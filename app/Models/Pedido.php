<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pedido extends Model
{

    public function cliente() {
        return $this->belongsTo('\App\Models\Cliente', 'id', 'cliente_id');
    }

    public function farmacia() {
        return $this->belongsTo('\App\Models\Farmacia', 'id', 'farmacia_id');
    }

    public function produto() {
        #// TODO: Adicionar o looping que vai pegar os ids dos produtos e retornar cada um da lista de pedidos
    }

}
