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
              <div class="row">
                  <div class="col-md-10">
                      <h1 class="marker">Minhas informações</h1>
                  </div>
                  <div class="col-md-2">
                      <button class="btn edit-bt" id="enable-bt">Editar</button>
                  </div>
                  <div class="col-md-2">
                      <a class="btn edit-bt" href="{{route('farmacia.removerFarmacia')}}">Excluir perfil</a>
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
                <div class="card-body">
                    <form method="post" action="{{ route('farmacia.editarFarmacia.salvar') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group row">
                          <div class="col-md-12">
                            <h4><center>Informações</center></h4>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
                            <div class="col-md-6">
                                <input disabled="true" id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome', $user->nome) }}" required autocomplete="nome" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">CNPJ</label>
                            <div class="col-md-6">
                                <input disabled="true" id="cnpj" type="number" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ old('cnpj', $user->farmacia->cnpj) }}" required autocomplete="cnpj" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <h4><center>Informações de acesso</center></h4>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input disabled="true" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <h4><center>Endereco</center></h4>
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Cidade</label>

                            <div class="col-md-6">
                                <input disabled="true" id="cidade" type="text" class="form-control" name="cidade" value="{{ old('cidade', $user->endereco->cidade) }}" required autocomplete="cidade">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Estado</label>

                            <div class="col-md-6">
                                <input disabled="true" id="estado" type="text" class="form-control" name="estado" value="{{ old('estado', $user->endereco->estado) }}" required autocomplete="estado">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Rua</label>

                            <div class="col-md-6">
                                <input disabled="true" id="rua" type="text" class="form-control" name="rua" value="{{ old('rua', $user->endereco->rua) }}" required autocomplete="rua">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Bairro</label>

                            <div class="col-md-6">
                                <input disabled="true" id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro', $user->endereco->bairro) }}" required autocomplete="bairro">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Numero</label>

                            <div class="col-md-6">
                                <input disabled="true" id="numero" type="number" class="form-control" name="numero" value="{{ old('numero', $user->endereco->numero) }}" required autocomplete="numero">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">CEP</label>

                            <div class="col-md-6">
                                <input disabled="true" id="cep" type="number" class="form-control" name="cep" value="{{ old('cep', $user->endereco->cep) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Complemento</label>

                            <div class="col-md-6">
                                <input disabled="true" id="complemento" type="text" class="form-control" name="complemento" value="{{ old('complemento', $user->endereco->complemento) }}">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button disabled="true" type="submit" class="btn btn-primary">
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
