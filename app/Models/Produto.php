<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Produto extends Model
{

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
        'disponivel' => 'required',
        'preco' => 'required|numeric',
    ];

}
