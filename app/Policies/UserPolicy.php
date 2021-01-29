<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function farmacia(User $user){
      return \Auth::user()->tipo_perfil == 'Farmacia';
    }

    public function cliente(User $user){
      return \Auth::user()->tipo_perfil == 'Cliente';
    }

}
