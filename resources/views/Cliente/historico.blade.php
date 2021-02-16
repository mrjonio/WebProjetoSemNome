@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header marker">Compras em aberto</div>

                <div class="card-body">
                  <br>
                    <div class="form-row">
                        <table id="prodsID" class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="nome-col">Farmacia</th>
                                    <th scope="col" class="nome-col">Bairro</th>
                                    <th scope="col" class="nome-col">Rua</th>
                                    <th scope="col" class="nome-col">Número</th>

                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($cliente->farmaciasPedido() as $farmacias)
                                <tr>
                                    <td  style="color: red"class="nome_reuniao basic-space"><br><a href="{{route('cliente.farmacia', ['id' => $farmacias->id])}}">{{$farmacias->user->nome}}</a></td>
                                    <td class="nome_reuniao basic-space"><br>{{$farmacias->user->endereco->bairro}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$farmacias->user->endereco->rua}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$farmacias->user->endereco->numero}}</td>
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
