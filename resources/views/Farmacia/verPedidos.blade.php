@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header marker">Pedidos pendentes</div>

                <div class="card-body">
                  <br>
                    <div class="form-row">
                        <table class="table">
                            <thead>
                              <tr>
                                  <th scope="col" class="nome-col">Cliente</th>
                                  <th scope="col" class="nome-col">Bairro</th>
                                  <th scope="col" class="nome-col">Rua</th>
                                  <th scope="col" class="nome-col">Número</th>

                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($farmacia->pedido() as $cliente)
                                  <tr>
                                      <td  style="color: red"class="nome_reuniao basic-space"><br><a href="{{route('farmacia.cliente', ['id' => $cliente->id])}}">{{$cliente->user->nome}}</a></td>
                                      <td class="nome_reuniao basic-space"><br>{{$cliente->user->endereco->bairro}}</td>
                                      <td class="nome_reuniao basic-space"><br>{{$cliente->user->endereco->rua}}</td>
                                      <td class="nome_reuniao basic-space"><br>{{$cliente->user->endereco->numero}}</td>

                                  </tr>
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
