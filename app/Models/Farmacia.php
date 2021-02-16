<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Farmacia extends Model
{
  use HasFactory;
  public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cnpj',
    ];

    public static $regras_validacao_criar = [
        'cnpj' => 'required|numeric|unique:farmacias,cnpj',
    ];

    public function user() {
        return $this->belongsTo('\App\Models\User', 'user_id', 'id');
    }

    public function pedido(){
      $pedidos = Pedido::where('farmacia_id', '=', $this->id)->get();
      $temp = array();
      foreach ($pedidos as $ped) {
        if ($ped->ativo){
          if(!array_key_exists($ped->cliente_id, $temp)){
            $temp[$ped->cliente_id] = $ped->cliente_id;
          }
        }
      }
      $clientes = array();
      foreach ($temp as $cliente) {
        $cli = Cliente::find($cliente);
        if(!array_key_exists($cli->id, $clientes)){
          $clientes[$cli->id] = $cli;
        }
      }
      return $clientes;
    }

    public function vitrine() {
        return $this->hasOne('\App\Models\Vitrine');
    }
}
