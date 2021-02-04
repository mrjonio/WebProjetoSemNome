@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="row">
                  <div class="col-md-12">
                      <h1 class="marker">Tem certeza que deseja excluir o produto?</h1>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-6">
                          <a class="btn edit-bt" href="{{route('farmacia.produto.removerProduto.remover', ['id' => $produto->id])}}">Sim</a>
                      </div>
                      <div class="col-md-2">
                          <a class="btn edit-bt" href="{{route('farmacia.produto.listarProdutos')}}">Não</a>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
