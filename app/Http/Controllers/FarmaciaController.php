<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Farmacia;
use App\Models\User;
use App\Models\Endereco;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FarmaciaController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function cadastrarFarmacia() {
      return view('Farmacia.cadastroFarmacia');
    }

    public function editarFarmacia() {
      $farmacia = User::find(Auth::id());
      if($farmacia->tipo_perfil == "Farmacia"){
        return view('Farmacia.verPerfil', ['user' => $farmacia]);
      } else {
        return redirect()->back();
      }
    }

    public function removerFarmacia() {
      return view('Farmacia.removerFarmacia');
    }

    public function salvarRemoverFarmacia(){
      $farmacia = Auth::user();
      $farmacia->farmacia->delete();
      $farmacia->delete();
      return redirect()->route('login');
    }


    public function salvarCadastroFarmacia(Request $request) {
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

        $validator_farmacia = Validator::make($entrada, Farmacia::$regras_validacao_criar, $messages);
        if ($validator_farmacia->fails()) {
            return redirect()->back()
                             ->withErrors($validator_farmacia)
                             ->withInput();
        }



        $endereco = new Endereco;
        $endereco->fill($entrada);
        $endereco->save();

        $user = new User;
        $user->fill($entrada);
        $user->endereco_id = $endereco->id;
        $user->tipo_perfil = "Farmacia";
        $user->password = Hash::make($entrada['password']);
        $user->save();

        $farmacia = new Farmacia;
        $farmacia->fill($entrada);
        $farmacia->user_id =  $user->id;

        $farmacia->save();

        if(!$farmacia->id){
          Endereco::find($endereco->id)->delete();
          User::find($user->id)->delete();
        }


        return redirect()->route('home');
    }

    public function salvarEditarFarmacia(Request $request) {
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
        $user->farmacia->fill($entrada);
        $user->fill($entrada);

        $user->endereco->save();
        $user->farmacia->save();
        $user->save();


        return redirect()->back();
    }
}
