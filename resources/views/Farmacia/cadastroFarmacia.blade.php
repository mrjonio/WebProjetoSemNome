@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header marker">Cadastrar Farmácia</div>
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
                    <form method="post" action="{{ route('farmacia.cadastrarFarmacia.salvar') }}">
                        @csrf

                        <div class="form-group row">
                          <div class="col-md-12">
                            <h4 class="sub-marker"><center>Informações </center></h4>
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right label-static required">Nome</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control input-stl @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right label-static required">CNPJ</label>
                            <div class="col-md-6">
                                <input id="cnpj" type="number" class="form-control input-stl @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ old('cnpj') }}" required autocomplete="cnpj" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <h4 class="sub-marker"><center>Informações de acesso</center></h4>
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right label-static required">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control input-stl @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right label-static required">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control input-stl @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static required">Confirmação de senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control input-stl" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <h4 class="sub-marker"><center>Endereço</center></h4>
                          </div>
                        </div>


                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static required">Cidade</label>

                            <div class="col-md-6">
                                <input id="cidade" type="text" class="form-control input-stl" name="cidade" value="{{ old('cidade') }}" required autocomplete="cidade">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static required">Estado</label>

                            <div class="col-md-6">
                                <input id="estado" type="text" class="form-control input-stl" name="estado" value="{{ old('estado') }}" required autocomplete="estado">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static required">Rua</label>

                            <div class="col-md-6">
                                <input id="rua" type="text" class="form-control input-stl" name="rua" value="{{ old('rua') }}" required autocomplete="rua">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static required">Bairro</label>

                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control input-stl" name="bairro" value="{{ old('bairro') }}" required autocomplete="bairro">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static required">Numero</label>

                            <div class="col-md-6">
                                <input id="numero" type="number" class="form-control input-stl" name="numero" value="{{ old('numero') }}" required autocomplete="numero">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">CEP</label>

                            <div class="col-md-6">
                                <input id="cep" type="number" class="form-control input-stl" name="cep" value="{{ old('cep') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right label-static">Complemento</label>

                            <div class="col-md-6">
                                <input id="complemento" type="text" class="form-control input-stl" name="complemento" value="{{ old('complemento') }}">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary final-bt">
                                    Cadastrar
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
