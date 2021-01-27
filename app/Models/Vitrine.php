<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Vitrine extends Model
{
  use HasFactory;
  public $timestamps = false;

    public function farmacia() {
        return $this->belongsTo('\App\Models\Farmacia', 'id', 'farmacia_id');
    }

    public function produto() {
        return $this->hasMany('\App\Models\Produto');
    }

}
