@extends('layouts.app')

@section('content')

<script>

function toggleFormElements() {
    var inputs = document.getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }

    var inputs = document.getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        if(inputs[i].type === "text"){
            inputs[i].disabled = false;
        }
        if(inputs[i].type === "date"){
            inputs[i].disabled = false;
        }
        if(inputs[i].type === "number"){
            inputs[i].disabled = false;
        }
        if(inputs[i].type === "tel"){
            inputs[i].disabled = false;
        }
        if(inputs[i].type === "email"){
            inputs[i].disabled = false;
        }
    }
    var selects = document.getElementsByTagName("select");
    for (var i = 0; i < selects.length; i++) {
        selects[i].disabled = false;
    }
    var textareas = document.getElementsByTagName("textarea");
    for (var i = 0; i < textareas.length; i++) {
        textareas[i].disabled = false;
    }
    var buttons = document.getElementsByTagName("button");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].disabled = false;
    }
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("enable-bt").addEventListener('click', toggleFormElements, false);
});


</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header marker">Minhas informações</div>
              <hr style="margin-top: -3px;" class="outliner2">
                <div class="row">
                  <div class="col-md-6">
                      <button class="btn spec-bt" id="enable-bt">Editar</button>
                  </div>
                  <div class="col-md-6">
                      <button class="btn spec-bt" id="excluir-bt"><a href="{{route('cliente.removerCliente')}}">Excluir perfil</a></button>
                  </div>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="padding: 0px;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <hr style="margin-bottom: 1px;"class="outliner2">

                <div class="card-body">
                    <form method="post" action="{{ route('cliente.editarCliente.salvar') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group row">
                          <div class="col-md-12">
                            <h4  class="sub-marker"><center>Informações Pessoais</center></h4>
                          </div>
                        </div>
                        <hr class="outliner">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right label-static">Nome</label>
                            <div class="col-md-6">
                                <input disabled="true" id="nome" type="text" class="form-control @error('nome') is-invalid @enderror input-stl" name="nome" value="{{ old('nome', $user->nome) }}" required autocomplete="nome" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right label-static">Cpf</label>
                            <div class="col-md-6">
                                <input disabled="true" id="cpf" type="number" class="form-control @error('cpf') is-invalid @enderror input-stl" name="cpf" value="{{ old('cpf', $user->cliente->cpf) }}" required autocomplete="cpf" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <h4  class="sub-marker"><center>Informações de acesso</center></h4>
                          </div>
                        </div>
                        <hr class="outliner">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right label-static">Email</label>
                            <div class="col-md-6">
                                <input disabled="true" id="email" type="email" class="form-control @error('email') is-invalid @enderror input-stl" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <h4 class="sub-marker"><center>Endereco</center></h4>
                          </div>
                        </div>
                        <hr class="outliner">
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">Cidade</label>

                            <div class="col-md-6">
                                <input disabled="true" id="cidade" type="text" class="form-control input-stl" name="cidade" value="{{ old('cidade', $user->endereco->cidade) }}" required autocomplete="cidade">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">Estado</label>

                            <div class="col-md-6">
                                <input disabled="true" id="estado" type="text" class="form-control input-stl" name="estado" value="{{ old('estado', $user->endereco->estado) }}" required autocomplete="estado">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">Rua</label>

                            <div class="col-md-6">
                                <input disabled="true" id="rua" type="text" class="form-control input-stl" name="rua" value="{{ old('rua', $user->endereco->rua) }}" required autocomplete="rua">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">Bairro</label>

                            <div class="col-md-6">
                                <input disabled="true" id="bairro" type="text" class="form-control input-stl" name="bairro" value="{{ old('bairro', $user->endereco->bairro) }}" required autocomplete="bairro">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">Numero</label>

                            <div class="col-md-6">
                                <input disabled="true" id="numero" type="number" class="form-control input-stl" name="numero" value="{{ old('numero', $user->endereco->numero) }}" required autocomplete="numero">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">CEP</label><br>

                            <div class="col-md-6">
                                <input disabled="true" id="cep" type="number" class="form-control input-stl" name="cep" value="{{ old('cep', $user->endereco->cep) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static" >Complemento</label>

                            <div class="col-md-6">
                                <input disabled="true" id="complemento" type="text" class="form-control input-stl" name="complemento" value="{{ old('complemento', $user->endereco->complemento) }}">
                            </div>
                        </div>

                        <hr class="outliner">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button disabled="true" type="submit" class="btn btn-primary final-bt">
                                    Finalizar Edição
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
