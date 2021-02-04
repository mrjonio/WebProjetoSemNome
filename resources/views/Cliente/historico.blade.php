@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header marker">Compras em aberto</div>

                <div class="card-body">
                    <div class="form-row">
                        <table id="prodsID" class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="nome-col">Nome</th>
                                    <th scope="col" class="nome-col">Descrição</th>
                                    <th scope="col" class="nome-col">Preço</th>
                                    <th scope="col" class="nome-col">Farmacia</th>
                                    <th scope="col" class="nome-col">Status</th>
                                    <th scope="col" class="nome-col">Ações</th>

                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($cliente->pedido as $pedido)
                              @if($pedido->ativo)
                                <tr>
                                    <td class="nome_reuniao basic-space"><br>{{$pedido->produto->nome}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$pedido->produto->descricao}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$pedido->produto->preco}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$pedido->produto->vitrine->farmacia->user->nome}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$pedido->isAtivo()}}</td>
                                    <td id="coluna-images" class="basic-space">
                                      <button style="background-color: red;" class="btn edit-bt"><a  href="{{route('cliente.pedidos.cancelar', ['id' => $pedido->id])}}">Cancelar pedido</a></button>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-header marker">Compras finalizadas</div>
                <div class="card-body">
                    <div class="form-row">
                        <table id="prodsID" class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="nome-col">Nome</th>
                                    <th scope="col" class="nome-col">Descrição</th>
                                    <th scope="col" class="nome-col">Preço</th>
                                    <th scope="col" class="nome-col">Farmacia</th>
                                    <th scope="col" class="nome-col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($cliente->pedido as $pedido)
                                @if(!$pedido->ativo)
                                <tr>
                                    <td class="nome_reuniao basic-space"><br>{{$pedido->produto->nome}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$pedido->produto->descricao}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$pedido->produto->preco}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$pedido->produto->vitrine->farmacia->user->nome}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$pedido->isAtivo()}}</td>
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
