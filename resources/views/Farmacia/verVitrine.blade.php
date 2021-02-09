@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header marker">Lista de produtos</div>

                <div class="card-body">
                  <div class="form-row">
                    <div class="col-md-4">
                      <button style="float: left; background: blue"class="final-bt bt-tb"><img class="img-tb"src="{{asset('images/info.png')}}" alt=""></button>
                      <br>
                      <label class="label-static">Editar</label>
                    </div>
                    <div class="col-md-4">
                      <button style="float: left;"class="final-bt bt-tb"><img class="img-tb"src="{{asset('images/exchange.png')}}" alt=""></button>
                      <br>
                      <label class="label-static">Mudar disponibilidade</label>
                    </div>
                    <div class="col-md-4">
                      <button style="float: left; background: red"class="final-bt bt-tb"><img class="img-tb"src="{{asset('images/minus-round-line.png')}}" alt=""></button>
                      <br>
                      <label class="label-static">Remover da vitrine</label>
                    </div>
                  </div>
                  <br>
                    <div class="form-row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="nome-col">Produto</th>
                                    <th scope="col" class="nome-col">Nome</th>
                                    <th scope="col" class="nome-col">Descrição</th>
                                    <th scope="col" class="nome-col">Disponibilidade</th>
                                    <th scope="col" class="nome-col">Preço</th>
                                    <th scope="col" class="nome-col" colspan="3">Ações</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produtos as $prod)
                                <tr>
                                    <td class="nome_reuniao basic-space"><img src="{{asset('storage/' . $prod->imagem)}}" alt="" width="70px"> </td>
                                    <td class="nome_reuniao basic-space"><br>{{$prod->nome}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$prod->descricao}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$prod->isDisponivel()}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$prod->preco}}</td>
                                    <td id="coluna-images" class="basic-space">
                                      <button style="background: blue" class="btn final-bt bt-tb"><a href="{{route('farmacia.produto.editarProduto', ['id' => $prod->id])}}"><img class="img-tb"src="{{asset('images/info.png')}}" alt=""></a></button>
                                    </td>
                                    <td>
                                      <button class="btn final-bt bt-tb"><a href="{{route('farmacia.produto.editarDisponibilidadeProd', ['id' => $prod->id])}}"><img class="img-tb"src="{{asset('images/exchange.png')}}" alt=""></a></button>
                                    </td>
                                    <td>
                                      <button style="background-color:red" class="btn final-bt bt-tb"><a href="{{route('farmacia.produto.removerProduto', ['id' => $prod->id])}}"><img class="img-tb"src="{{asset('images/minus-round-line.png')}}" alt=""></a></button>
                                    </td>
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
