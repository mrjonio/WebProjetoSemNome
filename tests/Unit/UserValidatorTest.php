<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Models\User;
use App\Validator\UserValidator;
use App\Validator\ValidationException;

class UserValidatorTest extends TestCase
{
    public function testUserSemNome() {
        $this->expectException(ValidationException::class);
        $user = User::factory()->make(['nome' => '']);
        $dados = $funcionario->toArray();
        $dados['password'] = 'password';
        $dados['password_confirmation'] = 'password';
        UserValidator::validate($dados);
   }
}
