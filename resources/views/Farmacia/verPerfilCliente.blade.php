@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header marker">Perfil do cliente</div>
                @if (\Session::has('Sucesso'))
                <div class="alert alert-success">
                  <ul>
                    <li>{!! \Session::get('Sucesso') !!}</li>
                  </ul>
                </div>
                @endif
                <hr style="margin-top: -3px;" class="outliner2">
                <div class="form-group row">
                  <div class="col-md-12">
                    <h4  class="sub-marker"><center>Pedidos do cliente</center></h4>
                  </div>
                </div>

                <div style="margin-top: -13px;" class="card-body">
                        <input type="hidden" name="id" value="{{ $cliente->id }}">
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
                                      <th scope="col" class="nome-col" colspan="2">Ações</th>

                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cliente->pedido as $pedido)
                                    @if($pedido->ativo)
                                    @if($pedido->farmacia_id == $id_farm)
                                      <tr>
                                          <td class="nome_reuniao basic-space"><br>{{$pedido->produto->nome}}</a></td>
                                          <td class="nome_reuniao basic-space"><br>{{$pedido->produto->descricao}}</td>
                                          <td class="nome_reuniao basic-space"><br>{{$pedido->produto->preco}}</td>
                                          <td id="coluna-images" class="basic-space">
                                            <button style="background-color:red" class="btn final-bt bt-tb"><a href="{{route('farmacia.pedidos.cancelar', ['id' => $pedido->id])}}"><img class="img-tb"src="{{asset('images/minus-round-line.png')}}" alt=""></a></button>
                                          </td>
                                          <td id="coluna-images" class="basic-space">
                                            <button class="btn final-bt bt-tb"><a href="{{route('farmacia.pedidos.salvar', ['id' => $pedido->id])}}"><img class="img-tb"src="{{asset('images/done.png')}}" alt=""></a></button>
                                          </td>

                                      </tr>
                                      @endif
                                      @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <h4  class="sub-marker"><center>Informações Pessoais</center></h4>
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right label-static">Nome</label>
                            <div class="col-md-6">
                              <label class="label-ntstatic-3">{{$cliente->user->nome}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right label-static">Cpf</label>
                            <div class="col-md-6">
                              <label class="label-ntstatic-3">{{$cliente->cpf}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right label-static">Email</label>
                            <div class="col-md-6">
                              <label class="label-ntstatic-3">{{$cliente->user->email}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <h4 class="sub-marker"><center>Endereco</center></h4>
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">Cidade</label>

                            <div class="col-md-6">
                              <label class="label-ntstatic-3">{{$cliente->user->endereco->cidade}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">Estado</label>

                            <div class="col-md-6">
                              <label class="label-ntstatic-3">{{$cliente->user->endereco->estado}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">Rua</label>

                            <div class="col-md-6">
                              <label class="label-ntstatic-3">{{$cliente->user->endereco->rua}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">Bairro</label>

                            <div class="col-md-6">
                              <label class="label-ntstatic-3">{{$cliente->user->endereco->bairro}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">Numero</label>

                            <div class="col-md-6">
                              <label class="label-ntstatic-3">{{$cliente->user->endereco->numero}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">CEP</label><br>

                            <div class="col-md-6">
                              <label class="label-ntstatic-3">{{$cliente->user->endereco->cep}}</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static" >Complemento</label>

                            <div class="col-md-6">
                              <label class="label-ntstatic-3">{{$cliente->user->endereco->complemento}}</label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary final-bt"><a href="{{route('farmacia.pedidos')}}">
                                    Voltar
                                  </a>
                                </button>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
