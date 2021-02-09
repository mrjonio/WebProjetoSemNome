@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
              <div class="row">
                  <div class="col-md-12">
                      <h1 class="card-header marker">Tem certeza que deseja excluir o produto?</h1>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <h3 class="sub-marker"><center>Essa ação não poderá ser desfeita!</hr>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <button class="btn final-bt"><a  href="{{route('farmacia.produto.removerProduto.remover', ['id' => $produto->id])}}">Sim</a></button>
                      </div>
                      <div class="col-md-1">
                      </div>
                      <div class="col-md-2">
                          <button style="background:red" class="btn final-bt"><a href="{{route('farmacia.produto.listarProdutos')}}">Não</a></button>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
