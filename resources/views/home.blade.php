@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-header marker">Bem-vindo(a)!</div>
            <div style="border: none" class="card home-cd">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
                <div class="card-body">
                  @if($perfil == "Cliente")
                  <div class="row">
                    <div class="col-md-7">
                      <button class="bt-quadrado bg-branco bt-home"><a href="{{route('cliente.editarCliente')}}">Ver/Editar perfil</a></button>
                    </div>
                    <div class="col-md-5">
                      <button class="bt-quadrado bg-branco bt-home"><a href="{{route('cliente.buscar')}}">Novo Pedido</a></button>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-7">
                      <button class="bt-quadrado bg-branco bt-home"><a href="{{route('cliente.pedidos')}}">Minhas compras</a></button>
                    </div>
                    <div class="col-md-5">
                      <button class="bt-quadrado bg-branco bt-home"><a href="{{route('cliente.carrinho')}}">Meu carrinho</a></button>
                    </div>
                  </div>
                  @else
                  <div class="row">
                    <div class="col-md-7">
                      <button class="bt-quadrado bg-branco bt-home"><a href="{{route('farmacia.editarFarmacia')}}">Ver/Editar perfil</a></button>
                    </div>
                    <div class="col-md-5">
                      <button class="bt-quadrado bg-branco bt-home"><a href="{{route('farmacia.produto.cadastrarProduto')}}">Novo Produto</a></button>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-7">
                      <button class="bt-quadrado bg-branco bt-home"><a href="{{route('farmacia.produto.listarProdutos')}}">Minha vitrine</a></button>
                    </div>
                    <div class="col-md-5">
                      <button class="bt-quadrado bg-branco bt-home"><a href="{{route('farmacia.pedidos')}}">Ver pedidos</a></button>
                    </div>
                  </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
