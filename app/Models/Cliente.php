<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  use HasFactory;
  public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf',
    ];

    public function user() {
        return $this->belongsTo('\App\Models\User', 'user_id');
    }

    public function pedido(){
      return $this->hasMany('\App\Models\Pedido');
    }

    public function farmaciasPedido(){
      $pedidos = Pedido::where('cliente_id', '=', $this->id)->get();
      $temp = array();
      foreach ($pedidos as $ped) {
        if ($ped->ativo){
          if(!array_key_exists($ped->farmacia_id, $temp)){
            $temp[$ped->farmacia_id] = $ped->farmacia_id;
          }
        }
      }
      $farmacias = array();
      foreach ($temp as $farmacia) {
        $farm = Farmacia::find($farmacia);
        if(!array_key_exists($farm->id, $farmacias)){
          $farmacias[$farm->id] = $farm;
        }
      }
      return $farmacias;
    }

    public static $regras_validacao_criar = [
        'cpf' => 'required|max:11|min:11|unique:clientes,cpf',
    ];
}
