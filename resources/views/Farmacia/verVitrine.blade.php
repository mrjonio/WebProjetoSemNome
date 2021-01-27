@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de produtos</div>

                <div class="card-body">
                    <div class="form-row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="nome-col">Nome do produto</th>
                                    <th scope="col" class="nome-col">Disponibilidade</th>
                                    <th scope="col" class="nome-col">Preço</th>
                                    <th scope="col" class="nome-col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produtos as $prod)
                                <tr>
                                    <td class="nome_reuniao basic-space">{{$prod->nome}}</td>
                                    <td class="nome_reuniao basic-space">{{$prod->disponivel}}</td>
                                    <td class="nome_reuniao basic-space">{{$prod->preco}}</td>
                                    <td id="coluna-images" class="basic-space">

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
