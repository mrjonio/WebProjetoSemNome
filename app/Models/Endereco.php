<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Endereco extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cidade',
        'estado',
        'rua',
        'bairro',
        'numero',
        'cep',
        'complemento',
    ];

    public static $regras_validacao = [
        'estado' => 'required',
        'cidade' => 'required',
    ];

}
