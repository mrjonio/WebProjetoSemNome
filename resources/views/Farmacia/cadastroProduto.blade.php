@extends('layouts.app')
<script>
function removeImage() {
    imagemProd.value = '';
    prvata.innerHTML = '';
    lbfoto.innerHTML = 'Escolha outra Imagem';
}


function previewImagem() {

    var atapv = document.querySelector('#prvata');

    if (imagemProd.files) {
      atapv.innerHTML = '';
     var a = readAndPreviewImage(imagemProd.files[0]);
    }
    function readAndPreviewImage(file) {
        // Make sure `file.name` matches our extensions criteria
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " is not an image");
        } // else...
        var read = new FileReader();

        read.addEventListener("load", function() {
          document.getElementById('lbfoto').innerHTML =  file.name;
          var image = new Image();
          image.className = 'bt-spec';
          image.title  = file.name;
          image.src    = this.result;
          image.style.width = "80%";
          image.style.height = "auto";
          image.style.marginLeft = "90px";
          image.style.marginBottom = "50px";
          image.onclick = function(){removeImage();};
          atapv.appendChild(image);
        });
        read.readAsDataURL(file);

    }

}


document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#imagemProd').addEventListener("change", previewImagem);

});

</script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar novo produto</div>
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
                    <form method="post" action="{{ route('farmacia.produto.cadastrarProduto.salvar') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                          <div class="col-md-12">
                            <h4><center>Informações</center></h4>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                              <input style="margin-top: -100px" type="file" name='imagemProd' class="custom-file-input input-stl" id="imagemProd" accept="image/*" placeholder="Escolha a imagem">
                              <label class="btn btn-primary btn-block btn-outlined" id="lbfoto" for="imagemProd">Escolha a imagem</label>
                            </div>
                        </div>
                        <div id="prvata" class="row">

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Descricao</label>
                            <div class="col-md-6">
                                <textarea class="form-control input-stl" id="descricao" name="descricao" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Preço</label>
                            <div class="col-md-6">
                                <input id="preco" type="number" name="preco" value="{{ old('preco') }}" step="0.01">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
