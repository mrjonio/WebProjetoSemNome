@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header marker">Pedidos pendentes</div>
                @if (\Session::has('Sucesso'))
                <div class="alert alert-success">
                  <ul>
                    <li>{!! \Session::get('Sucesso') !!}</li>
                  </ul>
                </div>
                @endif

                <div class="card-body">
                  <div class="form-row">
                    <div class="col-md-4">
                      <button style="float: left; background: red"class="final-bt bt-tb"><img class="img-tb"src="{{asset('images/minus-round-line.png')}}" alt=""></button>
                      <br>
                      <label class="label-static">Cancelar pedido</label>
                    </div>
                    <div class="col-md-4">
                      <button style="float: left;"class="final-bt bt-tb"><img class="img-tb"src="{{asset('images/done.png')}}" alt=""></button>
                      <br>
                      <label class="label-static">Finalizar entrega</label>
                    </div>
                  </div>
                  <br>
                    <div class="form-row">
                        <table class="table">
                            <thead>
                              <tr>
                                  <th scope="col" class="nome-col">Nome</th>
                                  <th scope="col" class="nome-col">Descrição</th>
                                  <th scope="col" class="nome-col">Preço</th>
                                  <th scope="col" class="nome-col">Cliente</th>
                                  <th scope="col" class="nome-col" colspan="2">Ações</th>

                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($farmacia->pedido as $pedido)
                                @if($pedido->ativo)
                                  <tr>
                                      <td class="nome_reuniao basic-space"><br>{{$pedido->produto->nome}}</td>
                                      <td class="nome_reuniao basic-space"><br>{{$pedido->produto->descricao}}</td>
                                      <td class="nome_reuniao basic-space"><br>{{$pedido->produto->preco}}</td>
                                      <td  style="color: red"class="nome_reuniao basic-space"><br><a href="{{route('farmacia.cliente', ['id' => $pedido->cliente->id])}}">{{$pedido->produto->vitrine->farmacia->user->nome}}</a></td>
                                      <td id="coluna-images" class="basic-space">
                                        <button style="background-color:red" class="btn final-bt bt-tb"><a href="{{route('farmacia.pedidos.cancelar', ['id' => $pedido->id])}}"><img class="img-tb"src="{{asset('images/minus-round-line.png')}}" alt=""></a></button>
                                      </td>
                                      <td id="coluna-images" class="basic-space">
                                        <button class="btn final-bt bt-tb"><a href="{{route('farmacia.pedidos.salvar', ['id' => $pedido->id])}}"><img class="img-tb"src="{{asset('images/done.png')}}" alt=""></a></button>
                                      </td>
                                  </tr>
                                  @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
