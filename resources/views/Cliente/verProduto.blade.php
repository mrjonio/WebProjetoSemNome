@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header marker">Adicionar ao Carrinho</div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <img class="prod" src="{{asset('storage/' . $produto->imagem)}}" alt="" width="200px">
                    </div>
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-3">
                      <label class="label-static">Nome</label><br>
                      <label class="label-ntstatic">{{$produto->nome}}</label>
                    </div>
                    <div class="col-md-3">
                      <label class="label-static">Descrição</label><br>
                      <label class="label-ntstatic">{{$produto->descricao}}</label>
                    </div>
                    <div class="col-md-2">
                      <label class="label-static">Preço</label><br>
                      <label class="label-ntstatic">{{$produto->preco}}</label>
                    </div>
                  </div>
                  <form method="post" action="{{ route('cliente.carrinho.adicionar') }}">
                    @csrf
                    <div class="row">
                      <div class="col-md-4">
                        <input type="hidden" name="produto_id" value="{{$produto->id}}">
                      </div>
                      <div class="col-md-4">
                        <label class="">Quantidade</label><br>
                        <input type="number" name="quantidade">
                      </div>
                      <div class="col-md-4">
                        <button class="btn edit-bt" type="submit">Adicionar ao carrinho</button>
                      </div>
                    </div>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
