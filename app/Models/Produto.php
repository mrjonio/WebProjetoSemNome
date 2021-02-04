<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
  use HasFactory;
  public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'descricao',
        'disponivel',
        'preco',
    ];

    public static $regras_validacao_criar = [
        'nome' => 'required|max:255',
        'descricao' => 'required',
        'preco' => 'required|numeric',
    ];

    public function isDisponivel(){
      if($this->disponivel){
        return "Disponivel";
      }
      return "Indisponivel";
    }

    public function vitrine() {
        return $this->belongsTo('\App\Models\Vitrine', 'vitrine_id');
    }

}
