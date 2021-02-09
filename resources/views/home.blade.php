@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card-header marker">Bem-vindo(a)!</div>
            <div class="card">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
              <br>
              <br>
                <div class="card-body">
                  @if($perfil == "Cliente")
                  <div class="row">
                    <div class="col-md-3">
                      <button class="bt-quadrado bg-branco bt-home"><img class="img-bt"src="{{asset('images/user.png')}}" alt=""></button>
                    </div>
                    <div class="col-md-3">
                      <label class="label-home"><a href="{{route('cliente.editarCliente')}}">Ver meu perfil</a></label>
                    </div>
                    <div class="col-md-3">
                      <button class="bt-quadrado bg-branco bt-home"><img class="img-bt"src="{{asset('images/medicine.png')}}" alt=""></button>
                    </div>
                    <div class="col-md-3">
                      <label class="label-home"><a href="{{route('cliente.buscar')}}">Novo pedido</a></label>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3">
                      <button class="bt-quadrado bg-branco bt-home"><img class="img-bt"src="{{asset('images/portfolio.png')}}" alt=""></button>
                    </div>
                    <div class="col-md-3">
                      <label class="label-home"><a href="{{route('cliente.pedidos')}}">Meus pedidos</a></label>
                    </div>
                    <div class="col-md-3">
                      <button class="bt-quadrado bg-branco bt-home"><img class="img-bt"src="{{asset('images/shopping-cart.png')}}" alt=""></button>
                    </div>
                    <div class="col-md-3">
                      <label class="label-home"><a href="{{route('cliente.carrinho')}}">Meu carrinho</a></label>
                    </div>
                  </div>
                  @else
                  <div class="row">
                    <div class="col-md-3">
                      <button class="bt-quadrado bg-branco bt-home"><img class="img-bt"src="{{asset('images/hospital.png')}}" alt=""></button>
                    </div>
                    <div class="col-md-3">
                      <label class="label-home"><a href="{{route('farmacia.editarFarmacia')}}">Estabelecimento</a></label>
                    </div>
                    <div class="col-md-3">
                      <button class="bt-quadrado bg-branco bt-home"><img class="img-bt"src="{{asset('images/medicine.png')}}" alt=""></button>
                    </div>
                    <div class="col-md-3">
                      <label class="label-home"><a href="{{route('farmacia.produto.cadastrarProduto')}}">Novo Produto</a></label>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3">
                      <button class="bt-quadrado bg-branco bt-home"><img class="img-bt"src="{{asset('images/showcase.png')}}" alt=""></button>
                    </div>
                    <div class="col-md-3">
                      <label class="label-home"><a href="{{route('farmacia.produto.listarProdutos')}}">Listar produtos </a></label>
                    </div>
                    <div class="col-md-3">
                      <button class="bt-quadrado bg-branco bt-home"><img class="img-bt"src="{{asset('images/request.png')}}" alt=""></button>
                    </div>
                    <div class="col-md-3">
                      <label class="label-home"><a href="{{route('farmacia.pedidos')}}">Listar pedidos</a></label>
                    </div>
                  </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
