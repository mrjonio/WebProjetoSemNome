<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    public function cliente() {
        return $this->belongsTo('\App\Models\Cliente', 'cliente_id');
    }

    public function farmacia() {
        return $this->belongsTo('\App\Models\Farmacia', 'id', 'farmacia_id');
    }

    public function produto() {
        return $this->hasOne('\App\Models\Produto', 'id', 'produto_id');
    }

    public function isAtivo(){
      if($this->ativo){
        return "Ativo";
      }
      return "Finalizado";
    }
}
