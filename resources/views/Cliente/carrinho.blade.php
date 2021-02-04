@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header marker">Carrinho</div>

                <div class="card-body">
                  <div class="form-row">
                      <table id="prodsID" class="table">
                          <thead>
                              <tr>
                                <th scope="col" class="nome-col">Produto</th>
                                  <th scope="col" class="nome-col">Nome</th>
                                  <th scope="col" class="nome-col">Descrição</th>
                                  <th scope="col" class="nome-col">Total</th>
                                  <th scope="col" class="nome-col">Quantidade</th>
                                  <th scope="col" class="nome-col">Ações</th>

                              </tr>
                          </thead>
                          <tbody>
                            @if (session()->get('produtos'))
                            @foreach(session()->get('produtos') as $prod)
                              <tr>
                                  <td class="nome_reuniao basic-space"><img src="{{asset('storage/' . $prod['imagem'])}}" alt="" width="70px"> </td>
                                  <td class="nome_reuniao basic-space"><br>{{$prod['nome']}}</td>
                                  <td class="nome_reuniao basic-space"><br>{{$prod['descricao']}}</td>
                                  <td class="nome_reuniao basic-space"><br>{{$prod['subtotal']}}</td>
                                  <td class="nome_reuniao basic-space"><br>{{$prod['quantidade']}}</td>
                                  <td id="coluna-images" class="basic-space">
                                    <form method="post" action="{{ route('cliente.carrinho.remover', ['produto_id' => $prod['id']]) }}">
                                      @csrf
                                    <button type="submit" class="btn edit-bt">Remover do carrinho</button>
                                    </form>
                                  </td>
                              </tr>
                              @endforeach
                              @endif
                          </tbody>
                      </table>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                    </div>
                    @if (count(session()->get('produtos')) > 0)
                    <div class="col-md-2">
                      <form method="post" action="{{ route('cliente.carrinho.salvar') }}">
                        @csrf
                        <button type="submit" class="btn final-bt">Finalizar compra</button>
                      </form>
                    </div>
                    @endif
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
