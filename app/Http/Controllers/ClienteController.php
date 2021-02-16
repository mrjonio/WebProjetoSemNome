<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Endereco;
use App\Models\Farmacia;
use App\Models\Produto;
use App\Models\Pedido;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function adicionarAoCarrinho(Request $request) {
      $this->authorize('cliente', User::class);
      if($request->session()->has('produtos')){
        $carrinho = $request->session()->get('produtos');
      } else {
        $carrinho = array();
      }
      $id = $request->produto_id;
      if(array_key_exists($id, $carrinho)){
        $carrinho[$id]['quantidade'] += $request->quantidade;
        $carrinho[$id]['subtotal'] += $carrinho[$id]['preco'] * $carrinho[$id]['quantidade'];
      } else {
        $dados = array();
        $dados['quantidade'] = $request->quantidade;
        $produto = Produto::find($id);
        $dados['id'] = $produto->id;
        $dados['nome'] = $produto->nome;
        $dados['preco'] = $produto->preco;
        $dados['descricao'] = $produto->descricao;
        $dados['imagem'] = $produto->imagem;
        $dados['farmacia_id'] = $produto->vitrine->farmacia_id;
        $dados['subtotal'] = $produto->preco * $request->quantidade;
        $carrinho[$id] = $dados;

      }
      $request->session()->put('produtos', $carrinho);
      return redirect()->route('cliente.carrinho');
    }

    public function removerDoCarrinho(Request $request, $produto_id){
      $this->authorize('cliente', User::class);
      if($request->session()->has('produtos')){
        $carrinho = $request->session()->get('produtos');
      }

      if(array_key_exists($produto_id, $carrinho)){
        unset($carrinho[$produto_id]);
      }
      $request->session()->put('produtos', $carrinho);
      return redirect()->route('cliente.carrinho');
    }

    public function mostrarCarrinho(Request $request){
      $this->authorize('cliente', User::class);
      if (!$request->session()->has('produtos')){
        $carrinho = array();
        $request->session()->put('produtos', $carrinho);
      }
      return view('Cliente.carrinho');
    }

    public function verProduto($produto_id){
      $this->authorize('cliente', User::class);
      $produto = Produto::find($produto_id);
      if($produto){
        return view('Cliente.verProduto', ['produto' => $produto]);
      }
      return redirect()->route('cliente.buscar')->withErrors('Produto não encontrado!');

    }

    public function verFarmacia($id){
      $this->authorize('cliente', User::class);
      $farmacia = Farmacia::find($id);
      if($farmacia){
        return view('Cliente.detalhesPedido', [
          'farmacia' => $farmacia,
          'cliente' => Auth::user()->cliente,
        ]);
      }
      return redirect()->route('cliente.pedidos')->withErrors('Farmacia não encontrada!');
    }

    public function historicoPedidos(){
      $this->authorize('cliente', User::class);
      $user = Auth::user()->cliente;
      return view('Cliente.historico', ['cliente' => $user]);
    }

    public function cancelarPedido($id){
      $this->authorize('cliente', User::class);
      $produto = Pedido::find($id);
      if($produto){
        $produto->delete();
      }
      return redirect()->back()->with('Sucesso', 'Pedido cancelado com sucesso!');
    }

    public function finalizarPedido(Request $request){
      $this->authorize('cliente', User::class);
      if($request->session()->has('produtos')){
        $carrinho = $request->session()->get('produtos');
        $user = Auth::user()->cliente;
        foreach ($carrinho as $prod) {
          for ($i=0; $i < $prod['quantidade']; $i++) {
            $pedido = new Pedido;
            $pedido->produto_id = $prod['id'];
            $pedido->cliente_id = $user->id;
            $pedido->farmacia_id = $prod['farmacia_id'];
            $pedido->ativo = true;
            $pedido->save();
          }
        }
        $carrinho = array();
        $request->session()->put('produtos', $carrinho);
        return redirect()->route('cliente.carrinho')->with('Sucesso', 'Compra finalizada com sucesso!');
      } else {
        return redirect()->route('cliente.carrinho')->withErrors('Carrinho vazio!');
      }
    }

    public function cadastrarCliente() {
      return view('Cliente.cadastroCliente');
    }

    public function removerCliente() {
      $this->authorize('cliente', User::class);
      return view('Cliente.removerCliente');
    }

    public function salvarRemoverCliente(){
      $this->authorize('cliente', User::class);
      $cliente = Auth::user();
      $cliente->cliente->delete();
      $cliente->delete();
      return redirect()->route('login');
    }

    public function editarCliente() {
      $this->authorize('cliente', User::class);
      $cliente = User::find(Auth::id());
      if($cliente->tipo_perfil == "Cliente"){
        return view('Cliente.verPerfil', ['user' => $cliente]);
      } else {
        return redirect()->back();
      }
    }

    public function buscaNome(){
      $endlog = Auth::user()->endereco;
      $endereco = Endereco::where('estado', '=', $endlog->estado, 'and')->where('cidade', '=', $endlog->cidade)->get();
      $farmacias =  array();
      foreach ($endereco as $end) {
        $far = User::where('endereco_id', '=', $end->id, 'and')->where('tipo_perfil', '=', 'Farmacia')->first();
        if($far){
          $farmacias[] = $far->farmacia;
        }
      }
      return view('Cliente.buscarString', [
        'farmacias' => $farmacias,
      ]);

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
        $this->authorize('cliente', User::class);
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
