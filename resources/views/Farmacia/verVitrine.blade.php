@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Lista de produtos</div>

                <div class="card-body">
                    <div class="form-row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="nome-col">Produto</th>
                                    <th scope="col" class="nome-col">Nome</th>
                                    <th scope="col" class="nome-col">Descrição</th>
                                    <th scope="col" class="nome-col">Disponibilidade</th>
                                    <th scope="col" class="nome-col">Preço</th>
                                    <th scope="col" class="nome-col" colspan="2">Ações</th>

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
                                      <a class="btn edit-bt" href="{{route('farmacia.produto.editarProduto', ['id' => $prod->id])}}">Editar</a>
                                    </td>
                                    <td>
                                      <a class="btn edit-bt" href="{{route('farmacia.produto.editarDisponibilidadeProd', ['id' => $prod->id])}}">Mudar Disponibilidade</a>
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
