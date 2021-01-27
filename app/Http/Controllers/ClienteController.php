<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Endereco;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function cadastrarCliente() {
      return view('Cliente.cadastroCliente');
    }

    public function removerCliente() {
      return view('Cliente.removerCliente');
    }

    public function salvarRemoverCliente(){
      $cliente = Auth::user();
      $cliente->cliente->delete();
      $cliente->delete();
      return redirect()->route('login');
    }

    public function editarCliente() {
      $cliente = User::find(Auth::id());
      if($cliente->tipo_perfil == "Cliente"){
        return view('Cliente.verPerfil', ['user' => $cliente]);
      } else {
        return redirect()->back();
      }
    }


    public function salvarCadastroCliente(Request $request) {
        $entrada = $request->all();

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'password.required' => 'A senha é obrigatória.',
            'unique' => 'O :attribute já existe',
        ];


        $validator_endereco = Validator::make($entrada, Endereco::$regras_validacao, $messages);
        if ($validator_endereco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_endereco)
                             ->withInput();
        }

        $validator_user = Validator::make($entrada, User::$regras_validacao_criar, $messages);
        if ($validator_user->fails()) {
            return redirect()->back()
                             ->withErrors($validator_user)
                             ->withInput();
        }

        $validator_cliente = Validator::make($entrada, Cliente::$regras_validacao_criar, $messages);
        if ($validator_cliente->fails()) {
            return redirect()->back()
                             ->withErrors($validator_cliente)
                             ->withInput();
        }



        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();

        $user = new User;
        $user->fill($entrada);
        $user->endereco_id = $endereco->id;
        $user->tipo_perfil = "Cliente";
        $user->password = Hash::make($entrada['password']);
        $user->save();

        $cliente = new Cliente;
        $cliente->fill($entrada);
        $cliente->user_id =  $user->id;

        $cliente->save();

        if(!$cliente->id){
          Endereco::find($endereco->id)->delete();
          User::find($user->id)->delete();
        }


        return redirect()->route('home');
    }

    public function salvarEditarCliente(Request $request) {
        $entrada = $request->all();

        $user = User::find($entrada['id']);

        $messages = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute é deve ter no minimo :min caracteres.',
            'max' => 'O campo :attribute é deve ter no máximo :max caracteres.',
            'unique' => 'O :attribute já existe',
        ];


        $validator_endereco = Validator::make($entrada, Endereco::$regras_validacao, $messages);
        if ($validator_endereco->fails()) {
            return redirect()->back()
                             ->withErrors($validator_endereco)
                             ->withInput();
        }

        $validator_user = Validator::make($entrada, User::$regras_validacao_editar, $messages);
        if ($validator_user->fails()) {
            return redirect()->back()
                             ->withErrors($validator_user)
                             ->withInput();
        }



        $user->endereco->fill($entrada);
        $user->cliente->fill($entrada);
        $user->fill($entrada);

        $user->endereco->save();
        $user->cliente->save();
        $user->save();


        return redirect()->back();
    }
}
