@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bem vindo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($perfil == "Cliente")
                      <a href="{{route('cliente.editarCliente')}}"> Ver Perfil</a>
                      <a href="{{route('cliente.buscar')}}">Fazer busca</a>
                    @else
                      <a href="{{route('farmacia.editarFarmacia')}}"> Ver Perfil</a> <br>
                      <a href="{{route('farmacia.produto.cadastrarProduto')}}"> Novo produto</a><br>
                      <a href="{{route('farmacia.produto.listarProdutos')}}">Vitrine</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
